<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Point;
use App\Models\History;
use App\Models\Shop;
use App\Models\CourseGroup;
use App\Models\Extend;
use App\Models\Option;
use App\Models\OptionRS;
use Carbon\Carbon;
use App\Models\Cast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use App\Models\Appoint;

class MemberController extends Controller{
  const DEFAULT_LIMIT = 30;

  public function index(Request $request): View{
    // dd(bcrypt('test0610'));
    $query = Member::query();

    if ($request->has('nickname') && $request->query('nickname') !== null) {
        $name = '%' . $request->query('nickname') . '%';
        $id = $request->query('nickname');
        $query->where('name', 'like', $name)->orWhere('tel', 'like', $name)->orWhere('id', '=', $id);
    }

    // if ($request->has('mail') && $request->query('mail') !== null) {
    //     $email = '%' . $request->query('mail') . '%';
    //     $query->where('email', 'like', $email);
    // }

    // if ($request->has('tel') && $request->query('tel') !== null) {
    //     $tel = '%' . $request->query('tel') . '%';
    //     $query->where('tel', 'like', $tel);
    // }

    $total = $query->count();

    $page = $request->query('page') ? (int) $request->query('page') : 1;
    $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
    $skip = ($page - 1) * $limit;
    $pages = ceil($total / $limit);
    // dd($limit);
    $members = $query->selectRaw('id, name, subname, email, tel, oldid, DATE_FORMAT(birth, "%Y-%m-%d") as birth, pref_id, address, DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as created_at')
        ->skip($skip)
        ->take($limit)
        ->orderBy('created_at', 'desc')
        ->orderBy('id', 'desc')
        ->get();

    return view('admin.member.index', [
        'members' => $members,
        'page' => $page,
        'limit' => $limit,
        'skip' => $skip,
        'total' => $total,
        'pages' => $pages,
    ]);

  }

  public function show(Request $request, int $id): View{

    $member = Member::find($id);
    // $today_point = Point::where('user_id', $id)->whereDate('created_at', '=', Carbon::now()->format('Y-m-d'))
    //               ->where('type', 3)
    //               ->sum('point');
    $point_pay = Point::where('user_id', $id)->where('type', 3)->sum('point');
    $point_use = Point::where('user_id', $id)->where('type', 5)->sum('point');
    $today_point = $point_pay - $point_use;

    // 来店履歴の仮データ
    $dummyHistories = [
      [
        'id' => 1,
        'created_at' => '2025-06-05',
        'shop_name' => '雫',
        'casts_name' => '',
        'course_name' => '',
        'price' => 0,
        'point_pay' => 500,
        'point_use' => 1500,
        'memo' => '編集'
      ],
      [
        'id' => 2,
        'created_at' => '2025-05-24',
        'shop_name' => '雫',
        'casts_name' => '',
        'course_name' => '',
        'price' => 0,
        'point_pay' => 1000,
        'point_use' => 2000,
        'memo' => '編集'
      ],
      [
        'id' => 3,
        'created_at' => '2024-12-26',
        'shop_name' => 'シロガネーゼ',
        'casts_name' => '',
        'course_name' => '',
        'price' => 0,
        'point_pay' => 3000,
        'point_use' => 0,
        'memo' => '編集'
      ]
    ];
    $histories = History::where('user_id', $id)
                  ->whereIn('name', ['来店', 'PT有効期限切れ'])
                  ->orderBy('created_at', 'desc')
                  ->orderBy('id', 'desc');
    $total = $histories->count();

    $page = $request->query('page') ? (int) $request->query('page') : 1;
    $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
    $skip = ($page - 1) * $limit;
    $pages = ceil($total / $limit);

    $histories = $histories->skip($skip)
                  ->take($limit)
                  ->get();
    if ($histories) {
      $histories = $histories->map(function ($history) {
        $history->casts_name = Cast::where('id', $history->cast_id)->first()->name ?? '';
        $history->course_name_table = Course::where('id', $history->course_id)->first()->name ?? '';
        $history->shop_name = Shop::where('id', $history->shop_id)->first()->name ?? '';
        $history->point_pay = Point::where('history_id', $history->id)->where('type', 3)->sum('point') ?? 0;
        $history->point_use = Point::where('history_id', $history->id)->where('type', 5)->sum('point') ?? 0;
        return $history;
      });
    }
    $user = Auth::user();
    $token = $user->createToken('api-token')->plainTextToken;

    // $courses = Course::where('shop_id', $member->shop_id)->get();
    return view('admin.member.detail', [
      'member' => $member,
      'today_point' => $today_point,
      'dummyHistories' => $dummyHistories,
      'histories' => $histories,
      'page' => $page,
      'limit' => $limit,
      'skip' => $skip,
      'total' => $total,
      'pages' => $pages,
      'token' => $token,
    ]);
  }

  public function update(Request $request, int $id): RedirectResponse{
    $history = History::find($id);
    $history->update($request->input('course'), $request->input('price'));
    $point = Point::where('history_id', $id)->where('type', 3)->sum('point');
    $point_use = Point::where('history_id', $id)->where('type', 5)->sum('point');
    Log::info($id);
    Log::info($point);
    Log::info($point_use);
    $point->update(['point' => $request->input('point')]);
    $point_use->update(['point' => $request->input('point_use')]);
    return redirect()->route('admin.member.detail', ['id' => $id]);
  }

  public function qrcodeRead(): View{
    return view('admin.member.qrcode');
  }

  public function qrResult(Request $request){
    $manager = Auth::guard('web')->user();
    if ( !$manager ) {
      return redirect()->route('admin.member.index')->with('error', '管理権限がありません。');
    }
    $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $manager->id)->get();
    if ( count($shop_user) == 0 ) {
      return redirect()->route('admin.member.index')->with('error', '管理権限がありません。');
    }
    $shop_id = $shop_user[0]->shop_id;
    $member = null;
    if ( $request->has('search') && $request->query('search') !== null) {
      $search = $request->query('search');
      $member = Member::where('id', $search)->orWhere('tel', $search)->first();
      // return view('admin.member.qrresult', [
      //   'member' => $member,
      // ]);
    }

    if ( $request->has('qr') && $request->query('qr') !== null) {
      $qr = $request->query('qr');
      $member = Member::where('id', $qr)->first();
      // return view('admin.member.qrresult', [
      //   'member' => $member,
      // ]);
    }
    if ( !$member ) {
      return redirect()->route('admin.member.qrcode')->with('error', '会員を見つかりません');
    }
    $histories = null;
    if ( $member ) {
      // $maxDate = Point::where('user_id', $member->id)->where('type', 3)->max('created_at');
      // // dd($maxDate);
      // if ($maxDate){
      //   $member->pay = Point::where('user_id', $member->id)->where('type', 3)->where('created_at', '>=', $maxDate)->sum('point');
      // }else{
      //   $member->pay = 0;
      // }
      $point_pay = Point::where('user_id', $member->id)->where('type', 3)->sum('point');
      $point_use = Point::where('user_id', $member->id)->where('type', 5)->sum('point');
      $member->pay = $point_pay - $point_use;
      // $member->pay = Point::where('user_id', $member->id)->where('type', 3)->where('created_at', '>=', $maxDate)->sum('point');
      $histories = History::where('user_id', $member->id)->whereIn('name', ['来店', 'PT有効期限切れ'])->orderBy('created_at', 'desc')->orderBy('id', 'desc')->get();
      if ( $histories ) {
        $histories = $histories->map(function ($history) {
          $history->casts_name = Cast::where('id', $history->cast_id)->first()->name ?? '';
          $history->point_use = Point::where('history_id', $history->id)->where('type', 5)->sum('point') ?? 0;
          $history->course1_name_table = CourseGroup::where('id', $history->course1_id)->first()->course ?? '';
          $history->course2_name_table = CourseGroup::where('id', $history->course2_id)->first()->course ?? '';
          $history->course3_name_table = CourseGroup::where('id', $history->course3_id)->first()->course ?? '';
          $history->course4_name_table = CourseGroup::where('id', $history->course4_id)->first()->course ?? '';
          $history->extend_name = Extend::where('id', $history->extend_id)->first()->extend ?? '';
          return $history;
        });
      }
    }
    if ( !$manager->hasRole('shop') ) {
      return redirect()->route('admin.member.index')->with('error', '管理権限がありません。');
    }

    $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $manager->id)->get();
    if ( count($shop_user) == 0 ) {
      return redirect()->route('admin.member.index')->with('error', '管理権限がありません。');
    }
    // $shop = Shop::where('id',$shop_user[0]->shop_id)->first();
    $casts = Cast::where('shop_id',$shop_user[0]->shop_id)->where('is_public', 1)
    ->orderBy('name', 'asc')
    ->get();
    // $courses = Course::groupBy('name')->get();
    $courses = CourseGroup::where('shop_id',$shop_user[0]->shop_id)->get();
    $extends = Extend::where('shop_id',$shop_user[0]->shop_id)->get();
    $options = OptionRS::leftJoin('options', 'options.id', '=', 'options_rs.option_id')
    ->where('options_rs.shop_id',$shop_user[0]->shop_id)
    ->get();
    $appoints = Appoint::where('shop_id',$shop_user[0]->shop_id)->get();
    // $extension = Extension::groupBy('name')->get();
    $user = Auth::user();
    $token = $user->createToken('api-token')->plainTextToken;

    return view('admin.member.qrresult', [
      'member' => $member,
      'histories' => $histories,
      'casts' => $casts,
      'courses' => $courses,
      'extends' => $extends,
      'options' => $options,
      'appoints' => $appoints,
      // 'extension' => $extension,
      'token' => $token,
    ]);
  }

  /*
   const enum pref:string {
    case "1" = "北海道";
    case "2" = "青森県";
    case "3" = "岩手県";
    case "4" = "宮城県";
    case "5" = "秋田県";
    case "6" = "山形県";
    case "7" = "福島県";
    case "8" = "茨城県";
    case "9" = "栃木県";
    case "10" = "群馬県";
    case "11" = "埼玉県";
    case "12" = "千葉県";
    case "13" = "東京都";
    case "14" = "神奈川県";
    case "15" = "新潟県";
    case "16" = "富山県";
    case "17" = "石川県";
    case "18" = "福井県";
    case "19" = "山梨県";
    case "20" = "長野県";
    case "21" = "岐阜県";
    case "22" = "静岡県";
    case "23" = "愛知県";
    case "24" = "三重県";
    case "25" = "滋賀県";
    case "26" = "京都府";
    case "27" = "大阪府";
    case "28" = "兵庫県";
    case "29" = "奈良県";
    case "30" = "和歌山県";
    case "31" = "鳥取県";
    case "32" = "島根県";
    case "33" = "岡山県";
    case "34" = "広島県";
    case "35" = "山口県";
    case "36" = "徳島県";
    case "37" = "香川県";
    case "38" = "愛媛県";
    case "39" = "高知県";
    case "40" = "福岡県";
    case "41" = "佐賀県";
    case "42" = "長崎県";
    case "43" = "熊本県";
    case "44" = "大分県";
    case "45" = "宮崎県";
    case "46" = "鹿児島県";
    case "47" = "沖縄県";
    case "48" = "その他";

  }
  */

}
//   const pref = [
//     {
//       value: "1",
//       text: "北海道"
// },
// {
//     value: "2",
//     text: "青森県"
// },
// {
//     value: "3",
//     text: "岩手県"
// },
// {
//     value: "4",
//     text: "宮城県"
// },
// {
//     value: "5",
//     text: "秋田県"
// },
// {
//     value: "6",
//     text: "山形県"
// },
// {
//     value: "7",
//     text: "福島県"
// },
// {
//     value: "8",
//     text: "茨城県"
// },
// {
//     value: "9",
//     text: "栃木県"
// },
// {
//     value: "10",
//     text: "群馬県"
// },
// {
//     value: "11",
//     text: "埼玉県"
// },
// {
//     value: "12",
//     text: "千葉県"
// },
// {
//     value: "13",
//     text: "東京都"
// },
// {
//     value: "14",
//     text: "神奈川県"
// },
// {
//     value: "15",
//     text: "新潟県"
// },
// {
//     value: "16",
//     text: "富山県"
// },
// {
//     value: "17",
//     text: "石川県"
// },
// {
//     value: "18",
//     text: "福井県"
// },
// {
//     value: "19",
//     text: "山梨県"
// },
// {
//     value: "20",
//     text: "長野県"
// },
// {
//     value: "21",
//     text: "岐阜県"
// },
// {
//     value: "22",
//     text: "静岡県"
// },
// {
//     value: "23",
//     text: "愛知県"
// },
// {
//     value: "24",
//     text: "三重県"
// },
// {
//     value: "25",
//     text: "滋賀県"
// },
// {
//     value: "26",
//     text: "京都府"
// },
// {
//     value: "27",
//     text: "大阪府"
// },
// {
//     value: "28",
//     text: "兵庫県"
// },
// {
//     value: "29",
//     text: "奈良県"
// },
// {
//     value: "30",
//     text: "和歌山県"
// },
// {
//     value: "31",
//     text: "鳥取県"
// },
// {
//     value: "32",
//     text: "島根県"
// },
// {
//     value: "33",
//     text: "岡山県"
// },
// {
//     value: "34",
//     text: "広島県"
// },
// {
//     value: "35",
//     text: "山口県"
// },
// {
//     value: "36",
//     text: "徳島県"
// },
// {
//     value: "37",
//     text: "香川県"
// },
// {
//     value: "38",
//     text: "愛媛県"
// },
// {
//     value: "39",
//     text: "高知県"
// },
// {
//     value: "40",
//     text: "福岡県"
// },
// {
//     value: "41",
//     text: "佐賀県"
// },
// {
//     value: "42",
//     text: "長崎県"
// },
// {
//     value: "43",
//     text: "熊本県"
// },
// {
//     value: "44",
//     text: "大分県"
// },
// {
//     value: "45",
//     text: "宮崎県"
// },
// {
//     value: "46",
//     text: "鹿児島県"
// },
// {
//     value: "47",
//     text: "沖縄県"
// },
// {
//     value: "48",
//     text: "その他"
// }
// ];


?>

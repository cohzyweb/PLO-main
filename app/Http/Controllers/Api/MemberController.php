<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use App\Models\Member;
use App\Models\Point;
use App\Models\History;
use App\Models\CourseGroup;
use App\Models\Course;
use App\Models\Extend;
use App\Models\Option;
use Illuminate\Support\Facades\DB;
class MemberController extends Controller
{
    public function update(Request $request): JsonResponse
    {
      // dd($request->all());
      Log::info($request->all());
      $price = is_numeric($request->input('price')) ? $request->input('price') : 0;
      $point_value = is_numeric($request->input('point')) ? $request->input('point') : 0;
      $point_use_value = is_numeric($request->input('point_use')) ? $request->input('point_use') : 0;
      $history = History::find($request->input('id'));
    //   $history->course_id = $request->input('course') ?? '';
    //   $history->cast_id = $request->input('cast_id') ?? '';
      $history->price_new = $price;
      $point = Point::where('history_id', $request->input('id'))->where('type', 3)->first();
      $point_use = Point::where('history_id', $request->input('id'))->where('type', 5)->first();
      Log::info($point);
      if ( $point ){
        Point::where('id',$point->id)->update(['point' => $point_value]);
      }else{
        Point::insert([
          'user_id' => $history->user_id,
          'history_id' => $request->input('id'),
          'office_id' => $history->office_id,
          'shop_id' => $history->shop_id,
          'type' => 3,
          'point' => $point_value,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
      Log::info($point_use);
      if ($point_use){
        Point::where('id',$point_use->id)->update(['point' => $point_use_value]);
      }else{
        Point::insert([
          'user_id' => $history->user_id,
          'history_id' => $request->input('id'),
          'office_id' => $history->office_id,
          'shop_id' => $history->shop_id,
          'type' => 5,
          'point' => $point_use_value,
          'created_at' => now(),
          'updated_at' => now(),
        ]);
      }
    //   Point::insert([
    //       'user_id' => $history->user_id,
    //       'history_id' => $request->input('id'),
    //       'office_id' => $history->office_id,
    //       'type' => 3,
    //       'point' => $point,
    //       'created_at' => now(),
    //       'updated_at' => now(),
    //     ]);
    //   Point::insert([
    //     'user_id' => $history->user_id,
    //     'history_id' => $request->input('id'),
    //     'office_id' => $history->office_id,
    //     'type' => 5,
    //     'point' => $point_use,
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ]);
      // $point->point = $request->input('point') ?? 0;
      // $point->point_use = $request->input('point_use') ?? 0;
      // $point->save();
      $history->save();
      // $point = Point::where('history_id', $request->input('id'))->where('type', 3)->update([
      //   'point' => $request->input('point') ?? 0
      // ]);
      // $point = Point::where('history_id', $request->input('id'))->where('type', 5)->update([
      //   'point' => $request->input('point_use') ?? 0
      // ]);

      return response()->json([
        'message' => '更新しました'
      ]);

    }

    public function qrupdate(Request $request): JsonResponse
    {
      // dd($request->input('extension_name'));
      // $history = History::where('user_id', $request->input('member_id'))->max('created_at');
      // if (!$history) {
        $shop_manager = Auth::user();

        // There is no direct strtofloat in PHP, but you can convert a string to float using (float) or floatval().
        // Example:
        // $floatValue = (float) $stringValue;
        $course1_id = $request->input('course1') == '' ? null :  $request->input('course1');
        $course2_id = $request->input('course2') == '' ? null :  $request->input('course2');
        $course3_id = $request->input('course3') == '' ? null :  $request->input('course3');
        $course4_id = $request->input('course4') == '' ? null :  $request->input('course4');
        $extend_id = $request->input('extend') == '' ? null :  $request->input('extend');
        $option1_id = $request->input('option1') == '' ? null :  $request->input('option1');
        $option2_id = $request->input('option2') == '' ? null :  $request->input('option2');
        $option3_id = $request->input('option3') == '' ? null :  $request->input('option3');
        $option4_id = $request->input('option4') == '' ? null :  $request->input('option4');
        $option5_id = $request->input('option5') == '' ? null :  $request->input('option5');
        $appointment_id = $request->input('appointmentID') == '' ? null :  $request->input('appointmentID');
        $appointment_type = $request->input('appointmentType') == '' ? null :  $request->input('appointmentType');
        $appointment_count = $request->input('appointment_count') == '' ? null :  $request->input('appointment_count');
        Log::info($request->input('course'));
        Log::info($course1_id);
        Log::info($request->input('option2'));
        Log::info($option2_id);
        $course1_price = is_numeric($request->input('course1_price')) ? floatval($request->input('course1_price')) : 0;
        $course2_price = is_numeric($request->input('course2_price')) ? floatval($request->input('course2_price')) : 0;
        $course3_price = is_numeric($request->input('course3_price')) ? floatval($request->input('course3_price')) : 0;
        $course4_price = is_numeric($request->input('course4_price')) ? floatval($request->input('course4_price')) : 0;
        $course1_count = is_numeric($request->input('course1_count')) ? floatval($request->input('course1_count')) : 0;
        $course2_count = is_numeric($request->input('course2_count')) ? floatval($request->input('course2_count')) : 0;
        $course3_count = is_numeric($request->input('course3_count')) ? floatval($request->input('course3_count')) : 0;
        $course4_count = is_numeric($request->input('course4_count')) ? floatval($request->input('course4_count')) : 0;
        $extend_price = is_numeric($request->input('extend_price')) ? floatval($request->input('extend_price')) : 0;
        $extend_count = is_numeric($request->input('extend_count')) ? floatval($request->input('extend_count')) : 0;
        $option1_price = is_numeric($request->input('option1_price')) ? floatval($request->input('option1_price')) : 0;
        $option1_count = is_numeric($request->input('option1_count')) ? floatval($request->input('option1_count')) : 0;
        $option2_price = is_numeric($request->input('option2_price')) ? floatval($request->input('option2_price')) :   0;
        $option2_count = is_numeric($request->input('option2_count')) ? floatval($request->input('option2_count')) : 0;
        $option3_price = is_numeric($request->input('option3_price')) ? floatval($request->input('option3_price')) : 0;
        $option3_count = is_numeric($request->input('option3_count')) ? floatval($request->input('option3_count')) : 0;
        $option4_price = is_numeric($request->input('option4_price')) ? floatval($request->input('option4_price')) : 0;
        $option4_count = is_numeric($request->input('option4_count')) ? floatval($request->input('option4_count')) : 0;
        $option5_price = is_numeric($request->input('option5_price')) ? floatval($request->input('option5_price')) : 0;
        $option5_count = is_numeric($request->input('option5_count')) ? floatval($request->input('option5_count')) : 0;
        $appointment_price = is_numeric($request->input('appointmentPrice')) ? floatval($request->input('appointmentPrice')) : 0;
        $discount = is_numeric($request->input('discount')) ? floatval($request->input('discount')) : 0;
        $plo_day = $request->input('plo_day') == 'on' ? true : false;

        $shop_user = DB::connection('mysql')->table('shop_user')->where('user_id', $shop_manager->id)->first();
        if (!$shop_user) {
            return response()->json([
                'message' => 'ショップ情報が見つかりません'
            ], 404);
        }
        $shop_id = $shop_user->shop_id;
        $history = new History();
        $history->user_id = $request->input('member_id');
        $history->name = '来店';
        $history->office_id = 1;
        $history->shop_id = $shop_id;
        $history->cast_id = $request->input('cast') ?: null;
        $history->course1_id = $course1_id;
        $history->course1_price = $course1_price;
        $history->course2_id = $course2_id;
        $history->course2_price = $course2_price;
        $history->course1_count = $course1_count;
        $history->course2_count = $course2_count;
        $history->course3_id = $course3_id;
        $history->course3_price = $course3_price;
        $history->course3_count = $course3_count;
        $history->course4_id = $course4_id;
        $history->course4_price = $course4_price;
        $history->course4_count = $course4_count;
        $history->price_new = is_numeric($request->input('price')) ? floatval($request->input('price')) : 0;
        $history->extend_id = $extend_id;
        $history->extend_price = $extend_price;
        $history->extend_count = $extend_count;
        $history->option1_id = $option1_id;
        $history->option1_price = $option1_price;
        $history->option1_count = $option1_count;
        $history->option2_id = $option2_id;
        $history->option2_price = $option2_price;
        $history->option2_count = $option2_count;
        $history->option3_id = $option3_id;
        $history->option3_price = $option3_price;
        $history->option3_count = $option3_count;
        $history->option4_id = $option4_id;
        $history->option4_price = $option4_price;
        $history->option4_count = $option4_count;
        $history->option5_id = $option5_id;
        $history->option5_price = $option5_price;
        $history->option5_count = $option5_count;
        $history->memo = $request->input('memo') ?? '';
        $history->appoint_id = $appointment_id;
        $history->appoint_type = $appointment_type;
        $history->appoint_price = $appointment_price;
        $history->appoint_count = $appointment_count;
        $history->discount = $discount;
        $history->plo_day = $plo_day;
        // $history->created_at = $history;
        $history->save();
        // dd($history);
      // }else{
      //   $history = History::where('user_id', $request->input('member_id'))->where('created_at', $history)->first();
      //   $history->course_name = $request->input('course') ?? '';
      //   $history->price = $request->input('price') ?? 0;
      //   $history->cast_id = $request->input('cast') ?? 0;
      //   $history->extension_name = $request->input('extension_name') ?? '';
      //   $history->memo = $request->input('memo') ?? '';
      //   $history->save();

      // }
      Point::insert([
        'user_id' => $history->user_id,
        'history_id' => $history->id,
        'office_id' => $history->office_id,
        'shop_id' => $shop_id,
        'type' => 3,
        'point' => is_numeric($request->input('point')) ? $request->input('point') : 0,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      Point::insert([
        'user_id' => $history->user_id,
        'history_id' => $history->id,
        'office_id' => $history->office_id,
        'shop_id' => $shop_id,
        'type' => 5,
        'point' => is_numeric($request->input('point_use')) ? $request->input('point_use') : 0,
        'created_at' => now(),
        'updated_at' => now(),
      ]);
      return response()->json([
        'message' => '更新しました'
      ]);
    }
    public function getValues(Request $request){
        $shop_id = $request->input('shop_id');
        $courses = CourseGroup::all();
        $casts = Cast::where('shop_id', $shop_id)->where('is_public', 1)->get();
        $options = Option::all();
        $extends = Extend::all();

        return response()->json([
          'courses' => $courses,
          'casts' => $casts,
          'options' => $options,
          'extends' => $extends,
        ]);
    }
    public function extendUpdate(Request $request): JsonResponse
    {
        $history = History::find($request->input('id'));

        if (!$history) {
            return response()->json([
                'message' => '履歴が見つかりません'
            ], 404);
        }

        $plo_day = $history->plo_day ?? false;
        $extend_price = is_numeric($request->input('extend_price')) ? floatval($request->input('extend_price')) : 0;
        $extend_count = is_numeric($request->input('extend_count')) ? floatval($request->input('extend_count')) : 0;

        $price = ($history->course1_price ?? 0) * ($history->course1_count ?? 0)
                + ($history->course2_price ?? 0) * ($history->course2_count ?? 0)
                + $extend_price * $extend_count
                + ($history->option1_price ?? 0) * ($history->option1_count ?? 0)
                + ($history->option2_price ?? 0) * ($history->option2_count ?? 0)
                + ($history->option3_price ?? 0) * ($history->option3_count ?? 0)
                + ($history->option4_price ?? 0) * ($history->option4_count ?? 0)
                + ($history->option5_price ?? 0) * ($history->option5_count ?? 0)
                + ($history->appoint_price ?? 0) * ($history->appoint_count ?? 0)
                + ($history->discount ?? 0);

        $point = $plo_day ? $price * 0.1 : $price * 0.03;

        $history->extend_id = $request->input('extend') ?: null;
        $history->extend_count = $extend_count;
        $history->extend_price = $extend_price;
        $history->price_new = $price;
        $history->save();

        Point::updateOrCreate([
            'history_id' => $history->id,
            'type' => 3,
        ], [
            'user_id' => $history->user_id,
            'office_id' => $history->office_id,
            'shop_id' => $history->shop_id,
            'point' => $point,
        ]);

        $extend_name = '';
        if ($history->extend_id) {
            $extend = Extend::where('id', $history->extend_id)->first();
            $extend_name = $extend->extend ?? '';
        }

        return response()->json([
            'message' => '延長更新しました',
            'extend_name' => $extend_name,
            'price' => $price
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Option;
use App\Models\Personality;
use App\Models\Shop;
use App\Models\Style;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Question;
use App\Models\Qa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use FFMpeg;
use App\Services\DropboxService;
use Carbon\Carbon;
use App\Models\Playstyle;
use App\Models\Individuality;

class CastController extends Controller
{
    const DEFAULT_LIMIT = 30;

    protected static $ffmpeg;
    protected DropboxService $dropbox;
    public function __construct(DropboxService $dropbox)
    {
        $this->dropbox = $dropbox;
        if (!self::$ffmpeg) {
            self::$ffmpeg = \FFMpeg\FFMpeg::create([
                'ffmpeg.binaries'  => env('FFMPEG_BINARIES', 'C:/ffmpeg/bin/ffmpeg.exe'),
                'ffprobe.binaries' => env('FFPROBE_BINARIES', 'C:/ffmpeg/bin/ffprobe.exe'),
            ]);
        }
    }

    /**
     * Display a listing of the cast.
     */
    public function index(Request $request): View
    {
        $is_shop_manager = $request->user()->hasRole('shop') && $request->user()->shops->first();
        if ($is_shop_manager) {
            $shop_id = $request->user()->shops->first()->id;
            $query = Cast::where('shop_id', $shop_id);
        } else {
            $query = Cast::whereNot('shop_id', Shop::where('slug', 'touchvip')->first()->id)->whereNot('shop_id', Shop::where('slug', 'headquarter')->first()->id);
        }

        if ($request->has('cast') && $request->query('cast') !== null) {
            $cast = '%' . $request->query('cast') . '%';
            $query->where('name', 'like', $cast);
        }

        if ($request->has('shop') && $request->query('shop') !== null) {
            $shop = $request->query('shop');
            $query->whereHas('shop', function ($query) use ($shop) {
                $query->where('slug', $shop);
            });
        }

        if ($request->has('public') && $request->query('public') !== null) {
            $query->where('is_public', $request->query('public') ? true : false);
        }

        $total = $query->count();

        $page = $request->query('page') ? (int) $request->query('page') : 1;
        $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        $skip = ($page - 1) * $limit;
        $pages = ceil($total / $limit);

        $casts = $query->skip($skip)
            ->take($limit)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.cast.index', [
            'casts' => $casts,
            'page' => $page,
            'limit' => $limit,
            'skip' => $skip,
            'total' => $total,
            'pages' => $pages,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Display a listing of the cast.
     */
    public function sortindex(Request $request): View
    {
        $token = Auth::user()->createToken('schedule')->plainTextToken;
        return view('admin.cast.sortindex', [
            'token' => $token,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('rank')->get(),
        ]);
    }
    /**
     * Create a cast.
     */
    public function create(Request $request): View
    {
        $questions = Question::where('is_public', true)->orderBy('id', 'asc')->get();
        return view('admin.cast.create', [
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'playstyles' => Playstyle::all(),
            'individualities' => Individuality::all(),
            'styles' => Style::all(),
            'questions' => $questions,
        ]);
    }

    /**
     * Store a cast.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cast_name' => 'required',
            'shop_id' => 'required',
        ]);

        $cast = Cast::firstOrCreate([
            'name' => $request->cast_name,
            'shop_id' => $request->shop_id,
            'joined_at' => $request->joined_at,
            'age' => $request->age,
            'height' => $request->height,
            'bra_size' => $request->bra_size,
            'bust' => $request->bust,
            'waist' => $request->waist,
            'hip' => $request->hip,
            'appeal_point' => $request->appeal_point,
            'manager_comment' => $request->manager_comment,
            'catch_copy' => $request->catch_copy,
            'diary_email_from' => $request->diary_email_from,
            'diary_email_to' => $request->diary_email_to,
            'is_public' => $request->is_public ? true : false,
            'memo' => $request->memo,
        ]);

        $cast->options()->sync($request->options);
        $cast->personalities()->sync($request->personalities);
        $cast->playstyles()->sync($request->playstyles);
        $cast->individualities()->sync($request->individualities);
        $cast->styles()->sync($request->styles);

        $file_path = "gallery/{$cast->id}";
        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        $file3 = $request->file('file_3');
        $file4 = $request->file('file_4');
        $file5 = $request->file('file_5');
        $file6 = $request->file('file_6');
        $file7 = $request->file('file_7');
        $file8 = $request->file('file_8');
        $file9 = $request->file('file_9');
        $file10 = $request->file('file_10');
        $cast->gallery_1 = $file1 ? $file1->store($file_path, 'public') : null;
        $cast->gallery_2 = $file2 ? $file2->store($file_path, 'public') : null;
        $cast->gallery_3 = $file3 ? $file3->store($file_path, 'public') : null;
        $cast->gallery_4 = $file4 ? $file4->store($file_path, 'public') : null;
        $cast->gallery_5 = $file5 ? $file5->store($file_path, 'public') : null;
        $cast->gallery_6 = $file6 ? $file6->store($file_path, 'public') : null;
        $cast->gallery_7 = $file7 ? $file7->store($file_path, 'public') : null;
        $cast->gallery_8 = $file8 ? $file8->store($file_path, 'public') : null;
        $cast->gallery_9 = $file9 ? $file9->store($file_path, 'public') : null;
        $cast->gallery_10 = $file10 ? $file10->store($file_path, 'public') : null;

        if ($request->hasFile("video_1")) {
            $video1 = $request->file('video_1');
            // $path = Storage::disk('dropbox')->putFile(Shop::find($cast->shop_id)->slug, $video1);
            $file_ext = pathinfo($video1->getClientOriginalName(), PATHINFO_EXTENSION );
            $file_name = $cast->id."_".pathinfo($video1->getClientOriginalName(), PATHINFO_FILENAME )."_".Carbon::now()->format('YmdHis').".".$file_ext;
            $path = '/'.Shop::find($cast->shop_id)->slug.'/'.$file_name;
            $this->dropbox->uploadFile($path, file_get_contents($video1->getPathname()));
            // $client = Storage::disk('dropbox')->getAdapter()->getClient();
            // $sharedLink = $client->createSharedLinkWithSettings($path);
            $sharedLink = $this->dropbox->createSharedLink($path);
            $videoPath = str_replace('dl=0', 'raw=1', $sharedLink['url']);

            $video = self::$ffmpeg->open($video1->getPathname());
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0.5));
            $thumbnailPath = 'thumbnail/' . uniqid() . '.jpg';
            $frame->save(storage_path('app/public/' . $thumbnailPath));

            $videoModel = Video::create([
                'cast_id' => $cast->id,
                'video_url' => $videoPath,
                'thumb_url' => $thumbnailPath,
            ]);
            $cast->video1_id = $videoModel->id;
        }
        if ($request->hasFile("video_2")) {
            $video2 = $request->file('video_2');
            $file_ext = pathinfo($video2->getClientOriginalName(), PATHINFO_EXTENSION );
            $file_name = $cast->id."_".pathinfo($video2->getClientOriginalName(), PATHINFO_FILENAME )."_".Carbon::now()->format('YmdHis').".".$file_ext;
            $path = '/'.Shop::find($cast->shop_id)->slug.'/'.$file_name;
            $this->dropbox->uploadFile($path, file_get_contents($video2->getPathname()));

            $sharedLink = $this->dropbox->createSharedLink($path);
            $videoPath = str_replace('dl=0', 'raw=1', $sharedLink['url']);

            $video = self::$ffmpeg->open($video2->getPathname());
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0.5));
            $thumbnailPath = 'thumbnail/' . uniqid() . '.jpg';
            $frame->save(storage_path('app/public/' . $thumbnailPath));

            $videoModel = Video::create([
                'cast_id' => $cast->id,
                'video_url' => $videoPath,
                'thumb_url' => $thumbnailPath,
            ]);
            $cast->video2_id = $videoModel->id;
        }

        $cast->save();

        $questions = $request->input('question', []);

        foreach ($questions as $index => $question_id) {
            if (is_numeric($question_id)) {
                Qa::create([
                    'cast_id' => $cast->id,
                    'question_id' => $question_id,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }else if ( $question_id === null ) {
                Qa::create([
                    'cast_id' => $cast->id,
                    'question_id' => null,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }
        }

        if ($request->filled('redirect')) {
            return redirect($request->input('redirect'))->with('success', 'キャスト情報を更新しました');
        }
        return redirect('/admin/cast/sort');
    }

    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        $qas = Qa::where('cast_id', $id)->with('question')->orderBy('rank', 'asc')->get();
        $cast = Cast::find($id);
        $imagePath = storage_path('app/public/' . $cast->gallery_1);
        if (file_exists($imagePath) && ($cast->gallery_1 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_1_width = $width;
            $cast->gallery_1_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_2);
        if (file_exists($imagePath) && ($cast->gallery_2 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_2_width = $width;
            $cast->gallery_2_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_3);
        if (file_exists($imagePath) && ($cast->gallery_3 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_3_width = $width;
            $cast->gallery_3_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_4);
        if (file_exists($imagePath) && ( $cast->gallery_4 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_4_width = $width;
            $cast->gallery_4_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_5);
        if (file_exists($imagePath) && ( $cast->gallery_5 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_5_width = $width;
            $cast->gallery_5_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_6);
        if (file_exists($imagePath) && ( $cast->gallery_6 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_6_width = $width;
            $cast->gallery_6_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_7);
        if (file_exists($imagePath) && ( $cast->gallery_7 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_7_width = $width;
            $cast->gallery_7_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_8);
        if (file_exists($imagePath) && ($cast->gallery_8 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_8_width = $width;
            $cast->gallery_8_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_9);
        if (file_exists($imagePath) && ( $cast->gallery_9 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_9_width = $width;
            $cast->gallery_9_height = $height;
        }
        $imagePath = storage_path('app/public/' . $cast->gallery_10);
        if (file_exists($imagePath) && ( $cast->gallery_10 !== null)) {
            [$width, $height] = getimagesize($imagePath);
            $cast->gallery_10_width = $width;
            $cast->gallery_10_height = $height;
        }
        if ($cast->video1_id) {
            $video1 = Video::find($cast->video1_id);
            $cast["video_1"] = $video1->video_url;
            $cast["video_thumb_1"] = $video1->thumb_url;
        }
        if ($cast->video2_id) {
            $video2 = Video::find($cast->video2_id);
            $cast["video_2"] = $video2->video_url;
            $cast["video_thumb_2"] = $video2->thumb_url;
        }
        // dd(Cast::find($id));
        return view('admin.cast.detail', [
            'cast' => $cast,
            'shop' => $request->user()->shops->first() ?? null,
            'shops' => Shop::whereNot('slug', 'touchvip')->whereNot('slug', 'headquarter')->orderBy('id', 'asc')->get(),
            'options' => Option::all(),
            'personalities' => Personality::all(),
            'playstyles' => Playstyle::all(),
            'individualities' => Individuality::all(),
            'styles' => Style::all(),
            'questions' => Question::where('is_public', true)->orderBy('id', 'asc')->get(),
            'qas' => $qas,
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'cast_name' => 'required',
            'shop_id' => 'required',
        ]);

        $questions = $request->input('question', []);
        // 同じcast_idがないかチェック（nullは除外）
        $nonNullQuestions = array_filter($questions, function($value) {
            return $value !== null && $value !== '';
        });
        $uniqueQuestions = array_unique($nonNullQuestions);
        if (count($uniqueQuestions) !== count($nonNullQuestions)) {
            return redirect()->back()->withInput()->withErrors(['error' => '同じ質問は複数選択できません。']);
        }
        $qas = Qa::where('cast_id', $id)->delete();
        foreach ($questions as $index => $question_id) {
            if (is_numeric($question_id)) {
                Qa::create([
                    'cast_id' => $id,
                    'question_id' => $question_id,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }else if ( $question_id === null ) {
                Qa::create([
                    'cast_id' => $id,
                    'question_id' => null,
                    'answer' => $request->input('a'.($index + 1)),
                    'rank' => $index + 1,
                ]);
            }
        }

        $file_path = "gallery/{$id}";
        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        $file3 = $request->file('file_3');
        $file4 = $request->file('file_4');
        $file5 = $request->file('file_5');
        $file6 = $request->file('file_6');
        $file7 = $request->file('file_7');
        $file8 = $request->file('file_8');
        $file9 = $request->file('file_9');
        $file10 = $request->file('file_10');

        $cast = Cast::find($id);
        $cast->name = $request->cast_name;
        $cast->shop_id = $request->shop_id;
        $cast->joined_at = $request->joined_at;
        $cast->age = $request->age;
        $cast->height = $request->height;
        $cast->bra_size = $request->bra_size;
        $cast->bust = $request->bust;
        $cast->waist = $request->waist;
        $cast->hip = $request->hip;
        $cast->appeal_point = $request->appeal_point;
        $cast->manager_comment = $request->manager_comment;
        $cast->catch_copy = $request->catch_copy;
        $cast->diary_email_from = $request->diary_email_from;
        $cast->diary_email_to = $request->diary_email_to;
        $cast->gallery_1 = $file1 ? $file1->store($file_path, 'public') : $request->path_1;
        $cast->gallery_2 = $file2 ? $file2->store($file_path, 'public') : $request->path_2;
        $cast->gallery_3 = $file3 ? $file3->store($file_path, 'public') : $request->path_3;
        $cast->gallery_4 = $file4 ? $file4->store($file_path, 'public') : $request->path_4;
        $cast->gallery_5 = $file5 ? $file5->store($file_path, 'public') : $request->path_5;
        $cast->gallery_6 = $file6 ? $file6->store($file_path, 'public') : $request->path_6;
        $cast->gallery_7 = $file7 ? $file7->store($file_path, 'public') : $request->path_7;
        $cast->gallery_8 = $file8 ? $file8->store($file_path, 'public') : $request->path_8;
        $cast->gallery_9 = $file9 ? $file9->store($file_path, 'public') : $request->path_9;
        $cast->gallery_10 = $file10 ? $file10->store($file_path, 'public') : $request->path_10;

        $shop_slug = Shop::find($cast->shop_id)->slug;
        if (!$request->old_video_1) {
            // remove the original video from DB and Dropbox
            if ($cast->video1_id) {
                $video = Video::find($cast->video1_id);
                if ($video) {
                    // Delete from Dropbox
                    if ($video->video_url) {
                        // Extract Dropbox path from URL if needed
                        $dropboxPath = $shop_slug . '/' . basename(parse_url($video->video_url, PHP_URL_PATH));
                        // Storage::disk('dropbox')->delete($dropboxPath);
                        // Log::info('delete file: '.$dropboxPath);
                        $this->dropbox->deleteFile($dropboxPath);
                    }
                    // Delete thumbnail from local storage
                    if ($video->thumb_url && file_exists(storage_path('app/public/' . $video->thumb_url))) {
                        @unlink(storage_path('app/public/' . $video->thumb_url));
                    }
                    $video->delete();
                }
                $cast->video1_id = null;
            }
        }
        if ($request->hasFile("video_1")) {
            $video1 = $request->file('video_1');
            // $path = Storage::disk('dropbox')->putFile($shop_slug, $video1);
            // Log::info('video1: '.$video1->getClientOriginalName());
            $file_ext = pathinfo($video1->getClientOriginalName(), PATHINFO_EXTENSION );
            // $file_name = uniqid().".".$file_ext;
            $file_name = $id."_".pathinfo($video1->getClientOriginalName(), PATHINFO_FILENAME )."_".Carbon::now()->format('YmdHis').".".$file_ext;
            $path = "/".$shop_slug."/".$file_name;
            // Log::info('upload file: '.$path);
            $this->dropbox->uploadFile($path, file_get_contents($video1->getPathname()));
            $sharedLink = $this->dropbox->createSharedLink($path);
            // Log::info('shared link: '.$sharedLink);
            $videoPath = str_replace('dl=0', 'raw=1', $sharedLink['url']);
            // Log::info('video path: '.$videoPath);
            // $client = Storage::disk('dropbox')->getAdapter()->getClient();
            // $sharedLink = $client->createSharedLinkWithSettings($path);
            // $videoPath = str_replace('dl=0', 'raw=1', $sharedLink['url']);

            $video = self::$ffmpeg->open($video1->getPathname());
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0.5));
            $thumbnailPath = 'thumbnail/' . uniqid() . '.jpg';
            $frame->save(storage_path('app/public/' . $thumbnailPath));

            $videoModel = Video::create([
                'cast_id' => $cast->id,
                'video_url' => $videoPath,
                'thumb_url' => $thumbnailPath,
            ]);
            $cast->video1_id = $videoModel->id;
        }
        if (!$request->old_video_2) {
            // remove the original video from DB and Dropbox
            if ($cast->video2_id) {
                $video = Video::find($cast->video2_id);
                if ($video) {
                    // Delete from Dropbox
                    if ($video->video_url) {
                        // Extract Dropbox path from URL if needed
                        $dropboxPath = $shop_slug . '/' . basename(parse_url($video->video_url, PHP_URL_PATH));
                        // Storage::disk('dropbox')->delete($dropboxPath);
                        $this->dropbox->deleteFile($dropboxPath);
                    }
                    // Delete thumbnail from local storage
                    if ($video->thumb_url && file_exists(storage_path('app/public/' . $video->thumb_url))) {
                        @unlink(storage_path('app/public/' . $video->thumb_url));
                    }
                    $video->delete();
                }
                $cast->video2_id = null;
            }
        }
        if ($request->hasFile("video_2")) {
            $video2 = $request->file('video_2');

            $file_ext = pathinfo($video2->getClientOriginalName(), PATHINFO_EXTENSION );
            $file_name = $id."_".pathinfo($video2->getClientOriginalName(), PATHINFO_FILENAME )."_".Carbon::now()->format('YmdHis').".".$file_ext;
            $path = "/".$shop_slug."/".$file_name;
            $this->dropbox->uploadFile($path, file_get_contents($video2->getPathname()));
            $sharedLink = $this->dropbox->createSharedLink($path);

            // $path = Storage::disk('dropbox')->putFile($shop_slug, $video2);

            // $client = Storage::disk('dropbox')->getAdapter()->getClient();
            // $sharedLink = $client->createSharedLinkWithSettings($path);
            $videoPath = str_replace('dl=0', 'raw=1', $sharedLink['url']);

            $video = self::$ffmpeg->open($video2->getPathname());
            $frame = $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(0.5));
            $thumbnailPath = 'thumbnail/' . uniqid() . '.jpg';
            $frame->save(storage_path('app/public/' . $thumbnailPath));

            $videoModel = Video::create([
                'cast_id' => $cast->id,
                'video_url' => $videoPath,
                'thumb_url' => $thumbnailPath,
            ]);
            $cast->video2_id = $videoModel->id;
        }

        $cast->is_public = $request->is_public ? true : false;
        $cast->memo = $request->memo;
        $cast->save();

        $cast->options()->sync($request->options);
        $cast->personalities()->sync($request->personalities);
        $cast->playstyles()->sync($request->playstyles);
        $cast->individualities()->sync($request->individualities);
        $cast->styles()->sync($request->styles);

        if ($request->filled('redirect')) {
            return redirect($request->input('redirect'))->with('success', 'キャスト情報を更新しました');
        }
        return redirect('/admin/cast/' . $cast->id);
    }

    /**
     * Destroy the specified cast.
     */
    public function destroy(string $id): RedirectResponse
    {
        $cast = Cast::find($id);
        $cast->delete();

        return redirect('admin/cast/sort');
    }
}

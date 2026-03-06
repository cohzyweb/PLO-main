<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\System;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class SystemController extends Controller
{
  
    const DEFAULT_LIMIT = 30;
    /**
     * Display a listing of the system.
     */
    public function index(Request $request): View
    {
        // $banners = Banner::where('is_public', true)->with('shop')->get();
        $systems = System::with('shop')->orderBy('id', 'asc')->get();
        // if ( $request->has('shop') && $request->query('shop') !== null) {
        //   $shop = $request->query('shop');
        //   $query -> whereHas('shop', function ($query) use ($shop) {
        //       $query->where('slug', $shop);
        //   });
  
        // }
  
        // if ($request->has('public') && $request->query('public') !== null) {
        //   $query->where('is_public', $request->query('public') ? true : false);
        // }
  
        // $total = $query->count();
  
        // $page = $request->query('page') ? (int) $request->query('page') : 1;
        // $limit = $request->query('limit') ? (int) $request->query('limit') : self::DEFAULT_LIMIT;
        // $skip = ($page - 1) * $limit;
        // $pages = ceil($total / $limit);
        // dd($systems[0]->shop);
        return view('admin.system.index', [
          'systems' => $systems,
          // 'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
          // 'page' => $page,
          // 'limit' => $limit,
          // 'skip' => $skip,
          // 'total' => $total,
          // 'pages' => $pages,
        ]);
    }

    /**
     * Create a banner.
     */
    // public function create(Request $request): View
    // {
    //     return view('admin.banner.create', [
    //       'shops' => Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get(),
    //     ]);
    // }

    /**
     * Store a banner.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'file_1' => 'required',
    //         'title' => 'required',
    //         'shop_id' => 'required',
    //     ],[
    //         'file_1.required' => __('message.thumbnail_required'),
    //         'title.required' => __('message.title_required'),
    //         'shop_id.required' => __('message.shop_id_required'),
    //     ]);

    //     $banner = Banner::Create([
    //         'is_public' => $request->is_public ? true : false,
    //         'link_url' => $request->link_url,
    //         'title' => $request->title,
    //         'shop_id' => $request->shop_id,
    //     ]);

    //     // dd($request);
    //     $file_path = "banner/{$banner->id}";
    //     $file1 = $request->file('file_1');
    //     $banner->thumbnail = $file1 ? $file1->store($file_path, 'public') : null;
    //     $banner->save();

    //     return redirect('/admin/banner')->with('success', __('message.admin_banner_create_success'));
    // }
    /**
     * Display the specified cast.
     */
    public function show(Request $request, string $id): View
    {
        return view('admin.system.detail', [
            'system' => System::with('shop')->findOrFail($id),
        ]);
    }

    /**
     * Update the specified cast.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // dd($request);
        // $validated = $request->validate([
        //     'path_1' => 'required',
        //     'path_2' => 'required',
        // ]);

        $file_path = "system/{$id}";

        $system = System::find($id);

        $file1 = $request->file('file_1');
        $file2 = $request->file('file_2');
        
        // ファイル1の処理: 有効なファイルがアップロードされた場合のみ保存
        if ($file1) {
            if ($file1->isValid()) {
                $system->header = $file1->store($file_path, 'public');
            } else {
                // アップロードエラーの詳細を取得
                $error = $file1->getError();
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE => 'ファイルサイズが upload_max_filesize の制限を超えています',
                    UPLOAD_ERR_FORM_SIZE => 'ファイルサイズがフォームの MAX_FILE_SIZE の制限を超えています',
                    UPLOAD_ERR_PARTIAL => 'ファイルが部分的にしかアップロードされていません',
                    UPLOAD_ERR_NO_FILE => 'ファイルがアップロードされていません',
                    UPLOAD_ERR_NO_TMP_DIR => '一時フォルダが見つかりません',
                    UPLOAD_ERR_CANT_WRITE => 'ディスクへの書き込みに失敗しました',
                    UPLOAD_ERR_EXTENSION => 'PHP拡張機能によってアップロードが停止されました',
                ];
                $errorMessage = $errorMessages[$error] ?? "不明なエラー (コード: {$error})";
                
                // エラーがある場合は既存のパスを保持（エラーメッセージはログに記録）
                Log::warning("ファイルアップロードエラー (file_1): {$errorMessage}", [
                    'error_code' => $error,
                    'file_name' => $file1->getClientOriginalName(),
                    'file_size' => $file1->getSize(),
                ]);
                
                if (!empty($request->path_1) && trim($request->path_1) !== '') {
                    $system->header = trim($request->path_1);
                } else {
                    $system->header = null;
                }
            }
        } elseif (!empty($request->path_1) && trim($request->path_1) !== '') {
            // ファイルがアップロードされていない場合は既存のパスを保持
            $system->header = trim($request->path_1);
        } else {
            // パスが空の場合はnullに設定
            $system->header = null;
        }
        
        // ファイル2の処理: 有効なファイルがアップロードされた場合のみ保存
        if ($file2) {
            if ($file2->isValid()) {
                $system->play = $file2->store($file_path, 'public');
            } else {
                // アップロードエラーの詳細を取得
                $error = $file2->getError();
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE => 'ファイルサイズが upload_max_filesize の制限を超えています',
                    UPLOAD_ERR_FORM_SIZE => 'ファイルサイズがフォームの MAX_FILE_SIZE の制限を超えています',
                    UPLOAD_ERR_PARTIAL => 'ファイルが部分的にしかアップロードされていません',
                    UPLOAD_ERR_NO_FILE => 'ファイルがアップロードされていません',
                    UPLOAD_ERR_NO_TMP_DIR => '一時フォルダが見つかりません',
                    UPLOAD_ERR_CANT_WRITE => 'ディスクへの書き込みに失敗しました',
                    UPLOAD_ERR_EXTENSION => 'PHP拡張機能によってアップロードが停止されました',
                ];
                $errorMessage = $errorMessages[$error] ?? "不明なエラー (コード: {$error})";
                
                // エラーがある場合は既存のパスを保持（エラーメッセージはログに記録）
                Log::warning("ファイルアップロードエラー (file_2): {$errorMessage}", [
                    'error_code' => $error,
                    'file_name' => $file2->getClientOriginalName(),
                    'file_size' => $file2->getSize(),
                ]);
                
                if (!empty($request->path_2) && trim($request->path_2) !== '') {
                    $system->play = trim($request->path_2);
                } else {
                    $system->play = null;
                }
            }
        } elseif (!empty($request->path_2) && trim($request->path_2) !== '') {
            // ファイルがアップロードされていない場合は既存のパスを保持
            $system->play = trim($request->path_2);
        } else {
            // パスが空の場合はnullに設定
            $system->play = null;
        }
        $system->save();

        return redirect(route('admin.system.index'))->with('success', __('message.admin_system_update_success'));
    }

    /**
     * Destroy the specified cast.
     */
    // public function destroy(string $id): RedirectResponse
    // {
    //     $banner = Banner::find($id);
    //     $banner->delete();

    //     return redirect(route('admin.banner.index'))->with('success', __('message.admin_banner_delete_success'));
    // }
}
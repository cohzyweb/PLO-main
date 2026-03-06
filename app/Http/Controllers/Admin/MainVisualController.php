<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\MainVisual;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainVisualController extends Controller
{
    /**
     * Display a listing of main visuals.
     */
    public function index(Request $request): View
    {
        $selectedShopId = null;
        $shops = Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get();
        
        // Check if user is shop manager
        $user = Auth::user();
        if ($user->hasRole('shop')) {
            $shopUser = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            if ($shopUser) {
                $selectedShopId = $shopUser->shop_id;
                $shops = Shop::where('id', $selectedShopId)->get();
            }
        } else {
            // Admin can select shop
            if ($request->has('shop_id') && $request->query('shop_id') !== null) {
                $selectedShopId = $request->query('shop_id');
            }
        }

        // Get main visuals for selected shop (null for group site)
        $mainVisuals = [];
        for ($i = 1; $i <= 5; $i++) {
            $visual = MainVisual::where('shop_id', $selectedShopId)
                ->where('image_order', $i)
                ->first();
            $mainVisuals[$i] = $visual;
        }

        return view('admin.main-visual.index', [
            'mainVisuals' => $mainVisuals,
            'shops' => $shops,
            'selectedShopId' => $selectedShopId,
            'isShopManager' => $user->hasRole('shop'),
        ]);
    }

    /**
     * Show the form for editing a main visual.
     */
    public function show(Request $request, string $id): View
    {
        $mainVisual = null;
        $shopId = $request->query('shop_id');
        $imageOrder = $request->query('image_order');
        
        if ($id !== 'new') {
            $mainVisual = MainVisual::findOrFail($id);
        } else {
            // Create new - check if already exists
            if ($shopId && $imageOrder) {
                $mainVisual = MainVisual::where('shop_id', $shopId)
                    ->where('image_order', $imageOrder)
                    ->first();
            }
        }
        
        $shops = Shop::whereNot('slug', 'touchvip')->orderBy('rank', 'asc')->get();
        
        // Get current shop for shop managers
        $user = Auth::user();
        if ($user->hasRole('shop')) {
            $shopUser = DB::connection('mysql')->table('shop_user')->where('user_id', $user->id)->first();
            if ($shopUser) {
                $shopId = $shopUser->shop_id;
            }
        }

        return view('admin.main-visual.detail', [
            'mainVisual' => $mainVisual,
            'shops' => $shops,
            'shopId' => $shopId,
            'imageOrder' => $imageOrder ?? ($mainVisual ? $mainVisual->image_order : null),
            'isNew' => $id === 'new' && !$mainVisual,
        ]);
    }

    /**
     * Create or update a main visual.
     */
    public function store(Request $request): RedirectResponse
    {
        $shopId = $request->shop_id ?: null;
        $imageOrder = $request->image_order;
        
        // Image 1 is required, others are optional
        $file1Rule = $imageOrder == 1 
            ? 'required_without:path_1|image|mimes:jpeg,jpg,png,webp|max:5120'
            : 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120';
        
        $messages = [
            'image_order.required' => '画像の順序を選択してください',
            'image_order.between' => '画像の順序は1-5の間で指定してください',
            'file_1.image' => '画像ファイルをアップロードしてください',
            'link_url.url' => '有効なURLを入力してください',
        ];
        
        if ($imageOrder == 1) {
            $messages['file_1.required_without'] = '画像1は必須です';
        }
        
        $request->validate([
            'shop_id' => 'nullable|exists:shops,id',
            'image_order' => 'required|integer|between:1,5',
            'file_1' => $file1Rule,
            'link_url' => 'nullable|url|max:500',
        ], $messages);

        // Check if main visual already exists for this shop and order
        $mainVisual = MainVisual::where('shop_id', $shopId)
            ->where('image_order', $imageOrder)
            ->first();

        if (!$mainVisual) {
            $mainVisual = new MainVisual();
            $mainVisual->shop_id = $shopId;
            $mainVisual->image_order = $imageOrder;
        }

        // Handle file upload
        $file1 = $request->file('file_1');
        if ($file1) {
            $file_path = "main-visual/" . ($shopId ?: 'group');
            $mainVisual->image_path = $file1->store($file_path, 'public');
        } elseif ($request->path_1) {
            $mainVisual->image_path = $request->path_1;
        }

        $mainVisual->link_url = $request->link_url;
        $mainVisual->is_public = $request->is_public ? true : false;
        $mainVisual->save();

        $redirectUrl = route('admin.main-visual.index');
        if ($shopId) {
            $redirectUrl .= '?shop_id=' . $shopId;
        }

        return redirect($redirectUrl)->with('success', 'メインビジュアル画像を保存しました');
    }

    /**
     * Update the specified main visual.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $mainVisual = MainVisual::findOrFail($id);

        $request->validate([
            'file_1' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'link_url' => 'nullable|url|max:500',
        ], [
            'file_1.image' => '画像ファイルをアップロードしてください',
            'link_url.url' => '有効なURLを入力してください',
        ]);

        // Handle file upload
        $file1 = $request->file('file_1');
        if ($file1) {
            $file_path = "main-visual/" . ($mainVisual->shop_id ?: 'group');
            $mainVisual->image_path = $file1->store($file_path, 'public');
        } elseif ($request->path_1) {
            $mainVisual->image_path = $request->path_1;
        }

        $mainVisual->link_url = $request->link_url;
        $mainVisual->is_public = $request->is_public ? true : false;
        $mainVisual->save();

        $redirectUrl = route('admin.main-visual.index');
        if ($mainVisual->shop_id) {
            $redirectUrl .= '?shop_id=' . $mainVisual->shop_id;
        }

        return redirect($redirectUrl)->with('success', 'メインビジュアル画像を更新しました');
    }

    /**
     * Destroy the specified main visual.
     */
    public function destroy(string $id): RedirectResponse
    {
        $mainVisual = MainVisual::findOrFail($id);
        $shopId = $mainVisual->shop_id;
        $mainVisual->delete();

        $redirectUrl = route('admin.main-visual.index');
        if ($shopId) {
            $redirectUrl .= '?shop_id=' . $shopId;
        }

        return redirect($redirectUrl)->with('success', 'メインビジュアル画像を削除しました');
    }
}

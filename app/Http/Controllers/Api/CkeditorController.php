<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CkeditorController extends Controller
{
    public function newsUpload(Request $request)
    {
        // Log::info($request->all());
        // Log::info($request->file('upload'));
        // Log::info($request->allFiles());
        // Log::info($request->file('file'));
        if (!$request->hasFile('upload')) {
            Log::info('No file uploaded');
            return response()->json(['error' => 'No file uploaded'], 422);
        }
        $request->validate([
            // 'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        Log::info('ok');
        $image = $request->file('upload');
        Log::info($image);
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $imageName);
        Log::info($imageName);
        
        // $image->move(storage_path('app/public/news'), $imageName);
        $image->storeAs('news/', $imageName,'public');
        $imageUrl = asset('storage/news/' . $imageName);
        Log::info($imageUrl);

        return response()->json(['message' => 'News uploaded successfully', 'url' => $imageUrl],201);
    }

    public function eventUpload(Request $request)
    {
        if (!$request->hasFile('upload')) {
            Log::info('No file uploaded');
            return response()->json(['error' => 'No file uploaded'], 422);
        }
        $request->validate([
            // 'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = $request->file('upload');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $imageName);
        
        // $image->move(storage_path('app/public/news'), $imageName);
        $image->storeAs('event/', $imageName,'public');
        $imageUrl = asset('storage/event/' . $imageName);

        return response()->json(['message' => 'event uploaded successfully', 'url' => $imageUrl],201);
    }
}

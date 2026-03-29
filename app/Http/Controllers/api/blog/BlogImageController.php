<?php

namespace App\Http\Controllers\api\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image',
        ]);

        $image = $request->file('image');
        $path = $image->store('uploads/posts', 'public'); // Store the image in the specified directory

        return response()->json(['link' => asset('storage/'.$path)]);
    }

    public function deleteImage(Request $request)
    {
        $url = $request->input('url');

        $path = parse_url($url, PHP_URL_PATH);
        $path = str_replace('/storage/', '', $path);

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);

            return response()->json([
                'success' => true,
                'path' => $path,
            ]);
        }

        return response()->json([
            'success' => false,
            'path' => $path,
            'message' => 'File not found',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ImageController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Images/IndexPage', [
            'images' => Image::orderByDesc('created_at')->get(),
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'alt' => 'nullable|string|max:255',
        ]);

        $file = $request->file('image');
        $path = $file->store('public/images');

        $image = Image::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'alt' => $request->input('alt'),
            'size' => $file->getSize(),
        ]);

        return response()->json([
            'image' => $image,
            'url' => Storage::url($path),
        ]);
    }

    public function destroy(Image $image): RedirectResponse
    {
        Storage::delete($image->path);
        $image->delete();

        return redirect()->route('admin.images.index')->with('success', '画像を削除しました。');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Photo;
use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    // Menampilkan halaman utama admin galeri beserta data album + foto + video
    public function index()
    {
        $albums = Album::with(['photos', 'videos'])->get();

        return view('admin.galeri.index', compact('albums'));
    }

    // Upload album baru
    public function uploadAlbum(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Album::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Album berhasil dibuat');
    }

    // Upload foto ke album
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'title' => 'nullable|string|max:255',
            'photo' => 'required|image|max:5120', // max 5MB
        ]);

        $file = $request->file('photo');
        $path = $file->store('photos', 'public');

        Photo::create([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return back()->with('success', 'Foto berhasil diupload');
    }

    // Upload video ke album
    public function uploadVideo(Request $request)
    {
        $request->validate([
            'album_id' => 'required|exists:albums,id',
            'title' => 'nullable|string|max:255',
            'video' => 'required|mimes:mp4,mov,avi|max:20000', // max 20MB
        ]);

        $file = $request->file('video');
        $path = $file->store('videos', 'public');

        Video::create([
            'album_id' => $request->album_id,
            'title' => $request->title,
            'video_url' => $path,
        ]);

        return back()->with('success', 'Video berhasil diupload');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Art;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function gallery()
    {
        $photos = Photo::all();
        return view('galeri-saya', compact('photos'));
    }

    public function art()
    {
        $arts = Art::all();
        return view('seni-saya', compact('arts'));
    }

    public function contact()
    {
        return view('kontak-saya');
    }

    public function uploadForm()
    {
        return view('upload-foto');
    }

    public function uploadArtForm()
    {
        return view('upload-art');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        Photo::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return redirect()->route('galeri-saya')->with('success', 'Foto berhasil diunggah!');
    }

    public function uploadArt(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'art' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('art')->store('arts', 'public');

        Art::create([
            'title' => $request->title,
            'image_path' => $path,
        ]);

        return redirect()->route('seni-saya')->with('success', 'Karya seni berhasil diunggah!');
    }

    public function destroyPhoto($id)
    {
        try {
            $photo = Photo::findOrFail($id);
            
            if (Storage::exists('public/' . $photo->image_path)) {
                Storage::delete('public/' . $photo->image_path);
            }
            
            $photo->delete();
            
            return redirect()->back()->with('success', 'Foto berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus foto');
        }
    }

    public function destroyArt($id)
{
    try {
        $art = Art::findOrFail($id);
        
        if (Storage::exists('public/' . $art->image_path)) {
            Storage::delete('public/' . $art->image_path);
        }
        
        $art->delete();
        
        return redirect()->back()->with('success', 'Karya seni berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus karya seni');
    }
}
}
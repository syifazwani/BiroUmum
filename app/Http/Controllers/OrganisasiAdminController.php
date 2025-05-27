<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganisasiAdminController extends Controller
{
    public function uploadStruktur(Request $request)
    {
        $request->validate([
            'strukturFoto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Hapus gambar lama jika hanya ingin 1 gambar
        if (Storage::disk('public')->exists('struktur/struktur.jpg')) {
            Storage::disk('public')->delete('struktur/struktur.jpg');
        }

        $file = $request->file('strukturFoto');
        $file->storeAs('struktur', 'struktur.jpg', 'public'); // selalu simpan dengan nama yang sama

        return back()->with('success', 'Struktur organisasi berhasil diunggah!');
    }

      public function hapusStruktur()
    {
        if (Storage::disk('public')->exists('struktur/struktur.jpg')) {
            Storage::disk('public')->delete('struktur/struktur.jpg');
            return back()->with('success', 'Struktur organisasi berhasil dihapus!');
        }

        return back()->with('error', 'Tidak ada file struktur untuk dihapus.');
    }

    public function uploadKebijakan(Request $request)
{
    $request->validate([
        'fileKebijakan' => 'required|mimes:pdf|max:5120', // 5MB maksimal
    ]);

    $file = $request->file('fileKebijakan');
    $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.pdf';
    $file->storeAs('kebijakan', $filename, 'public');

    return back()->with('success', 'File kebijakan berhasil diunggah!');
}

public function deleteKebijakan($filename)
{
    $path = 'kebijakan/' . $filename;

    if (Storage::disk('public')->exists($path)) {
        Storage::disk('public')->delete($path);
        return back()->with('success', 'File kebijakan berhasil dihapus!');
    }

    return back()->with('error', 'File tidak ditemukan.');
}

public function uploadRenstra(Request $request)
{
    $request->validate([
        'fileRenstra' => 'required|mimes:pdf|max:20480',
    ]);

    $file = $request->file('fileRenstra');
    $filename = $file->getClientOriginalName();

    $file->storeAs('renstra', $filename, 'public');

    return back()->with('success', 'File Renstra berhasil diunggah!');
}

public function deleteRenstra($filename)
{
    $filePath = 'renstra/' . $filename;
    if (Storage::disk('public')->exists($filePath)) {
        Storage::disk('public')->delete($filePath);
        return back()->with('success', 'File berhasil dihapus.');
    } else {
        return back()->with('error', 'File tidak ditemukan.');
    }
}


}

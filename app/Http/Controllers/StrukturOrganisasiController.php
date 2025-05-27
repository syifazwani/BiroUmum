<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $strukturs = StrukturOrganisasi::all();
        return view('informasi.organisasi', compact('strukturs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('image')->store('struktur', 'public');

        StrukturOrganisasi::create([
            'file_path' => $path,
        ]);

        return redirect()->route('informasi.organisasi')->with('success', 'Struktur berhasil diupload.');
    }

    public function destroy($id)
    {
        $struktur = StrukturOrganisasi::findOrFail($id);
        Storage::disk('public')->delete($struktur->file_path);
        $struktur->delete();

        return redirect()->route('informasi.organisasi')->with('success', 'Struktur berhasil dihapus.');
    }

    public function adminIndex()
{
    $strukturs = StrukturOrganisasi::all();
    return view('admin.OrganisasiAdmin', compact('strukturs'));
}

}

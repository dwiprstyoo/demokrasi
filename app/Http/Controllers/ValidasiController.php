<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ValidasiController extends Controller
{
    public function index()
    {
        $validasis = Post::latest()->get();
        return view('admin.index', compact('validasis'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'isi_laporan' => 'required',
            'status' => 'required'
        ]);
    }

    public function edit($id)
    {
        $validasi = Post::findOrFail($id);
        return view('admin.edit', compact('validasi'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'isi_laporan' => 'required',
            'status' => 'required'
        ]);

        $validasi = Post::findOrFail($id);
        $validasi->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'isi_laporan' => $request->isi_laporan,
            'status' => $request->status
        ]);

        if ($validasi) {
            return redirect()
                ->route('validasi.index')
                ->with([
                    'success' => 'validasi has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

}
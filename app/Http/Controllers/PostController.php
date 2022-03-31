<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'isi_laporan' => 'required',
            // 'status' => 'required'
            // 'file' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // $file = $request->file('file');
        // $filename = time()."_".$file->getClientOriginalName();
        // $directory = 'data_file';
        // $file -> move($directory,$filename);

        // $request = new Post;
        // $input = Post::all();
        // $file = $request->file ;
        
        // $destinationPath = 'menu_files';
        // $filename = $file->getClientOriginalName();
        // $upload_success = Post::file('file')->move($destinationPath, $filename);

        // echo "<PRE>";
        // print_r($filename);
        // die();

        $post = Post::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'isi_laporan' => $request->isi_laporan
            // 'file' => $file

        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'New post has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
            'isi_laporan' => 'required',
            'status' => 'required'
            // 'file'     => 'required|file|mimes:png,jpg,jpeg'
        ]);

        // $file = $request->file('file');
        // $file->storeAs('public/blogs', $file->hashName());


        // $post = Post::findOrFail($id);

        $post = Post::findOrFail($id);
        $post->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_telp' => $request->no_telp,
            'isi_laporan' => $request->isi_laporan,
            'status' => $request->status
            // 'file'     => $file->hashName()
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been updated successfully'
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

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}

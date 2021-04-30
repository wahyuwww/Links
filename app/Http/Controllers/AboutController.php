<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::paginate(10);
        return view('about.index',compact('about'));
    }
    public function create(){
        $about = About::paginate(10);
        // $kategori = Kategori::all();
        return view('about.create', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about = $request->all();
        $request->validate([
            'about' => 'required|max:25000',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($request->file('gambar')->isValid()) {
            $gambar = $request->file('gambar');
            $extention = $gambar->getClientOriginalExtension();
            $namaFoto = "" . date('YmdHis') . "." . $extention;
            $upload_path = 'uploads/';
            $request->file('gambar')->move($upload_path, $namaFoto);
            $about['gambar'] = $namaFoto;
        }

        About::create($about);
        return redirect()->route('about.index')->with('status', 'About Berhasil Ditambahankan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
       
        $abouts =  About::findOrFail($id);
        return view('about.edit', [
            'abouts' => $abouts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $abouts = About::findOrFail($id);

        $input = $request->all();
        // dd($item);
        if ($request->hasFile('gambar')) {
            if ($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($abouts->gambar);

                $cover = $request->file('gambar');
                $extention = $cover->getClientOriginalExtension();
                $namaCover = "" . date('YmdHis') . "." . $extention;
                $upload_path = 'uploads/';
                $request->file('gambar')->move($upload_path, $namaCover);
                $input['gambar'] = $namaCover;
            }
        }
       
        $abouts->update($input);
        return redirect()->to('/dashboard/about');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
        return redirect()->route('about.index')->with('status', 'Data About Berhasil dihapus');
    }
}

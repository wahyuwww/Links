<?php

namespace App\Http\Controllers;

use App\ShortUrl;
use Illuminate\Http\Request;

class ShortUserController extends Controller
{
    public function index()
    {
        $links = ShortUrl::paginate(6);

        return view('kompres.index', compact('links'));
    }
    public function destroy($id){
        $links = ShortUrl::findOrFail($id);
        $links->delete();
        return redirect()->to('/dashboard/kompres')->with('status', 'user berhasil di hapus');
    }
}

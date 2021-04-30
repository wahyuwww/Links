<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinkAdmin;
use App\User;
use Illuminate\Support\Facades\Auth;

class LinkAdminController extends Controller
{
    public function index(){
        $links = LinkAdmin::all();
        $user = User::all();
        //dd($user);
        return view('linksAdmin.index', [
            'links' => $links,
            'userss'=>$user
        ]);
    }
    public function destroy($id)
    {
        $link = LinkAdmin::findOrFail($id);
        $link->delete();
        return redirect()->route('linksAdmin.index')->with('status', 'Data About Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;
use Hash;
use DB;

class UserController extends Controller
{
    public function show(User $user)
    {
        $backgroundColor = $user->background_color;
        $textColor = $user->text_color;

        $user->load('links');

        return view('users.show', [
            'user' => $user,
            'backgroundColor' => $backgroundColor,
            'textColor' => $textColor
        ]);
    }

    public function edit()
    {
        return view('users.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        // //$item = $request->all();
        // $userid = Auth::user()->id;
        // $input = User::find($userid);
        // $request->validate([
        //     'avatar_file' =>  'sometimes|nullable|mimes:jpeg,jpg,png|max:5048',
        //     'background_color' => 'required|size:7|starts_with:#',
        //     'text_color' => 'required|size:7|starts_with:#'
        // ]);
       
        // $input = User::find($id);
        // $input->username = $request->full_name;
        // $input->email     = $request->email;
        // if ($request->password != NULL) {
        //     $input->password = Hash::make($request->password);
        // }

        // if ($request->hasFile('avatar_file')) {
        //     if ($request->file('avatar_file')->isValid()) {
        //         Storage::disk('upload')->delete($input->avatar_file);

        //         $avatar_file = $request->file('avatar_file');
        //         $extention = $avatar_file->getClientOriginalExtension();
        //         // $namaFoto = "document/" . date('YmdHis') . "." . $extention;
        //         $namaFoto = date('YmdHis') . "." . $extention;

        //         $upload_path = 'uploads/document/';
        //         // dd($request->file('avatar_file')->move($upload_path, $namaFoto));
        //         $request->file('avatar_file')->move($upload_path, $namaFoto);
        //         $input->avatar_file = $namaFoto;
        //         //  dd($namaFoto);
        //     }
        // }

        

        $request->validate([
            'background_color' => 'required|size:7|starts_with:#',
            'text_color' => 'required|size:7|starts_with:#',
            'username' => 'required|regex:/^\S*$/u|max:100|unique:users,username,' ,
            'email' => 'required|email|max:255',
            'avatar_file' =>  'sometimes|nullable|mimes:jpeg,jpg,png|max:5048'
        ]);
         $userid = Auth::user()->id;
        $user = User::find($userid);
        $user->username = $request->username;
        $user->background_color = $request->background_color;
        $user->text_color = $request->text_color;
        $user->email     = $request->email;
        if ($request->password != NULL) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar_file')) {
            if ($request->file('avatar_file')->isValid()) {
                Storage::disk('upload')->delete($user->avatar_file);

                $avatar_file = $request->file('avatar_file');
                $extention = $avatar_file->getClientOriginalExtension();
                // $namaFoto = "document/" . date('YmdHis') . "." . $extention;
                $namaFoto = date('YmdHis') . "." . $extention;

                $upload_path = 'uploads/';
                // dd($request->file('avatar_file')->move($upload_path, $namaFoto));
                $request->file('avatar_file')->move($upload_path, $namaFoto);
                $user->avatar_file = $namaFoto;
                //  dd($namaFoto);
            }
        }

        $user->save();
        //Auth::user()->update($request->only(['background_color', 'text_color','avatar_file','username']));
        // $input->save();
        //return redirect()->route('frontend')->with('status', 'User Berhasil Diupdate');
        return redirect()->back()
            ->with(['success' => 'Changes saved successfully!']);
    }

}

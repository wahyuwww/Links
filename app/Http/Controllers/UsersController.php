<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use Illuminate\Support\Arr;
use Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = User::paginate(100000);
        $type = UserType::all();
        return view('user.index', compact('data_user', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create()
    {
       $data_user = UserType::paginate(10);
        // $kategori = Kategori::all();
        return view('user.create', compact('data_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Kelola = $request->all();

        $rules = [
            'nip' => 'required|max:250',
            'username' => 'required|regex:/^\S*$/u|max:100|unique:users,username',
            'email' => 'required|email|max:255',
            //'password' => 'sometimes|nullable|min:6',
            'password' => 'required|max:250',
            'user_type_id' => 'required|max:250',

        ];

        $messages = [
            'username.regex' => 'Tidak Boleh memakai spasi .'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

     
        $Kelola['password'] = bcrypt($Kelola['password']);
        User::create($Kelola);

        if ($Kelola) {
            return redirect()->to('/dashboard/user');
        }

        return redirect()->back();
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
    public function edit($id)
    {
        $kelola = UserType::all();
        $user =  User::findOrFail($id);
        return view('user.edit', compact('user', 'kelola'));
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
        $user = User::findOrFail($id);
        $item = $request->all();
        $rules = [
            'nip' => 'required|max:250',
            'username' => 'required|regex:/^\S*$/u|max:100|unique:users,username,' . $id,
            'email' => 'required|email|max:255',
            //'password' => 'sometimes|nullable|min:6',
            'user_type_id' => 'required|max:250',

        ];

        $messages = [
            'username.regex' => 'Tidak Boleh memakai spasi .'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('users.edit', [$id])->withErrors($validator)->withInput($request->all());
        }
        if ($request->input('password')) {

            //jika pasword diisi
            $data['password'] = bcrypt($item['password']);
        } else {
            //juka passowrd tydak diisi
            $item = Arr::except($item, ['password']);
        }
        $user->update($item);

        return redirect()->to('/dashboard/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_user = User::findOrFail($id);
        $data_user->delete();
        return redirect()->to('/dashboard/user')->with('status', 'user berhasil di hapus');
    }
}

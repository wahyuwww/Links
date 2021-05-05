@extends('layouts.template')
@section('title')
edit user
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Your settings</h2>
                <form action="/dashboard/user/{{ $user->id }}" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nip">Nama</label>
                                <input name="nip" id="nip" class="form-control" placeholder="masukan nama"
                                    value="{{$user->nip}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group ">
                                <label for="email">Email</label>
                                <input name="email" id="email" class="form-control" placeholder="masukan email" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group ">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="masukan Password">
                            </div>
                    
                        </div>
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group ">
                                <label for="username">username</label>
                                <input name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="masukan username"
                                    value="{{$user->username}}">
                                    @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                            </div>
                    
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="user_type_id">Level</label>
                                <div class="input-group">
                                    <select id="user_type_id" name="user_type_id" class="form-control">
                                        @foreach($kelola as $row )
                                        <option value="{{ $row->user_type_id }}" @if($user->user_type_id == $row->user_type_id) Selected
                                            @endif>{{ $row->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- text input -->
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <button type="submit"
                                class="btn btn-primary{{ session('success') ? ' is-valid' : '' }}">Save
                                Settings</button>
                            @if(session('success'))
                            <div class="valid-feedback">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
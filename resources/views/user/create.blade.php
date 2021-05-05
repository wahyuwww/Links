@extends('layouts.template')
@section('title')
Buat user
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a new link</h2>
                    <form action="/dashboard/user/tambah" method="post">
                       <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nip">Nama</label>
                                    <input name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror"
                                        placeholder="masukan nip" value="{{old('nip')}}">
                                    @error('nip')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group ">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="masukan email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group ">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="masukan Password"
                                        value="{{old('password')}}">
                                    @error('password')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                        
                            </div>
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group ">
                                    <label for="username">username</label>
                                    <input name="username" id="username" class="form-control @error('username') is-invalid @enderror"
                                        placeholder="masukan username" value="{{old('username')}}">
                                    @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                        
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="user_type_id">Level</label>
                                    <select id="user_type_id" name="user_type_id"
                                        class="form-control @error('user_type_id') is-invalid @enderror">
                                        <option selected disabled>Level</option>
                                        @foreach($data_user as $row )
                                        <option value="{{ $row->user_type_id }}">{{ $row->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_type_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <!-- text input -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary">Save Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

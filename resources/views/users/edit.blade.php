@extends('layouts.template')
@section('title')
Setting Profil
@endsection
@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Your settings</h2>
                    <form action="/dashboard/settings" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color</label>
                                    <input type="text" id="background_color" name="background_color" class="form-control{{ $errors->first('background_color') ? ' is-invalid' : '' }}" placeholder="#ffffff" value="{{ $user->background_color }}">
                                    @if($errors->first('background_color'))
                                        <div class="invalid-feedback">{{ $errors->first('background_color') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="text_color">Text Color</label>
                                    <input type="text" id="text_color" name="text_color" class="form-control{{ $errors->first('text_color') ? ' is-invalid' : '' }}" placeholder="#000000" value="{{ $user->text_color }}">
                                    @if($errors->first('text_color'))
                                        <div class="invalid-feedback">{{ $errors->first('text_color') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary{{ session('success') ? ' is-valid' : '' }}">Save Settings</button>
                                @if(session('success'))
                                    <div class="valid-feedback">{{ session('success') }}</div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($user->avatar_file != NULL)
                        <img class="img-fluid img-circle" id="gambar"
                            src="{{ URL::to('/') }}/uploads/{{$user->avatar_file}}">
    
                        @elseif($user->avatar_file == NULL)
                        <img class="profile-user-img img-fluid img-circle" id="gambar"
                            src="{{ asset('template/user.png') }}">
                        @endif
                    </div>
                    <br>
    
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nama</b> <a class="float-right">{{$user->username}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                        </li>
                        {{-- <li class="list-group-item">
                <b>HM</b> <a class="float-right">{{$input->id}}</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane" id="settings">
                       <form action="/dashboard/settings" method="post" enctype="multipart/form-data">
                            @csrf
                             <div class="form-group row">
                                <div class="col-sm-10">
                                   <label for="background_color">Background Color</label>
                                    <input type="text" id="background_color" name="background_color"
                                        class="form-control{{ $errors->first('background_color') ? ' is-invalid' : '' }}" placeholder="#ffffff"
                                        value="{{ $user->background_color }}">
                                    @if($errors->first('background_color'))
                                    <div class="invalid-feedback">{{ $errors->first('background_color') }}</div>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-sm-10">
                                   <label for="text_color">Text Color</label>
                                    <input type="text" id="text_color" name="text_color"
                                        class="form-control{{ $errors->first('text_color') ? ' is-invalid' : '' }}" placeholder="#000000"
                                        value="{{ $user->text_color }}">
                                    @if($errors->first('text_color'))
                                    <div class="invalid-feedback">{{ $errors->first('text_color') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{$user->username}}" id="inputName">
                                    @error('username')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$user->email}}">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" id="password" class="form-control "
                                        placeholder="Password" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                <label for="avatar_file" class="form-label">Masukan Profil</label>
                                <input id="preview_gambar" type="file" name="avatar_file" class="form-control" placeholder=" yuk masukan gambar">
                                @error('avatar_file')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                </div>
                            </div>
                            
                            <br>    
                           <div class="row">
                                <div class="col-12">
                                    @csrf
                                    <button type="submit" class="btn btn-primary{{ session('success') ? ' is-valid' : '' }}">Save Settings</button>
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
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <br>
                <div class="text-center">
                    @if($user->avatar_file != NULL)
                    <img style="height: 200px; width:200px" class="img-raised rounded-circle img-fluid" id="gambar" src="{{ URL::to('/') }}/uploads/{{$user->avatar_file}}">
                
                    @elseif($user->avatar_file == NULL)
                    <img class="profile-user-img img-fluid img-circle" id="gambar" src="{{ asset('template/user.png') }}">
                    @endif
                    <h3>{{$user->username}}</h3>
                </div>
                @foreach($user->links as $link)
                    <div class="link">
                        <a
                            class="user-link d-block p-4 mb-4 rounded h3 text-center"
                            style="border: 2px solid {{ $textColor }}; color: {{ $textColor }}"
                            href="{{ $link->link }}"
                            target="_blank"
                            rel="nofollow"
                            data-link-id="{{ $link->id }}"
                        >{{ $link->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('layouts.template')
@section('title')
    Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                @foreach($about as $item)
               <div class="row">
                    <div class="col-12 col-md-6">
                        <h2 class="card-title"><img class="img-thumbnail" width="500px" src="{{ asset('uploads/'.$item->gambar) }}" />
                        </h2>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="card-text">{!!$item->about!!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
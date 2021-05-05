@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                @foreach($about as $item)
                <div class="col-md-6">
                <h2 class="card-title"><img class="img-thumbnail" width="100px"
                        src="{{ asset('uploads/'.$item->gambar) }}" /></h2>
                </div>
                <div class="col-md-6">
                <p class="card-text">{!!$item->about!!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
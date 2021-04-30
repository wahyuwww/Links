@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                @foreach($about as $item)
                <h2 class="card-title"><img class="img-thumbnail" width="100px"
                        src="{{ asset('uploads/'.$item->gambar) }}" /></h2>
                <p class="card-text">{!!$item->about!!}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.template')
@section('title')
 Memperpendek Link
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <section>
                    <div class="container">
                        @if (session('success_message'))
                        {!! session('success_message') !!}
                        @endif
                        <br>
                        @error('original_url')
                        <div class="alert alert-warning alert-block">
                            <b>{{ $message }}</b>
                        </div>
                        @enderror
                        <br>
                        <form method="POST" action="{{ route('short.url') }}">
                            <div class="input-group">
                                @csrf
                                <input type="text" name="original_url"
                                    class="form-control bg-light border-5 small mr-sm-10" placeholder="Link for..."
                                    aria-describedby="basic-addon2">

                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"> Sort
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.template')
@section('title')
Edit about
@endsection
@section('content')
@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">Your settings</h2>
               <form class="form-horizontal" method="post" action="{{ route('about.update',[$abouts->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <label for="cover" class="col-sm-4 control-label">Gambar Slide</label>
                    <div class="col-sm-12">
                    
                        <img src="{{ asset('uploads/'.$abouts->gambar) }}" class="img-thumbnail" width="100%" height="100%">
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label for="formFile" class="form-label">Masukan Gambar</label>
                            <input id="preview_gambar" type="file" name="gambar" class="form-control" placeholder=" yuk masukan gambar">
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label>Edit About</label>
                               <textarea id="summernote" name="about" class="form-control "
                                    style="height: 400px !important;">{{$abouts->about}}</textarea>{{old('about')}}
                            </div>
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
@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endpush
@endsection
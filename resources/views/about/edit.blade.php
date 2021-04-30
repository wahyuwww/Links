@extends('layouts.app')
@section('content')
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
                        <div class="col-sm-12">
                            <div class="form-group">
                    
                                <input type="file" id="cover" name="gambar" class="form-control @error('cover') is-invalid @enderror"
                                    id="cover">
                                @error('cover')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                </div>
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label>Edit Deskripsi</label>
                            <input type="text" id="summernote" name="about" class="form-control" placeholder=" yuk masukan kategori" required
                                value="{{$abouts->about}}">{{old($abouts->about)}}
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
@endsection
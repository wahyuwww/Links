@extends('layouts.template')
@section('title')
Buat about
@endsection
@section('content')
@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a new link</h2>
                   <form method="post" action="{{ route('about.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                   <label>Masukan Deskripsi About</label>
                                    <textarea id="summernote" name="about" class="form-control" placeholder=" yuk masukan About" required></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label for="formFile" class="form-label">Masukan Gambar</label>
                                <input id="preview_gambar" type="file" name="gambar" class="form-control" placeholder=" yuk masukan gambar">
                            </div>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-xl"><i class="far fa-save"></i>
                            Simpan</button>
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

@extends('layouts.app')

@section('title')
Data User
@endsection

@section('content')

@push('addon-style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>
    <div class="card-body">
        <div class="col-md-10">
            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success"><span
                    class=" fa fa-plus-circle"></span>
                Tambah User</a>
        </div>
        <br>
        <div class="table-responsive">
           
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>About</th>
                        <th>Gambar</th>
                        <th style="text-align:center">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($about as $abouts)
                    <tr>
                        <td>{{ $loop->iteration + ($about->perPage() * ($about->currentPage() - 1)) }}
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($abouts->about , 50, ' ...') }}</td>
                       <td><img class="img-thumbnail" width="100px" src="{{ asset('uploads/'.$abouts->gambar) }}" /></td>
                        <td style="text-align:center">
                            <form method="post" action="{{ route('about.destroy',[$abouts->id]) }}"
                                onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-round btn-warning"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i></button>
                               <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            
                            <a class="btn btn-round btn-success btn-md" href="{{ route('about.edit',[$abouts->id]) }}"><i class="fa fa-pencil-square-o"aria-hidden="true"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <tfoot>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $about->appends(Request::all())->links() }}
                    </ul>
                </nav>
            </tfoot>
        </div>
    </div>

    @foreach ($about as $item)
    <div class="modal fade" id="modal-default2-{{$item->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">About</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/dashboard/about/{{ $item->id }}">
                    @csrf

                    <div class="form-group">
                        <div class="modal-body">
                            <label>Edit Deskripsi</label>
                            <textarea type="text" id="summernote" name="about" class="form-control"
                                placeholder=" yuk masukan kategori" required
                                value="{{$item->about}}">{{old($item->about)}}</textarea>
                        </div>
                        <div class="modal-body">
                            <label>Masukan Gambar</label>
                            <p></p>
                            <img id="gambar_load" width="100%" height="100%" />
                            <p>file png,jpg,jpeg max 5 Mb</p>
                            <input id="preview_gambar" type="file" name="gambar" class="form-control" placeholder=" yuk masukan gambar">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-xl"><i class="far fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('about.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="modal-body">
                            <label>Masukan Deskripsi About</label>
                            <textarea id="summernote" name="about" class="form-control" placeholder=" yuk masukan About"
                                required></textarea>
                        </div>
                        <div class="modal-body">
                            <label>Masukan Gambar</label>
                            <p></p>
                            <img id="gambar_load" width="100%" height="100%" />
                            <p>file png,jpg,jpeg max 5 Mb</p>
                            <input id="preview_gambar" type="file" name="gambar" class="form-control" placeholder=" yuk masukan gambar">
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-xl"><i class="far fa-save"></i>
                                Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
@endpush
<script>
    function bacagambar(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#gambar_load').attr('src', e.target.result)
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $("#preview_gambar").change(function() {
          bacagambar(this);
      });
</script>
@endsection
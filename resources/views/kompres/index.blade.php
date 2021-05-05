@extends('layouts.template')

@section('title')
Data kompres link
@endsection

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data kompres link</h6>
    </div>
    <div class="card-body">
        <br>
        <div class="table-responsive">
            {{-- @include('alert.success') --}}
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                       <th>No</th>
                        <th>Link Asli</th>
                        <th>User</th>
                        <th>Kompres</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                    <tr>
                        <td>{{ $link->id }}
                        </td>
                        <td>{{ $link->original_url}}</td>
                        @if($link->user_id)
                        <td>{{$link->user->username}}</td>
                        @else
                        <td>tidak ada</td>
                        @endif
                        <td>{{ $link->short_url }}</td>
                        <td><form method="post" action="{{ route('kompres.destroy',[$link->id]) }}"
                            onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-round btn-warning"> Hapus</button>
                        </form></td>
                        {{-- <td><a href="{{ $link->short_url }}"></a>{{ $link->short_url }}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <tfoot>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $links->appends(Request::all())->links() }}
                    </ul>
                </nav>
            </tfoot>
        </div>
    </div>
</div>



@endsection
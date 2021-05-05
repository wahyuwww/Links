@extends('layouts.template')
@section('title')
    Your links
@endsection
@section('content')
@push('addon-style')
<link href="{{asset('master/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
              <a href="/dashboard/links/new" class="btn btn-primary">Add Link</a>
                <a target="_blank"href="/user/{{auth::user()->username}}" class="btn btn-info">Akses Link</a>
                <br>
               <div class="table-responsive">
                   @include('alert.success')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Url</th>
                            <th scope="col">Visits</th>
                            <th scope="col">Last Visit</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                        <tr>
                            <td>{{ $link->name }}</td>
                            <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                            <td>{{ $link->visits_count }}</td>

                            <td>{{ $link->latest_visit ? $link->latest_visit->created_at->format('M j Y - H:ia') : 'N/A' }}
                            </td>
                            <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </div>
</div>
@push('addon-script')
<script src="{{asset('master/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('master/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('master/js/demo/datatables-demo.js')}}"></script>
@endpush
@endsection
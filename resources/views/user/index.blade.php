@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">User</h2>
                    <div class="col-md-12">
                        <a href="/dashboard/user/tambah" class="btn btn-primary">Add User</a>
                        <br>
                        <br>
                    </div>
                    <table class="table table-striped">
                       
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_user as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($data_user->perPage() * ($data_user->currentPage() - 1)) }}
                                    </td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->UserType->type}}</td>
                                    <td>
                                       <form method="post" action="{{ route('users.destroy',[$item->id]) }}"
                                            onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        <a class="btn btn-round btn-success" href="/dashboard/user/{{ $item->id }}">Edit</a>
                                            <button type="submit" class="btn btn-round btn-warning"> Hapus<i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
@endsection

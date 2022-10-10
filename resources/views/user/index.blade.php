@extends('layouts.admin')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @section('title')
                            Management User
                        @endsection
                        <h4>Management User</h4>
                    </div>
                    {{-- <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                @php $no = 1; @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="">
                                            <a class="btn btn-outline-success me-2 mb-2"
                                                href="{{ route('users.edit', $user->id) }}">Edit</a>

                                            <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" type="submit"
                                                    onclick="return confirm('Yakin mau dihapus qaqa?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-12"> --}}
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                @if(session()->has('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table id="table-1" class="table table-striped table-md">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-right">
                                                    <a class="btn btn-outline-success mr-2"
                                                        href="{{ route('users.edit', $user->id) }}">Edit</a>

                                                    <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-outline-danger" type="submit"
                                                            onclick="return confirm('Yakin mau dihapus qaqa?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>

@endsection

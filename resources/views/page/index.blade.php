@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Management Pages
                @endsection
                <h4>Management Pages</h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('pages.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    @if (session()->has('status'))
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
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Meta</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Preview</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->meta }}</td>
                                    <td><img src="{{ asset('uploads/' . $page->image) }}" alt="" style="width: 60px"></td>
                                    @if ($page->status == 'pending')
                                        <td>
                                            <div class="badge badge-warning">Pending</div>
                                        </td>
                                    @elseif($page->status == 'publish')
                                        <td>
                                            <div class="badge badge-success">Publish</div>
                                        </td>
                                    @endif
                                    <td> <a href="{{ url($page->slug) }}" target="_blank">
                                        <button type="button" class="btn btn-danger">Preview</button>
                                    </a></td>
                                    <td class="text-right">
                                        <a class="btn btn-outline-warning mr-2"
                                            href="{{ route('pages.show', $page->id) }}">Manage</a>
                                        <a class="btn btn-outline-success mr-2"
                                            href="{{ route('pages.edit', $page->id) }}">Edit</a>

                                        <form action="{{ route('pages.delete', $page->id) }}" method="POST" class="d-inline">
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
        </div>
    </div>
</div>

@endsection

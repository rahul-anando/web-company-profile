@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Management Menus
                    @endsection
                    <h4>Management Menus</h4>
                </div>
                {{-- <div class="card-body">
                    <a href="{{ route('menus.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Outbound</th>
                                <th>Parent</th>
                                <th>Index</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ($menus as $menu)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->link }}</td>
                                    @if ($menu->is_outbound == '0')
                                    <td><div class="badge badge-danger">Inbound</div></td>
                                    @elseif($menu->is_outbound == "1")
                                    <td><div class="badge badge-success">Outbound</div></td>
                                    @endif

                                    <td>{{ $menu->parent }}</td>
                                    <td>{{ $menu->index }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-success mr-2"
                                            href="{{ route('menus.edit', $menu->id) }}">Edit</a>

                                        <form action="{{ route('menus.delete', $menu->id) }}" method="POST">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <a href="{{ route('menus.create') }}" class="btn btn-primary float-left mb-4">Tambah Data</a>
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Outbound</th>
                                        <th>Parent</th>
                                        <th>Index</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $menu->name }}</td>
                                            <td>{{ $menu->link }}</td>
                                            @if ($menu->is_outbound == '0')
                                                <td>
                                                    <div class="badge badge-danger">Inbound</div>
                                                </td>
                                            @elseif($menu->is_outbound == '1')
                                                <td>
                                                    <div class="badge badge-success">Outbound</div>
                                                </td>
                                            @endif
                                            <td>{{ $menu->parent }}</td>
                                            <td>{{ $menu->index }}</td>
                                            <td class="d-flex float-right">
                                                <a class="btn btn-outline-success mr-2"
                                                    href="{{ route('menus.edit', $menu->id) }}">Edit</a>

                                                <form action="{{ route('menus.delete', $menu->id) }}" method="POST">
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
    </div>
</section>

@endsection

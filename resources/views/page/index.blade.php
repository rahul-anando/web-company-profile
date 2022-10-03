@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Management Pages
                    @endsection
                    <h4>Management Pages</h4>
                </div>
                {{-- <div class="card-body">
                    <a href="{{ route('pages.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Meta</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->meta }}</td>
                                    <td><img src="{{ asset('uploads/' . $page->image) }}" alt="" style="width: 60px"></td>
                                    @if ($page->status == 'pending')
                                    <td><div class="badge badge-warning">Pending</div></td>
                                    @elseif($page->status == "publish")
                                    <td><div class="badge badge-success">Publish</div></td>
                                    @endif
                                    <td class="d-flex">
                                        <a class="btn btn-outline-success mr-2"
                                            href="{{ route('pages.edit', $page->id) }}">Edit</a>

                                        <form action="{{ route('pages.delete', $page->id) }}" method="POST">
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
                            <a href="{{ route('pages.create') }}" class="btn btn-primary float-left mb-4">Tambah Data</a>
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Meta</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $page->title }}</td>
                                            <td>{{ $page->slug }}</td>
                                            <td>{{ $page->meta }}</td>
                                            <td><img src="{{ asset('uploads/' . $page->image) }}" alt=""
                                                    style="width: 60px"></td>
                                            @if ($page->status == 'pending')
                                                <td>
                                                    <div class="badge badge-warning">Pending</div>
                                                </td>
                                            @elseif($page->status == 'publish')
                                                <td>
                                                    <div class="badge badge-success">Publish</div>
                                                </td>
                                            @endif
                                            <td class="d-flex float-right">
                                                <a class="btn btn-outline-success mr-2"
                                                    href="{{ route('pages.edit', $page->id) }}">Edit</a>

                                                <form action="{{ route('pages.delete', $page->id) }}" method="POST">
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

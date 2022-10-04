@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Management Section
                @endsection
                <h4>Management Section</h4>
            </div>
            {{-- <div class="card-body">
                <a href="{{ route('sections.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Index</th> --}}

                            {{-- <th>Page_id</th> --}}
                            {{-- <th>Template_id</th> --}}

                            {{-- <th>Action</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->slug }}</td>
                                <td>{{ $section->content }}</td> --}}

                                {{-- <td>{{ $section->page }}</td> --}}
                                {{-- <td>{{ $section->template }}</td> --}}

                                {{-- <td>{{ $section->index }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-outline-success mr-2"
                                        href="{{ route('sections.edit', $section->id) }}">Edit</a>

                                    <form action="{{ route('sections.delete', $section->id) }}" method="POST">
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
                        <a href="{{ route('sections.create') }}" class="btn btn-primary float-left mb-4">Tambah Data</a>
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Index</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->slug }}</td>
                                        <td>{{ $section->content }}</td>

                                        {{-- <td>{{ $section->page }}</td> --}}
                                        {{-- <td>{{ $section->template }}</td> --}}

                                        <td>{{ $section->index }}</td>
                                        <td class="d-flex float-right">
                                            <a class="btn btn-outline-success mr-2"
                                                href="{{ route('sections.edit', $section->id) }}">Edit</a>

                                            <form action="{{ route('sections.delete', $section->id) }}" method="POST">
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

@endsection

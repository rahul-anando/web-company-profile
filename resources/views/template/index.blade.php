@extends('layouts.admin')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Management Templates
                    @endsection
                    <h4>Management Templates</h4>
                </div>
                {{-- <div class="card-body"> --}}

                    {{-- <a href="{{ route('templates.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a> --}}
                    {{-- <button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal"
                        data-target="#myModal">Tambah Data</button> --}}

                    {{-- <button class="btn btn-primary float-right mb-3" id="btn-tambah " onclick="tambah()">Tambah
                        Data</button>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>No</th>
                                <th>Blade</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            @php $no = 1; @endphp
                            @foreach ($templates as $template)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $template->blade }}</td>
                                    <td><img src="{{ asset('uploads/' . $template->image) }}" alt=""
                                            style="width: 60px"></td>
                                    <td class=""> --}}

                                        {{-- <a class="btn btn-outline-success mr-2"
                                            href="{{ route('templates.edit', $template->id) }}">Edit</a> --}}

                                        {{-- <button class="btn btn-outline-success me-2 mb-2" id="btn-tambah "
                                            onclick="edit()">Edit</button> --}}

                                        {{-- <button type="button" class="btn btn-outline-success me-2 mb-2" data-toggle="modal" data-target="#modalEdit">Edit</button> --}}

                                        <!-- Modal -->
                                    {{-- <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal-title">Edit Templates</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card-body">
                                                        <form action="{{ route('templates.update', ['templates' => $template->id]) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="card">
                                                                @csrf
                                                                @method('put')
                                                                <div class="form-group mx-3">
                                                                    <label class="form-control-placeholder" for="blade">Blade</label>
                                                                    <input id="blade" type="text" class="form-control" name="blade" autocomplete="blade"
                                                                        placeholder="Input Blade" value="{{ $template->blade }}">
                                                                    @error('blade')
                                                                        <span class="text-danger small" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group mx-3">
                                                                    <label class="form-control-placeholder" for="image">Image</label>
                                                                    @if ($template->image)
                                                                        <img src="{{ asset('uploads/' . $template->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
                                                                    @endif
                                                                    <input id="image" type="file" class="form-control" name="image">
                                                                    @error('image')
                                                                        <span class="text-danger small" role="alert">
                                                                            {{ $message }}
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div> --}}

                                                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}

                                                            {{-- <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <form action="{{ route('templates.delete', $template->id) }}" method="POST">
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
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-primary" id="btn-tambah " onclick="tambah()">Tambah Data</button>
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
                                        <th>Image</th>
                                        <th>Blade</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                    <tr>
                                        <td><img src="{{ asset('uploads/' . $template->image) }}" alt=""
                                            style="width: 60px"></td>
                                        <td>{{ $template->blade }}</td>
                                        <td class="">
                                            {{-- <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#modalEdit">Edit</button> --}}
                                            <a class="btn btn-outline-success mr-2"
                                            href="{{ route('templates.edit', $template->id) }}">Edit</a>

                                            <form action="{{ route('templates.delete', $template->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger" type="submit"
                                                    onclick="return confirm('Yakin mau dihapus qaqa?')">Hapus</button>
                                            </form>
                                        </td>
                                        <!-- Modal -->
                                        {{-- <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-title">Edit Templates</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <form action="{{ route('templates.update', ['templates' => $template->id]) }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                <div class="card">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-group mx-3">
                                                                        <label class="form-control-placeholder" for="blade">Blade</label>
                                                                        <input id="blade" type="text" class="form-control" name="blade" autocomplete="blade"
                                                                            placeholder="Input Blade" value="{{ $template->blade }}">
                                                                        @error('blade')
                                                                            <span class="text-danger small" role="alert">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-group mx-3">
                                                                        <label class="form-control-placeholder" for="image">Image</label>
                                                                        @if ($template->image)
                                                                            <img src="{{ asset('uploads/' . $template->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
                                                                        @endif
                                                                        <input id="image" type="file" class="form-control" name="image">
                                                                        @error('image')
                                                                            <span class="text-danger small" role="alert">
                                                                                {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="page">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function tambah() {
        $.get("{{ route('templates.create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Add Templates');
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }
</script>
@endsection

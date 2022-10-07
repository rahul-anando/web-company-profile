@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Detail
                @endsection
                <h4>Detail</h4>
            </div>
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
                        <a href="{{ route('pages.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                        <div class="card col-md-6 mr-sm-auto">
                        <form action="{{ route('pages.update', ['pages' => $pages->id]) }}" method="POST"
                            enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3">
                                    <label class="form-control-placeholder" for="title">Title</label>
                                    <input id="title" type="text" class="form-control" name="title" required
                                        autocomplete="title" autofocus placeholder="Input Title"
                                        value="{{ $pages->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-placeholder" for="slug">Slug</label>
                                    <input id="slug" type="text" class="form-control" name="slug" required
                                        autocomplete="slug" autofocus placeholder="Input Slug" value="{{ $pages->slug }}">
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-placeholder" for="meta">Meta</label>
                                    <input id="meta" type="text" class="form-control" name="meta" required
                                        autocomplete="meta" autofocus placeholder="Input Meta" value="{{ $pages->meta }}">
                                    @error('meta')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-control-placeholder" for="image">Image</label>
                                    @if ($pages->image)
                                        <img src="{{ asset('uploads/' . $pages->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
                                    @endif
                                    <input id="image" type="file" class="form-control" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Status</label>
                                    <select class="form-control form-control-lg" name="status" id="status">
                                        <option value="pending" {{ $pages->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="publish" {{ $pages->status == 'publish' ? 'selected' : '' }}>Publish</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger small">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary col-2 mb-3">Update</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="mb-3 border-bottom">
                            <h4>Sections</h4>
                        </div>
                    {{-- Modal  --}}
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Create Sections</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                                                <div class="card">
                                                    @csrf
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-placeholder" for="name">Name</label>
                                                        <input id="name" type="text" class="form-control" name="name"
                                                            autocomplete="name" autofocus placeholder="Input name" value={{ old('name') }}>
                                                        @error('name')
                                                            <span class="text-danger small" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-placeholder" for="slug">Slug</label>
                                                        <input id="slug" type="text" class="form-control" name="slug"
                                                            autocomplete="slug" autofocus placeholder="Input Slug" value={{ old('slug') }}>
                                                        @error('slug')
                                                            <span class="text-danger small" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Page</label>
                                                        <select class="form-control form-control-lg" name="page_id" id="page_id">
                                                            <option value="{{ $pages->id }}">{{ $pages->title }}</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="form-group mb-3">
                                                        <label>Template</label>
                                                        <select class="form-control form-control-lg" name="template_id">
                                                        @foreach ($templates as $template)
                                                            @if(old('templates_id') == $template->id)
                                                                <option value="{{ $template->title }}" selected>{{ $template->title }}</option>
                                                            @else
                                                                <option value="{{ $template->title }}">{{ $template->title }}</option>
                                                            @endif
                                                        @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-placeholder" for="index">Index</label>
                                                        <input id="index" type="number" class="form-control" name="index"
                                                            autocomplete="index" autofocus placeholder="Input Index" value={{ old('index') }}>
                                                        @error('index')
                                                            <span class="text-danger small" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-placeholder" for="content">Content</label>
                                                        <input id="content" type="file" class="form-control" name="content">
                                                        @error('content')
                                                            <span class="text-danger small" role="alert">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-primary col-2 mb-3">Submit</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal End --}}

                         {{-- Button Add --}}
                        <button type="button" class="btn btn-outline-primary float-left mb-3" data-toggle="modal" data-target="#modalCreate">Tambah Data</button>
                        <table id="myTable" class="table table-striped">
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
                                        {{-- <td>{{ $section->content }}</td> --}}

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
</div>

@endsection

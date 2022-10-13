@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Manage Page
                @endsection
                <h4>Manage Page</h4>
            </div>
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-header text-danger">
                        <h4>Management Sections : </h4>
                        <h4 class="text-danger">{{ $pages->title }}</h4>
                    </div>

                    <div class="card-body">

                        @foreach ($sections as $section)
                        <div class="section-list">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-inline-block mr-3">
                                        <a href="#">
                                            <i class="fa fa-arrow-up" class="text-secondary" width="15"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fa fa-arrow-down" class="text-secondary" width="15"></i>
                                        </a>
                                    </div>
                                    Section {{ $section->index }} -
                                    <span class="badge badge-warning">{{ $section->name }}</span>

                                    <div class="float-right">
                                        <a href="">
                                            <i class="fa fa-edit text-primary" width="15"></i>
                                        </a>
                                        <form action="{{ route('sections.delete', $section->id) }}" onsubmit="return confirm('Yaqin mau dihapus qaqa ? ')"
                                            class="d-inline mx-2" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn p-0">
                                                <i class="fa fa-trash text-danger" width="15"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- Modal  --}}
                        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Create Sections</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('sections.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="card">
                                                @csrf
                                                <input type="hidden" name="page_id" value="{{ $pages->id }}">
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder" for="name">Name</label>
                                                    <input id="name" type="text" class="form-control"
                                                        name="name" autocomplete="name" autofocus
                                                        placeholder="Input name" value={{ old('name') }}>
                                                    @error('name')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder" for="slug">Slug</label>
                                                    <input id="slug" type="text" class="form-control"
                                                        name="slug" autocomplete="slug" autofocus
                                                        placeholder="Input Slug" value={{ old('slug') }}>
                                                    @error('slug')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- <div class="form-group mb-3">
                                                    <label>Page</label>
                                                    <select class="form-control form-control-lg" name="page_id"
                                                        id="page_id" readonly>
                                                        <option value="{{ $pages->id }}">{{ $pages->title }}
                                                        </option>
                                                    </select>
                                                </div>
                                                {{-- <div class="form-group mb-3">
                                                        <label>Template</label>
                                                        <select class="form-control form-control-lg" name="template_id">
                                                        @foreach ($templates as $template)
                                                            @if (old('templates_id') == $template->id)
                                                                <option value="{{ $template->title }}" selected>{{ $template->title }}</option>
                                                            @else
                                                                <option value="{{ $template->title }}">{{ $template->title }}</option>
                                                            @endif
                                                        @endforeach
                                                        </select>
                                                    </div> --}}
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder" for="index">Index</label>
                                                    <input id="index" type="number" class="form-control"
                                                        name="index" autocomplete="index" autofocus
                                                        placeholder="Input Index" value={{ old('index') }}>
                                                    @error('index')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder"
                                                        for="content">Content</label>
                                                    <input id="content" type="file" class="form-control"
                                                        name="content">
                                                    @error('content')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary col-2 mb-3">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Modal End --}}

                        {{-- Modal  --}}
                        {{-- <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Choose Section Template</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="card">
                                                @csrf
                                                <input type="hidden" name="page_id" value="{{ $pages->id }}">
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder" for="name">Name</label>
                                                    <input id="name" type="text" class="form-control"
                                                        name="name" autocomplete="name" autofocus
                                                        placeholder="Input name" value={{ old('name') }}>
                                                    @error('name')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-control-placeholder" for="slug">Slug</label>
                                                    <input id="slug" type="text" class="form-control"
                                                        name="slug" autocomplete="slug" autofocus
                                                        placeholder="Input Slug" value={{ old('slug') }}>
                                                    @error('slug')
                                                        <span class="text-danger small" role="alert">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div> --}}
                                                {{-- <div class="form-group mb-3">
                                                        <label>Template</label>
                                                        <select class="form-control form-control-lg" name="template_id">
                                                        @foreach ($templates as $template)
                                                            @if (old('templates_id') == $template->id)
                                                                <option value="{{ $template->title }}" selected>{{ $template->title }}</option>
                                                            @else
                                                                <option value="{{ $template->title }}">{{ $template->title }}</option>
                                                            @endif
                                                        @endforeach
                                                        </select>
                                                    </div> --}}
                                                {{-- </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                        class="btn btn-primary col-4 mb-3">Continue</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- Modal End --}}

                        {{-- Button Add --}}
                        <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal"
                            data-target="#modalCreate"> <i class="fas fa-plus mr-1"></i> Tambah Section</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    public function {

    }
</script>

@endsection

@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Service
                @endsection
                <h4>Service</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_id" value="{{ $page_id }}" required>
                    <input type="hidden" name="template_id" value="{{ $templates->id }}" required>
                    <div class="card col">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="name">Index</label>
                            <input id="index" type="number" class="form-control" name="index" placeholder="Input Section Index" value="{{ old('index') }}">
                            @error('index')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Input Section Name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" placeholder="Input Slug" value="{{ old('slug') }}">
                            @error('slug')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" placeholder="Input Title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="excerpt">Excerpt</label>
                            <input type="text" class="form-control" name="excerpt" placeholder="Input Excerpt" value="{{ old('excerpt') }}">
                            @error('excerpt')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image">Image</label>
                            <input type="file" class="form-control" name="content[0][image]">
                            @error('content[0][image]')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image_name">Image Name</label>
                            <input type="text" class="form-control" name="content[0][image_name]" placeholder="Input Image Name">
                            @error('content[0][image_name]')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image_excerpt">Image Excerpt</label>
                            <input type="text" class="form-control" name="content[0][image_excerpt]" placeholder="Input Image Excerpt">
                            @error('content[0][image_excerpt]')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="d-line">
                            <a href="{{ route('pages.show', $page_id) }}" class="btn btn-secondary col-2 mb-3">Kembali</a>
                            <button type="submit" class="btn btn-primary col-2 mb-3 ml-2 ">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

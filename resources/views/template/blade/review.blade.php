@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Review
                @endsection
                <h4>Review</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="page_id" value="{{ $page_id }}" required>
                    <input type="hidden" name="template_id" value="{{ $templates->id }}" required>
                    <div class="card col">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="index">Index</label>
                            <input type="number" class="form-control" name="index" placeholder="Input Section Index">
                            @error('index')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Input Name">
                            @error('name')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Input Slug">
                            @error('slug')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="title">Title</label>
                            <input type="text" class="form-control" name="title">
                            @error('title')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image">Image</label>
                            <input type="file" class="form-control" name="content[0][image]">
                            {{-- @error('content')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror --}}
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image_name">Image Name</label>
                            <input type="text" class="form-control" name="content[0][image_name]">
                            {{-- @error('content')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <label>Image Description</label>
                            <textarea class="form-control" rows="4" cols="40" name="content[0][image_desc]"></textarea>
                        </div>

                        <div class="d-line">
                            <a href="{{ route('pages.back', $page_id) }}" class="btn btn-secondary col-2 mb-3">Kembali</a>
                            <button type="submit" class="btn btn-primary col-2 mb-3 ml-2 ">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

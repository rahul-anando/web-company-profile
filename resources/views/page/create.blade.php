@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Add Pages
                @endsection
                <h4>Add Pages</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="card col">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="title">Title</label>
                            <input id="title" type="text" class="form-control" name="title" autocomplete="title" placeholder="Input Title">
                            @error('title')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="slug">Slug</label>
                            <input id="slug" type="text" class="form-control" name="slug" autocomplete="slug" placeholder="Input Slug">
                            @error('slug')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="meta">Meta</label>
                            <input id="meta" type="text" class="form-control" name="meta" autocomplete="meta" placeholder="Input Meta">
                            @error('meta')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                            @error('image')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select class="form-control form-control-lg" name="status" id="status">
                                <option value="pending">Pending</option>
                                <option value="publish">Publish</option>
                            </select>
                            @error('status')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="d-inline">
                            <a href="{{ route('pages.index') }}" class="btn btn-secondary col-2 mb-3">Kembali</a>
                            <button type="submit" class="btn btn-primary col-2 mb-3 ml-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Edit Sections
                    @endsection
                    <h4>Edit Sections</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('sections.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                    <form action="{{ route('sections.update', ['sections' => $sections->id]) }}" method="POST" enctype="multipart/form-data">
                        <div class="card col-6">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    autocomplete="name" placeholder="Input name" value="{{ $sections->name }}">
                                @error('name')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="slug">Slug</label>
                                <input id="slug" type="text" class="form-control" name="slug"
                                    autocomplete="slug" placeholder="Input Slug" value="{{ $sections->slug }}">
                                @error('slug')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="content">Content</label>
                                <input id="content" type="text" class="form-control" name="content" value="{{ $sections->content }}">
                                @error('content')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="index">Index</label>
                                <input id="index" type="number" class="form-control" name="index"
                                    autocomplete="index" placeholder="Input Index" value="{{ $sections->index }}">
                                @error('index')
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
</section>

@endsection

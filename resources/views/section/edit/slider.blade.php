@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header">
            @section('title')
                Edit Slider
            @endsection
            <h4>Edit Slider</h4>
        </div>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('sections.update', ['sections' => $sections->id]) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="page_id" value="{{ $sections->page_id }}" required>
                <input type="hidden" name="template_id" value="{{ $sections->template_id }}" required>
                <div class="card col">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Index</label>
                        <input id="index" type="number" class="form-control" name="index" autocomplete="name" autofocus placeholder="Input Section Index" value="{{ $sections->index }}">
                        @error('index')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus placeholder="Input Name" value="{{ $sections->name }}">
                        @error('name')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="slug">Slug</label>
                        <input id="slug" type="text" class="form-control" name="slug" autocomplete="slug" autofocus placeholder="Input Slug" value="{{ $sections->slug }}">
                        @error('slug')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    @php
                        $content = json_decode($sections->content, true);
                    @endphp
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="title_h4">Title (h4)</label>
                        <input id="title_h4" type="text" class="form-control" name="title_h4" autocomplete="title_h4" autofocus placeholder="Input Title (h4)" value="{{ $content['title_h4'] }}">
                        @error('title_h4')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="title_h1">Title (h1)</label>
                        <input id="title_h1" type="text" class="form-control" name="title_h1" autocomplete="title_h1" autofocus placeholder="Input Title (h1)" value="{{ $content['title_h1'] }}">
                        @error('title_h1')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <img src="{{ asset('uploads/' . $content['content'][0]['image']) }}" class="img-fluid mb-3 col-sm-5 d-block">
                        <label class="form-control-placeholder" for="image">Image</label>
                        <input type="file" class="form-control" name="content[0][image]" autocomplete="content" autofocus>
                        {{-- @error('content')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror --}}
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="image_name">Image Name</label>
                        <input type="text" class="form-control" name="content[0][image_name]" autocomplete="content" autofocus value="{{ $content['content'][0]['image_name'] }}">
                        {{-- @error('content')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror --}}
                    </div>
                    {{-- <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="4" cols="40" name="description"></textarea>
                    </div> --}}
                    {{-- <a href class="btn btn-success col-2 mb-5">Kembali</a> --}}
                    <button type="submit" class="btn btn-primary col-2 mb-3">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>


@endsection
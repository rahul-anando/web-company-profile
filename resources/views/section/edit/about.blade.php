@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header">
            @section('title')
                Edit About
            @endsection
            <h4>Edit About</h4>
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
                    @method('put')
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Index</label>
                        <input type="number" class="form-control" name="index" autofocus placeholder="Input Section Index" value="{{ $sections->index }}">
                        @error('index')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Name</label>
                        <input type="text" class="form-control" name="name" autofocus placeholder="Input Name" value="{{ $sections->name }}">
                        @error('name')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" autofocus placeholder="Input Slug" value="{{ $sections->slug }}">
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
                        <label class="form-control-placeholder" for="title">Title</label>
                        <input type="text" class="form-control" name="title" autofocus value="{{ $content['title'] }}" required>
                        @error('title')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="excerpt">Excerpt</label>
                        <input type="text" class="form-control" name="excerpt" autofocus value="{{ $content['excerpt'] }}" required>
                        @error('excerpt')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="button_text">Button Text</label>
                        <input type="text" class="form-control" name="button_text" autofocus value="{{ $content['button_text'] }}" required>
                        {{-- @error('button_text')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="button_link">Button Link</label>
                        <input type="text" class="form-control" name="button_link" autofocus value="{{ $content['button_link'] }}" required>
                        {{-- @error('button_link')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror --}}
                    </div>


                    {{-- <a href class="btn btn-success col-2 mb-5">Kembali</a> --}}
                    <button type="submit" class="btn btn-primary col-2 mb-3">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>




@endsection

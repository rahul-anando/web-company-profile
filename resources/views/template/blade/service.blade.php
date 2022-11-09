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
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card-body">
            {{-- <a href="{{ route('pages.show', $page->id) }}" class="btn btn-success float-right mb-3">Kembali</a> --}}
            <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                {{-- @php $no = 1; @endphp --}}
                @foreach ($pages as $page )
                <input type="hidden" name="page_id" value="{{ $page->id }}" required>
                @endforeach
                @foreach ( $templates as $template )
                <input type="hidden" name="template_id" value="{{ $template->id }}" required>
                @endforeach
                {{-- <input type="hidden" name="index" value="{{ $no++ }}" required> --}}
                <input type="hidden" name="data_id" value="{{ $data_id }}" required>
                <div class="card col">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Index</label>
                        <input id="index" type="number" class="form-control" name="index" autocomplete="name" autofocus placeholder="Input Section Index">
                        @error('index')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus placeholder="Input Name">
                        @error('name')
                        <span class="text-danger small" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="slug">Slug</label>
                        <input id="slug" type="text" class="form-control" name="slug" autocomplete="slug" autofocus placeholder="Input Slug">
                        @error('slug')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="title">Title</label>
                        <input id="title" type="text" class="form-control" name="title" autocomplete="title" autofocus placeholder="Input Title">
                        @error('title')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="excerpt">Excerpt</label>
                        <input type="text" class="form-control" name="excerpt" autocomplete="excerpt" autofocus>
                        {{-- @error('excerpt')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group mb-3">
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
                        <input type="text" class="form-control" name="content[0][image_name]" autocomplete="content" autofocus>
                        {{-- @error('content')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror --}}
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-control-placeholder" for="image_excerpt">Image Excerpt</label>
                        <input type="text" class="form-control" name="content[0][image_excerpt]" autocomplete="content" autofocus>
                        {{-- @error('excerpt')
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

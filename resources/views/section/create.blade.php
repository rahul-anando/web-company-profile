@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Add Sections
                    @endsection
                    <h4>Add Sections</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('sections.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                    <form action="{{ route('sections.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="card col-6">
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
                                <label class="form-control-placeholder" for="content">Content</label>
                                <input id="content" type="file" class="form-control" name="content">
                                @error('content')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="form-group mb-3">
                                <label>Page</label>
                                <select class="form-control form-control-lg" name="page_id">
                                @foreach ($pages as $page)
                                    @if(old('pages_id') == $page->id)
                                        <option value="{{ $page->title }}" selected>{{ $page->title }}</option>
                                    @else
                                        <option value="{{ $page->title }}">{{ $page->title }}</option>
                                    @endif
                                @endforeach
                                </select>
                            </div> --}}
                            {{-- <div class="form-group mb-3">
                                <label>Page</label>
                                <select class="form-control form-control-lg" name="page_id">
                                @foreach ($pages as $page)
                                    <option value="{{ $page->title }}" selected>{{ $page->title }}</option>
                                @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group mb-3">
                                <label>Template</label>
                                <select class="form-control form-control-lg" name="template_id">
                                @foreach ($templates as $template)
                                    <option value="{{ $template->title }}">{{ $template->blade }}</option>
                                @endforeach
                                </select>
                            </div>
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

                            <button type="submit" class="btn btn-primary col-2 mb-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

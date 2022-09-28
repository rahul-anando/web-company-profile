@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Add Pages
                    @endsection
                    <h4>Add Pages</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('pages.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                    <form action="{{ route('pages.update', ['pages' => $pages->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="card col-6">
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
            </div>
        </div>
    </div>
</section>

@endsection

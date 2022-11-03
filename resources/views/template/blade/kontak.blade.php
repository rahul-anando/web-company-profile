@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card">
            <div class="card-header">
            @section('title')
                Kontak
            @endsection
            <h4>Kontak</h4>
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
                {{-- <input type="hidden" name="page_id" value="" required> --}}
                {{-- <input type="hidden" name="template_id" value="" required> --}}
                <input type="hidden" name="index" value="1" required>
                {{-- <input type="hidden" name="template_name" value="Slider" required> --}}
                <div class="card col">
                    @csrf
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
                        <label class="form-control-placeholder" for="link">Slug</label>
                        <input id="slug" type="text" class="form-control" name="slug" autocomplete="link" autofocus placeholder="Input Slug">
                        @error('slug')
                            <span class="text-danger small" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
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

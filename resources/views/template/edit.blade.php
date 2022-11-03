@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Edit Templates
                    @endsection
                    <h4>Edit Templates</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('templates.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                    <form action="{{ route('templates.update', ['templates' => $templates->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="card col-6">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="blade">Blade</label>
                                <input id="blade" type="text" class="form-control" name="blade" autocomplete="blade"
                                    placeholder="Input Blade" value="{{ $templates->blade }}">
                                @error('blade')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="image">Image</label>
                                @if ($templates->image)
                                    <img src="{{ asset('uploads/' . $templates->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
                                @endif
                                <input id="image" type="file" class="form-control" name="image">
                                @error('image')
                                    <span class="text-danger small" role="alert">
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

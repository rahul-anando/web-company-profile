@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Edit Menus
                @endsection
                <h4>Edit Menus</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('menus.update', ['menus' => $menus->id]) }}" method="POST">
                    <div class="card col">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="name">Name</label>
                            <input id="name" type="name" class="form-control" name="name" required autocomplete="name" value="{{ $menus->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="link">Link</label>
                            <input id="link" type="text" class="form-control" name="link" required autocomplete="link" value="{{ $menus->link }}">
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label>Outbound</label>
                            <select class="form-control form-control-lg" name="is_outbound" id="is_outbound">
                                <option value="0" {{ $menus->is_outbound == '0' ? 'selected' : '' }}>0</option>
                                <option value="1" {{ $menus->is_outbound == '1' ? 'selected' : '' }}>1</option>
                            </select>
                            @error('is_outbound')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="parent">Parent</label>
                            <input id="parent" type="number" class="form-control" name="parent" required autocomplete="parent" value="{{ $menus->parent }}">
                            @error('parent')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="index">Index</label>
                            <input id="index" type="number" class="form-control" name="index" required autocomplete="index" value="{{ $menus->index }}">
                            @error('index')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="d-inline">
                            <a href="{{ route('menus.index') }}" class="btn btn-secondary col-2 mb-3">Kembali</a>
                            <button type="submit" class="btn btn-primary col-2 mb-3 ml-2">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

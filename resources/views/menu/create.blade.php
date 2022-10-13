@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Add Menus
                    @endsection
                    <h4>Add Menus</h4>
                </div>
                <div class="card-body">
                    <a href="{{ route('menus.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                    <form action="{{ route('menus.store') }}" method="POST">
                        <div class="card col-6">
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
                                <label class="form-control-placeholder" for="link">Link</label>
                                <input id="link" type="text" class="form-control" name="link" autocomplete="link" autofocus placeholder="Input Link">
                                @error('link')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Outbound ?</label>
                                <select class="form-control form-control-lg" name="is_outbound" id="is_outbound">
                                  <option value="0">No</option>
                                  <option value="1">Yes</option>
                                </select>
                                @error('is_outbound')
                                        <span class="text-danger small">
                                            {{ $message }}
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="parent">Parent</label>
                                <input id="parent" type="number" class="form-control" name="parent" autocomplete="parent" autofocus>
                                @error('parent')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="index">Index</label>
                                <input id="index" type="number" class="form-control" name="index" autocomplete="index" autofocus>
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

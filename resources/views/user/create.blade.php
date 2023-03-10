@extends('layouts.admin')
@section('content')

    <section class="section">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-header">
                    @section('title')
                        Add User
                    @endsection
                    <h4>Add User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="card col">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" autocomplete="name" placeholder="Input Name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger small" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" autocomplete="email" placeholder="Input Email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-control-placeholder" for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="password" placeholder="Input Password">
                                @error('password')
                                    <span class="text-danger small" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password-confirm" class="form-control-placeholder">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirmation Password">
                            </div>

                            <div class="d-inline">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary col-2 mb-3">Kembali</a>
                                <button type="submit" class="btn btn-primary col-2 mb-3 ml-2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

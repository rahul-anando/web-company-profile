@extends('layouts.admin')
@section('content')

<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                @section('title')
                    Edit User
                @endsection
                <h4>Edit User</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('users.index') }}" class="btn btn-success float-right mb-3">Kembali</a>
                <form action="{{ route('users.update', ['users' => $users->id]) }}" method="POST">
                    <div class="card col-6">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="name">Name</label>
                            <input id="name" type="name" class="form-control" name="name" required autocomplete="name" autofocus value="{{ $users->name }}">
                            @error('name')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus value="{{ $users->email }}">
                            @error('email')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary col-2 mb-3">Update</button>

                        <div class="form-group mb-3">
                            <label class="form-control-placeholder" for="password">New Password</label>
                            <input id="password" type="password" class="form-control" name="password" autofocus>
                            @error('password')
                                <span class="text-danger small" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary col-5 mb-3">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>



@endsection

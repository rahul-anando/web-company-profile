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
                    <div class="card col-4">
                        @csrf
                        @method('put')
                        <div class="form-group mt-3">
                            <label class="form-control-placeholder" for="name">Name</label>
                            <input id="name" type="name" class="form-control" name="name" required autocomplete="name" autofocus value="{{ $users->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-control-placeholder" for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus value="{{ $users->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-control-placeholder" for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>



@endsection

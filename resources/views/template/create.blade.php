<div class="card-body">
    <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            @csrf
            <div class="form-group mx-3">
                <label class="form-control-placeholder" for="blade">Blade</label>
                <input id="blade" type="text" class="form-control" name="blade" autocomplete="blade" placeholder="Input Blade">
                @error('blade')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mx-3">
                <label class="form-control-placeholder" for="image">Image</label>
                <input id="image" type="file" class="form-control" name="image">
                @error('image')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

<div class="card-body">
    <form action="{{ route('templates.update', ['templates' => $templates->id]) }}" method="POST"
        enctype="multipart/form-data">
        <div class="card">
            @csrf
            @method('put')
            <div class="form-group mx-3">
                <label class="form-control-placeholder" for="blade">Blade</label>
                <input id="blade" type="text" class="form-control" name="blade" autocomplete="blade"
                    placeholder="Input Blade" value="{{ $templates->blade }}">
                @error('blade')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mx-3">
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
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>

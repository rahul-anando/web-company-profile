<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="col-lg-8">
        <form action="/update/{{ $galeries->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control mb-3" name="title" id="title"
                    value="{{ $galeries->title }}">
            </div>

            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mb-3" name="slug" id="slug"
                    value="{{ $galeries->slug }}">
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="hidden" name="oldImage" value="{{ $galeries->image }}">
                @if ($galeries->image)
                    <img src="{{ asset('storage/' . $galeries->image) }}" class="img-fluid mb-3 col-sm-5 d-block">
                @endif
                {{-- <img class="img-preview img-fluid mb-3 col-sm-5"> --}}
                <input type="file" class="form-control mb-3" name="image" id="image" onchange="previewImage()">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select class="form-control form-control-lg" name="status" id="status">
                    <option value="Pending" {{ $galeries->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Publish" {{ $galeries->status == 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
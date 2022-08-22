<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <title>Document</title>
</head>
<body>
    <h2>Form Edit</h2>

    <div class="mx-4">
    <form action="/update/{{ $articles->id }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $articles->title }}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $articles->slug }}">
        </div>
        <div class="mb-3">
            <label for="form-label">Content</label>
            <textarea class="form-control" placeholder="Write Content here" name="content" id="content" value="{{ $articles->content }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $articles->author }}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">image</label>
            <input type="text" class="form-control" id="author" name="image" value="{{ $articles->image }}">
        </div>
        <!-- <div class="mb-3">
            <label class="form-label" for="image">Upload Image</label>
            <input type="file" class="form-control" id="image">
        </div> -->
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </form>
    </div>    
</body>
</html>
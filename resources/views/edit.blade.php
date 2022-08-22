<link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">

<form action="/update/{{ $pages->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $pages->title }}">
        <label for="">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" value="{{ $pages->slug }}">
        <label for="">Content</label>
        <input type="text" name="content" id="content" class="form-control" placeholder="Content" value="{{ $pages->content }}">
        <label for="">Image</label>
        <input type="file" name="image" id="image" class="form-control" placeholder="Image" value="{{ $pages->image }}">
        <label for="" class="mt-2">Status</label>
        <select class="form-control form-control-lg" name="status" id="status" value="{{ $pages->status }}">
            <option>Publish</option>
            <option>Pending</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-primary">Edit</button>
    </div>
</form>

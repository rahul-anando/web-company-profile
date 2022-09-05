
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">

<form action="store" method="POST" enctype="multipart/form-data">

    @csrf
    <div class="form-group col-lg-6 mx-auto mt-3">
        <label for="">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Title" autofocus>
        <label for="">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
        <label for="">Content</label>
        <input type="text" name="content" id="content" class="form-control" placeholder="Content">
        <label for="">Image</label>
        <input type="file" name="image" id="image" class="form-control" placeholder="Image">
        <label for="" class="mt-2">Status</label>
        <select class="form-control form-control-lg" name="status" id="status">
            <option>Publish</option>
            <option>Pending</option>
        </select>
    </div>
    <div class="form-group mt-2 col-lg-6 mx-auto">
        <button class="btn btn-primary">Create</button>
    </div>
</form>

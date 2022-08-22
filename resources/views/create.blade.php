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
    <div class="row ">
        <form action="store" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control mb-3" name="title" id="title">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mb-3" name="slug" id="slug">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control mb-3" name="image" id="image">
            </div>

            <div class="form-group mb-3">
                <label>Status</label>
                <select class="form-control form-control-lg" name="status" id="status">
                    <option>Pending</option>
                    <option>Publish</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>

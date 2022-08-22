<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <a href="/create" class="btn btn-primary">Tambah Data</a>
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Title</td>
                <td>Slug</td>
                <td>Content</td>
                <td>Image</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($pages as $page)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td>{{ $page->content }}</td>
                <td><img src="{{ $page->takeImage() }}" alt="" style="width: 60px"></td>
                <td>{{ $page->status }}</td>
                <td>
                    <a class="btn btn-primary btn-action" href="edit/{{ $page->id }}" data-toggle="tooltip" title="Edit">Edit</a>
                    <form action="destroy/{{ $page->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" data-toggle="tooltip"
                            title="Delete" onclick="return confirm('Are You Sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

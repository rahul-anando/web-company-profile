<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeries</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="mb-3">

        <a href="/create" class="btn btn-primary mb-3">Create</a>

        <table class="table">
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Slug</td>
                    <td>Image</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($galeries as $galeri)
                    <tr>
                        <td>{{ $galeri->title }}</td>
                        <td>{{ $galeri->slug }}</td>
                        {{-- <td>{{ $galeri->image }}</td> --}}
                        <td><img src="{{ asset('storage/' . $galeri->image) }}" alt="" style="width: 60px"></td>
                        <td>{{ $galeri->status }}</td>
                        <td class="d-flex">
                            <a class="btn btn-success me-2" href="edit/{{ $galeri->id }}">Edit</a>

                        <form action="delete/{{ $galeri->id }}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>

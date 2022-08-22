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
    <button></button>
    <table class="table table-borderless mx-4 mt-4">
        <thead class="table-primary">
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Slug</td>
                <td>Content</td>
                <td>Image</td>
                <td>Author</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $data->slug }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ $data->image }}</td>
                <td>{{ $data->author }}</td>
                <td>{{ $data->status }}</td>
                <td>
                    <a href=" edit/{{ $data->id }}"
                    class="btn btn-warning" type="button" >Edit</a>

                    <form action="delete/{{ $data->id }}" method="POST">
                      @csrf  
                      @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Test Posts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="showimages"></div>
            </div>
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Data Posts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a href="{{ route('posts.create') }}" class="btn btn-success">Create</a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Content</th>
                                <th>Aksi</th>
                                {{-- <th>Description</th> --}}
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->slug }}</td>
                                    @php
                                        $content = json_decode($post->content, true);
                                    @endphp
                                    <td><img src="{{ asset('uploads/' . $content['image']) }}" style="width: 60px"></td>
                                    <td class="d-flex">
                                        <a class="btn btn-warning me-2"
                                            href="{{ route('posts.edit', $post->id) }}">Edit</a>

                                        <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{-- {{dump($content['image']);}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

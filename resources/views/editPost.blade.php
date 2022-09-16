<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Create Posts</title>
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
                        <h3 class="text-white">Form Edit Posts</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('posts.update', ['posts' => $posts->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label><strong>Name :</strong></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $posts->name }}" />
                            </div>
                            <div class="form-group">
                                <label><strong>Slug</strong></label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="{{ $posts->slug }}" />
                            </div>
                            @php
                                $content = json_decode($posts->content, true);
                            @endphp
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <input type="text" class="form-control" rows="4" cols="40" name="description" id="description" value="{{($content['description'])}}">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('uploads/' . $content['image']) }}" class="img-fluid mb-3 col-sm-5 d-block">
                                <label><strong>Image :</strong></label><br>
                                <input type="file" class="form-control mb-3" name="content" id="content">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

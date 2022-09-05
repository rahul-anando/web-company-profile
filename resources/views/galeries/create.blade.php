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
        <form action="store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control mb-3" name="title" id="title">
            </div>

            <div class="mb-3">
                <label for="slug">Slug</label>
                <input type="text" class="form-control mb-3" name="slug" id="slug">
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" class="form-control mb-3" name="image" id="image" onchange="previewImage()">
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select class="form-control form-control-lg" name="status" id="status">
                    <option>Pending</option>
                    <option>Publish</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script type="text/javascript">

        fuction previewImage {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }


    </script>

</body>


</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Viết</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <h1>Thêm Bài Viết</h1>
    @if (session('success'))
        <div>{{session('success')}}</div>
    @endif
    @if ($errors->has('error'))
        <div>{{$errors->first('error')}}</div>
    @endif
    <form action="{{route('posts.store')}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" >
            @if ($errors->has('title'))
                <span>{{$errors->first('title')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Mô tả</label>
            <input type="text" class="form-control" id="title" name="description" >
            @if ($errors->has('description'))
                <span >{{$errors->first('description')}}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Danh mục</label>
            <select name="id_category" id="">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('id_category'))
                <span >{{$errors->first('id_category')}}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea class="form-control" id="summernote" name="content" ></textarea>
            @if ($errors->has('content'))
                <span>{{$errors->first('content')}}</span>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Lưu Bài Viết</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $('#summernote').summernote({
        height: 300,
    });
    
</script>
</body>
</html>

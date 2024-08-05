<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách tin</title>
    <base href="{{env('APP_URL')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container p-3">
        <h2 class="text-capitalize text-center">Quản lí tin tức</h2>
        <a href="{{route('posts.create')}}"><button type="button" >Thêm tin mới</button></a>
        <table class="table table-bordered" >
            <tr>
                <th >ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th width="100">Hình ảnh</th>
                <th >Lượt xem</th>
                <th>Hành động</th>
            </tr>
            @forelse ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td><img style="width: 100px" src="img/{{$post->image}}" alt=""></td>
                    <td>{{$post->views}}</td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}"><button type="button" >Sửa</button></a>
                        
                        <form action="{{route('posts.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  >Xoá</button>
                        </form>
                    </td>
                </tr>
            @empty
                
            @endforelse
            
        </table>
    </div>
</body>
</html>
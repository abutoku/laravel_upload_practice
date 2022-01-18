<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <a href="{{ route('photo.index')}}">一覧へ</a>
    <p>{{ $photo->title }}</p>
    <img src={{ Storage::url($photo->photoUrl) }} >
    <form action="{{ route('photo.destroy',$photo->id) }}" method="post">
        @method('delete')
        @csrf
        <button>削除</button>
    </form>

</body>
</html>

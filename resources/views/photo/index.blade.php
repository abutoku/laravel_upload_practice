<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index photo</title>
</head>
<body>
    <h1>投稿一覧</h1>
    <a href="{{ route('photo.create') }}">投稿ページへ</a>

    <ul>
    @foreach ($photos as $photo)
        <li><a href="{{ route('photo.show',$photo->id) }}">{{ $photo->title}}</a></li>
    @endforeach
</ul>
</body>
</html>

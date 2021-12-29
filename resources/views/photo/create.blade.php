<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create photo</title>
</head>
<body>
    <h1>データ入力</h1>

    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title"><br>
        <input type="file" name="image">
        <button>add</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>テスト</title>
</head>
<body>
    <h1>圧縮テスト</h1>
    <p>タイトル</p>
    <form action="{{ route('picture.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title"><br>
        <input type="file" name="picture">
        <button>add</button>
    </form>

</body>
</html>

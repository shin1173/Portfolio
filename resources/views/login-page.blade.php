<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>login</title>
</head>
<body>
    <div class="login"> 
        <h2>ログイン</h2>
        <div class="form">
            <label class="username">ユーザー名</label>
            <input class="text" type="text" name="username">
            <label class="password">パスワード</label>
            <input class="text" type="password" name="password"><br>
            <input class="submit" type="submit" value="ログイン">
        </div>
    </div>
</body>
</html>
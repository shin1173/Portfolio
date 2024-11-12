<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>register</title>
</head>
<body>
    <div class="register">
        <h2>新規登録</h2>       
            <div class="form">
                <label class="username">ユーザー名</label>
                <input class="text" type="text" name="username">
                <label class="email">E-mail</label>
                <input class="text" type="email" name="email">
                <label class="password">パスワード</label>
                <input class="text" type="password" name="password"><br>
                <input class="submit" type="submit" value="登録">
            </div>
    </div>
</body>
</html>
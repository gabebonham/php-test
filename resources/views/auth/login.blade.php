<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <input name="email" type="email" placeholder="email">
        <input name="password" type="password" placeholder="senha">
        <button type="submit"> login</button>
    </form>
</body>
</html>
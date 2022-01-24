<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hola {{ $contact['name'] }}</h1>
    <p>Hemos recibido tu mensaje, {{ $contact['description'] }}</p>
    <p>y te responderemos a tu email {{ $contact['email'] }}</p>
</body>
</html>
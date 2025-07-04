<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fruity Contacts</title>
    @vite('resources/js/app.js')
</head>

<body>
    @inertia
</body>

</html>

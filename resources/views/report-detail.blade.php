<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $report->title }}</title>
</head>

<body>
    <h1>{{ $report->title }}</h1>
    <ul>
        <li>
            <a href="/">back</a>
        </li>
        <li>
            <a href="">edit</a>
        </li>
    </ul>
    <p>{{ $report->content }}</p>
</body>

</html>

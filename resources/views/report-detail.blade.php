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
    <form action="/report/{{ $report->id }}" method="post">
        @method('PUT')
        @csrf
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{$report->title}}">
        <br>
        <p>{{$report->author_id}}</p>
        {{$report->created_at}}
        {{$report->updated_at}}
        <br>
        <label for="content">content</label>
        <br>
        <textarea name="content" id="" cols="50" rows="10">{{ $report->content }}</textarea>
        <br>
        <button type="submit">update</button>
    </form>
</body>

</html>

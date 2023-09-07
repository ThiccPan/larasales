<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>
    Hello {{ Auth::user()->name }}
    <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
    <x-report.form />
    <h1>report list</h1>
    @foreach ($reports as $report)
        <h3>{{ $report->title }}</h3>
        Author id: {{ $report->author_id }}
        <div>
            <a href="/report/{{ $report->id }}">report detail</a>
        </div>
        <div>
            <form action="/report/{{ $report->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
        </div>
        <hr>
    @endforeach
</body>

</html>

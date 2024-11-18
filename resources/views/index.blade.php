<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Query</title>
</head>
<body style="background:#000; color: #fff; font-weight: bold;">
    <h3>Query Built</h3>
    {{$query}}

    @if ($users)
        <h3>Array Built</h3>

        @foreach ($users as $user)
            <div>{{$user}}</div> 
        @endforeach
        
    @endif
</body>
</html>
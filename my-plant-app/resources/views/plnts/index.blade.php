<!DOCTYPE html>
<html>
    <head><title>Plants</title></head>
    <body>
        <h1>All Plants</h1>
        <ul>
        @foreach($plnts as $plnt)
            <li>{{ $plnt->name }} - {{ $plnt->description }}</li>
        @endforeach
        </ul>
    </body>
</html>
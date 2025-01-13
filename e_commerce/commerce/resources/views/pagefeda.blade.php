<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FEDAPAY.COM</title>
</head>
<body>
    <form action="{{route('feda')}}" method="POST">
        @csrf
        <div>
            <button type="submit">payer</button>
        </div>
        
    </form>
</body>
</html>
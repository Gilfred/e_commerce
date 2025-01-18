<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>validate rent</title>
</head>
<body>
        <a href="{{route('payement')}}" value="action" name="ok">Accepter le payement</a> <br>

        <form action="{{route('refus')}}" method="POST">
            @csrf
            @method('DELETE')
            <button>
                refuser
            </button>
        </form>
</body>
</html>

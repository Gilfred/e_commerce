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
            <label for="lastname">
                Nom:
            </label>
            <input type="text" name="lastname">
        </div> <br>
        <div>
            <label for="firstname">
                Prenom:
            </label>
            <input type="text" name="firstname">
        </div> <br>
        <div>
            <label for="email">
                Email:
            </label>
            <input type="email" name="email">
        </div> <br>
        <div>
            <label for="amount">
                Montant:
            </label>
            <input type="number" value="2000" name="amount">
        </div> <br>
        <div>
            <label for="number">
                Numero de téléphone:
            </label>
            <input type="number" name="number">
        </div> <br>
        <div>
            <label for="currency">
                currency:
            </label>
            <input type="text" value="XOF" name="currency">
        </div> <br>
        <div>
            <label for="country">
                Pays:
            </label>
            <input type="text" value="BJ" name="country">
        </div> <br>
        {{-- <div>
            <label for="description">
                description:
            </label>
            <input type="text" name="description">
        </div>   --}}
        <br>
        <button type="submit">Payer</button>
    </form>
</body>
</html>

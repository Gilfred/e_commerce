<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vos articles a poster</title>
</head>
<body>
    <form action="{{route('enregistrement')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Image:</label>
            <input type="file" name="image" accept="image/*" >
        </div> <br>
        <div>
            <label for="">Nom de l'article:</label>
            <input type="text" name="nom_articles">
        </div> <br>
        <div>
            <label for="">Prix:</label>
            <input type="number" name="prix">
        </div> <br>
        <div>
            <label for="">Stock</label>
            <input type="number" name="stock_restant">
        </div> <br>

        <button type="submit">voir les articles à publier</button>
    </form>

    <br>
    <br>
    <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>Mes articles disponibles</title>
</head>
<body>
    <table style="border: 1px">
        <thead>
            <tr>
                <th>nom de l'article</th>
                <th>image de l'article</th>
                <th>prix</th>
                <th>stock Restant</th>
                <th>modification</th>
                <th>suppression</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($articles as $article )
                <tr>
                    <td>
                        {{$article->nom_articles}}
                    </td>
                    <td>
                        <img src="{{asset('storage/' .$articles->first()->image)}}" alt="photo des articles">
                    </td>
                    <td>
                        {{$article->prix}}
                    </td>
                    <td>
                        {{$article->stock_restant}}
                    </td>
                    <td>
                        <a href="{{route('articles.edit',$article->id)}}">Modifier</a>
                    </td>
                    <td>
                        <form action="{{route('suppression.articles',$article->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" >supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <br>
    <div class="mt-3 space-y-1">

        <a href="{{route('welcome')}}">
            Publier
        </a> <br>

        <x-responsive-nav-link :href="route('enregistrement.articles')">
            {{ __("Poster d'autres articles") }}
        </x-responsive-nav-link>
        <br>

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

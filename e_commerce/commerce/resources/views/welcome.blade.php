<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


    </head>
    <body>
        <div>
            <a href="{{route('enregistrement')}}">location de boutique</a>
        </div>
         <div>
            <a href="">achat de produits</a>
        </div>
        <table>
            <thead>
                <th>
                    <tr>Nom de l'article</tr>
                    <tr>Image_article</tr>
                    <tr>Prix</tr>

                </th>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>
                            {{$produit->nom_articles}}
                        </td>
                        <td>
                            <img src="{{asset('storage/' .$produit->image)}}" style="width: 100%" height="auto" alt="Articles">
                        </td>
                        <td>
                            {{$produit->prix}}
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </body>
</html>

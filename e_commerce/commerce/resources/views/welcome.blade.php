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
            <a href="{{route('welcome')}}">achat de produits</a>
        </div>
        <table style="border: 1px">
            <thead>
                <th>
                    <tr>Nom de l'article</tr>
                    <tr>Image_article</tr>
                    <tr>Prix</tr>
                    <tr>Stock Restant</tr>
                    <tr>Acheter</tr>
                </th>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>
                            {{$produit->nom_articles}}
                        </td>
                        <td>
                            <img src="{{asset('storage/' .$produit->image)}}" alt="Articles">
                        </td>
                        <td>
                            {{$produit->prix}}
                        </td>
                        <td>
                            {{$produit->stock_restant}}
                        </td>
                        <td>
                           <form action="{{route('maj.articles', $produit->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="action" value="decrementation">-</button>
                            <span>{{$produit->after_buy}}</span>
                            <button type="submit" name="action" value="incrementation">+</button>
                           </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <table style="border: 1px">
        <thead>
            <tr>
                <th>nom de l'article</th>
                <th>prix</th>
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
                        {{$article->prix}}
                    </td>
                    <td>
                        modifier
                    </td>
                    <td>
                        supprimer
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>

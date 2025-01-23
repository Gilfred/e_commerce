<form action="{{route('modifications',$articles->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="">Image:</label>
        <input type="file" name="image" value="{{$articles->image}}" accept="image/*" >
    </div> <br>
    <div>
        <label for="">Nom de l'article:</label>
        <input type="text" name="nom_articles" value="{{$articles->nom_articles}}">
    </div> <br>
    <div>
        <label for="">Prix:</label>
        <input type="number" name="prix" value="{{$articles->prix}}">
    </div> <br>
    <div>
        <label for="">Stock</label>
        <input type="number" name="stock_restant" value="{{$articles->stock_restant}}">
    </div> <br>

    <button type="submit">Mise a jour</button>
</form>
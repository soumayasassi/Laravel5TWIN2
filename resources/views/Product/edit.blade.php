
@extends('template')
@section('content')
    <div class="card">
        <header class="card-header">

        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('product.update',$product) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="nomproduit">Nom de produit</label>
                        <input type="texte" class="form-control" id="nomproduit"
                               value="{{ old('name', $product->name) }}" name="name">

                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{$product->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection

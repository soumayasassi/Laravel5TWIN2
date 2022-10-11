@extends('template')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <header class="card-header">

        </header>
        <div class="card-content">
            <div class="content">
                <form method="post" action="{{ route('product.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nomproduit">Nom de produit</label>
                        <input type="texte" class="form-control" id="name"
                               placeholder="Nom de produit" name="name">


                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>

                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" class="form-control" id="price" name="price">

                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">

                    </div>
                    <div class="field">
                        <label class="label">Catégorie</label>
                        <div class="select">
                            <select name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="label">Catalogues</label>
                    <div class="select is-multiple">
                        <select name="cats[]" multiple>
                            @foreach($catalogues as $catalogue)
                                <option value="{{ $catalogue->id }}"
                                    {{ in_array($catalogue->id,
                                    old('cats') ?: []) ? 'selected' : '' }}>
                                    {{ $catalogue->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('template')
@section('content')
    -
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Products</p>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable" border="1">
                    <thead class=" text-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id }}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->stock}}</td>

                            <td>
                                <a class="btn btn-outline-success" href="{{ route('product.show',$product->id) }}">
                                    Détails</a>
                                <a class="btn btn-outline-success" href="{{ route('product.edit',$product->id) }}">Modifier</a>
                                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-success">Delete</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th><a href="?sort_by=name&order={{ request('order') === 'asc' ? 'desc' : 'asc' }}">Name</a></th>
                <th><a href="?sort_by=price&order={{ request('order') === 'asc' ? 'desc' : 'asc' }}">Price</a></th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">View</a>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
</div>
@endsection

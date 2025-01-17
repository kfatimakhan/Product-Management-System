@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Details</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $product->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <p><strong>Stock:</strong> {{ $product->stock ?? 'Not specified' }}</p>
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 300px;">

            <div class="mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout.app')

@section('page-content')
<div class="page-content">
    <h6 class="card-title">Edit Product</h6>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea id="summernote" name="description">{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>SKU</label>
            <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
        </div>

        <div class="mb-3">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{ $product->quantity }}">
        </div>

        <div class="mb-3">
            <label>Current Images</label><br>
            @if($product->image)
            @foreach(json_decode($product->image, true) as $img)
            <img src="{{ asset('storage/'.$img) }}" width="100" class="m-2">
            @endforeach
            @endif
        </div>

        <div class="mb-3">
            <label>Upload New Images</label>
            <input type="file" name="image[]" multiple class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
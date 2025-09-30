@extends('admin.layout.app')

@section('page-content')
<div class="page-content">

    <!-- <h6 class="card-title">Add Blog</h6> -->
    {{-- Success Message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Product</h6>

                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="summernote" name="description"></textarea>

                        </div>

                    </div>
                </div>
            </div>
          
        </div>
 
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">SKU</h6>
                        <div class="mb-3">
                            <label class="form-label">SKU</label>
                            <input type="text" class="form-control" name="sku" id="title" onkeyup="updateSlug()">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">quantity</label>
                            <input type="text" class="form-control" name="quantity">
                        </div>
                      
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Image</h6>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>
                        <!-- <div class="mb-3">
                            <label>Upload Images</label>
                            <input type="file" name="images[]" multiple class="form-control">
                            <input type="file" id="myDropify"/>
                        </div> -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Upload Images</label>
                            <div class="dropzone" id="imageDropzone"></div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
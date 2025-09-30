@extends('stock-management.layout.app')

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
    <form action="{{ route('createStockIn') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="user_id">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Stock In</h6>

                        <div class="mb-3">
                            <label>Product</label>
                            <select name="product_id" class="form-control select2" multiple>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Supplier</label>
                            <select name="supplier_id" class="form-control select2" multiple>
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       
                        <div class="mb-3">
                            <label class="form-label">Reference No</label>
                            <input type="text" class="form-control" name="reference_no">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">quantity</label>
                            <input type="text" class="form-control" name="quantity">
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Notes</label>
                            <textarea id="summernote" name="notes"></textarea>

                        </div>


                    </div>
                </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection


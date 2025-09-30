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
    <form action="{{ route('storeStockOut') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="user_id">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Stock Out</h6>

                        <div class="mb-3">
                            <label>Product</label>
                            <select name="product_id" class="form-control select2" multiple>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Customers</label>
                            <select name="customer_id" class="form-control select2" multiple>
                                @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
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
                            <label class="form-label">Reason</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="reason" id="sale" value="sale">
                                    <label class="form-check-label" for="sale">
                                        Sale
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="reason" id="return" value="return">
                                    <label class="form-check-label" for="return">
                                        Return
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="reason" id="damage" value="damage">
                                    <label class="form-check-label" for="damage">
                                        Damage
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="reason" id="transfer" value="transfer">
                                    <label class="form-check-label" for="transfer">
                                        Transfer
                                    </label>
                                </div>
                            </div>
                        </div>
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
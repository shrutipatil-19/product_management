@extends('stock-management.layout.app')

@section('page-content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Stock Out Table</li>
            </ol>
        </nav>
        <div>
            <a href="{{ route('addStockOut') }}">
                <button class="btn btn-primary"> Add Stock Out</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Stock in Table</h6>
                    <!-- <p class="text-secondary mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Id</th>
                                    <th>User Id</th>
                                    <th>Customer Id</th>
                                    <th>Quantity</th>

                                    <th>Reference No </th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stockOuts as $stockOut)
                                <tr>
                                    <td>{{ $stockOut->id }}</td>
                                    <td>{{ $stockOut->product->name }}</td>
                                    <td>{{ $stockOut->user->name }}</td>
                                    <td>{{ $stockOut->customer->name }}</td>
                                    <td>{{ $stockOut->quantity }}</td>
                                    <td>
                                        {{ $stockOut->reference_no }}

                                    </td>
                                    <td>{{ $stockOut->created_at }}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
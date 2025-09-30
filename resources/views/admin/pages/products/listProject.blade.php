@extends('admin.layout.app')

@section('page-content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Table</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Product Table</h6>
                    <!-- <p class="text-secondary mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p> -->
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product name</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Quantity</th>

                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>
                                        @php
                                        $images = json_decode($product->images, true);
                                        $firstImage = $images[0] ?? null;
                                        @endphp

                                        @if (!empty($product->imagefile1))
                                        <img src="{{ url('storage/app/public/' . $product->imagefile1) }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit: cover; margin-right: 5px;">
                                        @elseif (!empty($firstImage))
                                        <img src="{{ url('storage/app/public/' . $firstImage) }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit: cover; margin-right: 5px;">
                                        @else
                                        <img src="{{ url('storage/app/public/default.jpg') }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit: cover; margin-right: 5px;">
                                        @endif

                                    </td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <!-- Edit Icon -->
                                        <a href="" style="margin-right: 8px;">
                                            <i data-feather="edit"></i>
                                        </a>

                                        <!-- Delete Icon as a Form -->
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Product?')) this.closest('form').submit();">
                                                <i data-feather="trash-2" style="color: red;"></i>
                                            </a>
                                        </form>
                                    </td>

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
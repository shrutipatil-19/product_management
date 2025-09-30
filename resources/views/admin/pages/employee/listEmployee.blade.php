@extends('project_management.layout.app')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Employee</h4>
                        <p class="card-description"> Add class <code>.table-striped</code>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Employee name </th>
                                    <th> Employee email </th>
                                    <th> Phone </th>
                                  
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    
                                    <td> {{ $employee->name }} </td>
                                    <td>
                                        {{ $employee->email }}
                                    </td>
                                    <td> {{ $employee->phone }} </td>
                                   
                                    <td>
                                        <a href="{{ route('editEmployee', $employee->id) }}"> <button type="button" class="btn btn-secondary">Edit</button></a>

                                        <form action="{{ route('deleteEmployee', $employee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this blog?')) this.closest('form').submit();">Delete</button>
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
    <!-- content-wrapper ends -->

</div>
@endsection
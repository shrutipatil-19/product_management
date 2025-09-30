@extends('project_management.layout.app')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Assign Project Employee</h4>
                        <!-- <p class="card-description"> Add class <code>.table-striped</code> -->
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Employee name </th>
                                    <th> Project Name </th>


                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assign_projects as $assign_project)
                                <tr>

                                    <td>{{ implode(', ', $assign_project->assign_employee ?? []) }}</td>
                                    <td>{{ implode(', ', $assign_project->assign_project ?? []) }}</td>

                                    <td>
                                        <a href=""> <button type="button" class="btn btn-secondary">Edit</button></a>

                                        <form action="" method="POST">
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
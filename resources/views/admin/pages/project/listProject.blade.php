@extends('project_management.layout.app')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <p class="card-description"> Add class <code>.table-striped</code>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Image </th>
                                    <th> Project name </th>
                                    <th> Description </th>
                                    <th> Start Date </th>
                                    <th> End Date </th>
                                    <th> Timeline </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td class="py-1">
                                        @if ($project->img)
                                        <img src="{{ url('storage/app/public/' . $project->img) }}" width="50" height="50" style="object-fit: cover; margin-right: 5px;" alt="Image">
                                        @endif
                                    </td>
                                    <td> {{ $project->name }} </td>
                                    <td>
                                        {{ $project->desc }}
                                    </td>
                                    <td> {{ $project->start_date }} </td>
                                    <td> {{ $project->end_date }} </td>
                                    <td> {{ $project->timeline }} </td>
                                    <td>
                                        <a href="{{ route('editProject', $project->id) }}"> <button type="button" class="btn btn-secondary">Edit</button></a>

                                        <form action="{{ route('deleteProject', $project->id) }}" method="POST">
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
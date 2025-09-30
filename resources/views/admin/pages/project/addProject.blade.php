@extends('project_management.layout.app')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Project</h4>
                        <!-- <p class="card-description"> Basic form elements </p> -->
                        <form class="forms-sample" action="{{ route('createProject') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                @error('name')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="form-control" id="desc" rows="4" name="desc"></textarea>
                                @error('desc')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="start_date">Description</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                                @error('start_date')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_date">Description</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                                @error('end_date')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Timeline</label>
                                <input type="text" class="form-control" id="timeline" placeholder="timeline" name="timeline">
                                @error('timeline')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                            </div> -->
                            <!-- <div class="form-group">
                                <label for="exampleSelectGender">Gender</label>
                                <select class="form-control" id="exampleSelectGender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img" id="img">
                                @error('img')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputCity1">City</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                            </div> -->

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

</div>
@endsection
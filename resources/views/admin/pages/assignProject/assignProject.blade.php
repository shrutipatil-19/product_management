@extends('project_management.layout.app')

@push('styles')
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Assign Project</h4>

                        <form class="forms-sample" action="{{ route('assignProjectCreate') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>
                                    Select Projects

                                </label><br>
                                <select data-placeholder="Select Project..." multiple class="chosen-select" id="assign_project" name="assign_project[]">
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->name }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                 <label>
                                    Select Employees
                                </label> <br>
                                <select data-placeholder="Select Employees..." multiple class="chosen-select" id="assign_employee" name="assign_employee[]">
                                    @foreach ($employees as $employee)
                                    <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

<script>
    $(".chosen-select").chosen({
        no_results_text: "Oops, nothing found!"
    })
</script>
@endpush
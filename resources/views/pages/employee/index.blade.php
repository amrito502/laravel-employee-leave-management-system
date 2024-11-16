@extends('master')
@section('admin_page_header','Department')
@section('content')
{{-- @include('role-permission.nav-links') --}}

<div class="table-container">
    <div class="rows">
        <div class="col-md-12s">
            @if (session('status'))
                <div class="alert alert-success mt-3" role="alert">{{ session('status') }}</div>
            @endif
            <div class="">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h4 class="mt-2">Employee List : </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="" data-toggle="modal" data-target="#addNewEmployee" class="btn btn-success float-right mt-2">Add
                            Employee</a>
                    </div>
                </div>            
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>kdnf</td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#EditNewEmployee" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tasks-container">


<div class="modal fade" id="addNewEmployee" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Create Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Add Department Name">
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- =========edit department=========== --}}
<div class="modal fade" id="EditNewEmployee" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Department Name">
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
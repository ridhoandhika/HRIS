@extends('admin.dashboard.main')
@section('title', 'Employee')

  @section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Employee</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                     <li><a href="#">Employee</a></li>
                    <li class="active">Data</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
  @endsection


@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Employee</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/employees/create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Division</th>
                                <th>Departement</th>
                                <th>Status</th>
                                <th>Action</th>   
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <<td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->emp_id }}</td>xxxx
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->division->div_description }}</td>
                                <td>{{ $employee->departement->dept_description }}</td>
                                <td>{{ ($employee->isActive == 1) ? 'active': 'inactive'}}</td>
                                <td>   
                                    <a href="{{ url('admin/employees/'. $employee->id)}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                        </a> 
                                    <a href="{{ url('admin/employees/'. $employee->emp_id).'/edit' }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    </a>
                                    
                                <form action="{{ url('admin/employees/'. $employee->emp_id)}} " method="POST" 
                                    class="d-inline" onsubmit="return confirm('Are you sure deleting this data?')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash" ></i>
                                        </button>
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
@endsection
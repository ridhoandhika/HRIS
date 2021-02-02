@extends('admin.dashboard.main')
@section('title', 'Departement')

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
                     <li><a href="#">Data</a></li>
                    <li class="active">Detail</li>
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
                    <strong>Deatil Departement</strong>
                </div>
                <div class="pull-right">
                    <a href="{{url('admin/employees')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-back"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width:30%">Division</th>
                                    <td>{{ $employee->division->div_description}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%">Departement</th>
                                    <td>{{ $employee->departement->dept_description}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Name</th>
                                    <td>{{ $employee->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Place of Birth</th>
                                    <td>{{ $employee->place_of_birthday}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Birthday</th>
                                    <td>{{ $employee->birthday}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Gender</th>
                                    <td>{{ $employee->sex}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Address</th>
                                    <td>{{ $employee->address}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Phone </th>
                                    <td>{{ $employee->phone}}</td>
                                </tr>
                                <tr>
                                    <th style="width:30%"> Note</th>
                                    <td>{{ $employee->note}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
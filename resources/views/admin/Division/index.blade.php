@extends('admin.dashboard.main')
@section('title', 'Division')

  @section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Division</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                     <li><a href="#">Division</a></li>
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
                        <strong>Division</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/divisions/create')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Division Id</th>
                                <th>Description</th>
                                <th>Initial</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($divisions as $div)
                            <tr>
                                <<td>{{ $loop->iteration }}</td>
                                <td>{{ $div->div_id }}</td>xxxx
                                <td>{{ $div->div_description }}</td>
                                <td>{{ $div->div_initial }}</td>
                                <td>   
                                    <a href="{{ url('admin/divisions/'. $div->id).'/edit' }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                    </a>      
                                    <form action="{{ url('admin/divisions/'. $div->id)}} " method="POST" 
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
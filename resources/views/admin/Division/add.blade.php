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
                    <li class="active">Add</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
  @endsection


@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Division</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/divisions')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-8 offset-md-1">
                            <form action="{{ url('admin/divisions') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>Description</label>
                                <input type="text" name="div_description" class="form-control @error('div_description') is-invalid @enderror" value="{{ old('div_description') }}">
                                    @error('div_description')
                                        <div class="invalid-feedback">{{ $message }}</div>                                   
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Initial</label>
                                    <input type="text" name="div_initial" class="form-control @error('div_initial') is-invalid @enderror" value="{{ old('div_initial') }}" placeholder="Jakarta">
                                    @error('div_initial')
                                        <div class="invalid-feedback">{{ $message }}</div>                                   
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success text-right">Save</button>
                                 {{-- <div class="card-footer text-right">
                                    <a href="{{url('admin/employees')}}" class="btn btn-primary"> Add new </a>
                                </div>  --}}
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.dashboard.main')
@section('title', 'Departement')

  @section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="col-sm-4">
          <div class="page-header float-left">
              <div class="page-title">
                  <h1>Departement</h1>
              </div>
          </div>
      </div>
      <div class="col-sm-8">
          <div class="page-header float-right">
              <div class="page-title">
                  <ol class="breadcrumb text-right">
                     <li><a href="#">Departement</a></li>
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
                        <strong>Departement</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/departement')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-8 offset-md-1">
                            <form action="{{ url('admin/departement/'. $departements->id) }}" method="POST">
                                @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Division</label>
                                <select name="division_id" class="form-control">
                                    <option value=""> -- Select One --</option>
                                    @foreach ($division as $div)
                                        <option value="{{old('division_id', $div->id )}}" >{{$div->div_description}}</option>
                                    @endforeach 
                                </select>
                                @error('division_id')
                                    <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                            </div>
                                <div class="form-group">
                                    <label>Description</label>
                                <input type="text" name="dept_description" class="form-control @error('dept_description') is-invalid @enderror" value="{{ old('dept_description',$departements->dept_description) }}">
                                    @error('dept_description')
                                        <div class="invalid-feedback">{{ $message }}</div>                                   
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Initial</label>
                                    <input type="text" name="dept_initial" class="form-control @error('dept_initial') is-invalid @enderror" value="{{ old('dept_initial',$departements->dept_initial) }}" placeholder="Jakarta">
                                    @error('dept_initial')
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
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
                    <li class="active">Edit</li>
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
                        <strong>Employee</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('admin/employees')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-8 offset-md-1">
                            <form action="{{ url('admin/employees/'. $employees->emp_id) }}" method="POST">
                                @method('PUT')
                            @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$employees->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label >Place of Birth</label>
                                    <input type="text" name="place_of_birthday" class="form-control  @error('place_of_birthday') is-invalid @enderror" id="" placeholder="Jakarta" value="{{ old('place_of_birthday',$employees->place_of_birthday) }}">
                                @error('place_of_birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label >birthday</label>
                                    <input type="date" name="birthday" class="form-control  @error('birthday') is-invalid @enderror" value="{{ old('birthday',$employees->birthday) }}">
                                @error('birthday')
                                    <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label >Gender</label> 
                                    <select name="sex" class="form-control" value="{{$employees->sex}}"> 
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                      </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"> {{ old('address',$employees->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>                                   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone',$employees->phone) }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>                                   
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>IsActive</label>
                                    <select name="IsActive"class="form-control" >
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Note</label>
                                    <input type="text" name="note" class="form-control"  value="{{ old('note',$employees->note) }}">
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                               {{--  <div class="card-footer text-right">
                                    <a href="{{url('admin/employees/update')}}" class="btn btn-primary"> Add new </a>
                                </div> --}}
                           </form>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
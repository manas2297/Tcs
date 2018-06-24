@extends('emp-manage.base')
@section('action-content')
  <section class="content container-fluid">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="text-center">Add New Employee</h4>
      </div>
      <div class="panel-body">

          <form action="{{route('emp-manage.store')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="name" class="control-label col-sm-2">Name : </label>
              <div class="col-sm-8 ">
              <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Enter Name" required autofocus>
              @if ($errors->has('name'))
                 <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                 </span>
               @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label col-sm-2">Email : </label>
              <div class="col-sm-8 ">
              <input type="email" name="email" value="{{old('email')}}" id="email" class="form-control" placeholder="abc@gmail.com" required>
              @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
              <label for="dob" class="control-label col-sm-2">DOB : </label>
              <div class="col-sm-8 ">
              <input type="date" name="dob" id="dob" value="{{old('dob')}}" class="form-control" placeholder="dd/mm/yy" required>
              @if ($errors->has('dob'))
                <span class="help-block">
                    <strong>{{ $errors->first('dob') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('hiredDate') ? ' has-error' : '' }}">
              <label for="hiredDate" class="control-label col-sm-2">Hired Date : </label>
              <div class="col-sm-8 ">
              <input type="date" name="hiredDate" id="hiredDate" value="{{old('hiredDate')}}" class="form-control" placeholder="dd/mm/yy" required>
              @if ($errors->has('hiredDate'))
                <span class="help-block">
                    <strong>{{ $errors->first('hireDate') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label col-sm-2">Password : </label>
              <div class="col-sm-8 ">
              <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
              @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
              <label for="address" class="control-label col-sm-2">Address : </label>
              <div class="col-sm-8 ">
              <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control" placeholder="address" required>
              @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
              <button type="submit" class="btn btn-primary ">Create</button>
            </div>



          </form>


      </div>
    </div>
  </section>
@endsection

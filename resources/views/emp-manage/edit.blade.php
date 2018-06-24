@extends('emp-manage.base')
@section('action-content')
  <section class="content container-fluid">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="text-center">Edit Employee Details</h4>
      </div>
      <div class="panel-body">

          <form action="{{ route('emp-manage.update',['id'=>$user->id]) }}" method="post" class="form-horizontal">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
              <label for="name" class="control-label col-sm-2">Name : </label>
              <div class="col-sm-8 ">
              <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" placeholder="Enter Name" required autofocus>
              @if ($errors->has('name'))
                 <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                 </span>
               @endif
              </div>
            </div>




          

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label col-sm-2">New Password : </label>
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
              <input type="text" name="address" id="address" value="{{$user->address}}" class="form-control" placeholder="address" required>
              @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
              @endif
              </div>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
              <button type="submit" class="btn btn-primary ">Update</button>
            </div>



          </form>


      </div>
    </div>
  </section>
@endsection

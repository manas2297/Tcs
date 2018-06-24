@extends('emp-manage.base')
@section('action-content')
  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-8">
            <h3 class="box-title">List of Employees</h3>
          </div>
          <div class="col-sm-4">
            <a href="{{route('emp-manage.create')}}" class="btn btn-primary">Add New Employee</a>
          </div>
        </div>
      </div>
      <!--End of Box Header-->
      <hr>
      <div class="box-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Emp_id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hired Date</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->hiredDate}}</td>
                  <td>{{$user->address}}</td>
                  <td>{{$user->DOB}}</td>

                  <td>
                    <form  action="{{route('emp-manage.destroy',['id'=>$user->id])}}" method="post" onsubmit="return confirm('Are your Sure?')">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <a href="{{route('emp-manage.edit',['id'=>$user->id])}}" class="btn btn-warning">EDIT</a>
                      <button type="submit" class="btn btn-danger ">
                          Delete
                        </button>
                    </form>


                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>



  </section>
  @endsection

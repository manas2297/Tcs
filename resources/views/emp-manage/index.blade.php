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
                <th width="5%">Emp_id</th>
                <th width="10%">Name</th>
                <th width="10%">Email</th>
                <th width="8%">Hired Date</th>
                <th>Address</th>
                <th>Birthdate</th>
                <th width="15%">Action</th>
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

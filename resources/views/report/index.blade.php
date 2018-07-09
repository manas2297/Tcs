@extends('report.base')
@section('action-content')
  <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        <div class="row">
          <div class="col-sm-4">
            <h3 class="box-title">Employee Attendance Report</h3>
          </div>
          <div class="col-sm-4 pull-right">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
               {{ csrf_field() }}
               <input type="hidden" value="{{$searchval['from']}}" name="from" />
               <input type="hidden" value="{{$searchval['to']}}" name="to" />
               <button type="submit" class="btn btn-primary">
                 Export to Excel
               </button>
           </form>
          </div>
          <div class="col-sm-4 pull-right">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.pdf') }}">
                {{ csrf_field() }}
                <input type="hidden" value="" name="from" />
                <input type="hidden" value="" name="to" />
                <button type="submit" class="btn btn-danger">
                  Export to PDF
                </button>
            </form>
        </div>
        </div>
      </div>
      <hr>
      <div class="box-body">
        <div class="row">
       <div class="col-sm-6"></div>
       <div class="col-sm-6"></div>
     </div>
     <form method="POST" action="{{ route('report.search') }}">
        {{ csrf_field() }}
        <div class="box box-default">
          <div class="box-header">
            <h3 class="box-title">Search</h3>
          </div>

          <div class="box-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3">From</label>
                  <div class="col-md-7">
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="from" placeholder="Select Date">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class=" col-md-3 control-label">To</label>
                  <div class="col-md-7">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="to"  class="form-control ">
                    </div>
                  </div>
                </div>
              </div><!--end of to-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label col-md-3" >Select Employee</label>
                  <div class="col-md-7">
                    <select class="form-control" name="employee">

                        @foreach($emps as $emp)
                          <option value="{{$emp->id}}"> Id: {{$emp->id}} {{$emp->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>

              </div>
            </div>
            <hr>
            <div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="5%">Emp_id</th>
                    <th width="20%">Name</th>
                    <th width="20%">Date</th>
                    <th width="20%">Clock_in_time</th>
                    <th width="20%">Clock_out_time</th>
                    <th>Total Work Time</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($employees as $employee)
                  <tr>
                    <td>{{$employee->user_id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->clock_in_date}}</td>
                    <td>{{$employee->clock_in_time}}</td>
                    <td>{{$employee->clock_out_time}}</td>
                    <td>{{$employee->total}}</td>
                  </tr>

                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary" name="button">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              Display
            </button>
          </div>
        </div>

     </form>
      </div>
      <hr>
    </div>

  </section>
  @endsection

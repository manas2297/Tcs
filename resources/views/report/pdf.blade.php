<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style media="screen">
    table{
      border-collapse: collapse;
    }
    td{
      border: solid 1px #4d636f;
      padding: 10px 5px;
    }
     th{
      border: solid 1px #4d636f;
      padding: 10px 5px;
      background: #3086bd;
      color: white;
      font-weight: bold;

    }
      tr{
        text-align: center;
      }
      .container{
        width: 100%;
        text-align: center;
      }
      h2{
        color: #3086bd;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div>
        <h2>List Of Employee Attendance from {{$searchval['from']}} to {{$searchval['to']}}</h2>
      </div>
    </div>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="4%">Emp_id</th>
          <th width="20%">Name</th>
          <th width="22%">Date</th>
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
  </body>
</html>

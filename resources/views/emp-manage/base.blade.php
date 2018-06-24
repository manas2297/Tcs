@extends('layouts.master')
@section('content')
  <section class="content-header">
    <h1>Employee Management</h1>
    <ol class="breadcrumb">
      <li class="active">Employee Management</li>
    </ol>
  </section>
  <hr style="border: 1px solid #cecece;">
  @yield('action-content')
  @endsection

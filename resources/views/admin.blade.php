@extends('layouts.master')

@section('content')

  <section class="content-header">
    <h1>Admin Dashboard</h1>
  </section>
  <section class="content container-fluid">
    <p>This is to be displayed.</p>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Admin Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in as <strong>Admin</strong>!
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>









<!---->
@endsection

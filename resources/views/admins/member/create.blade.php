@extends('admins.layout')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Create New Member
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li>Member</li>
    <li class="active">Create New Member</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
          
        </div>
      @endif



      <div class="box box-primary">
        <!-- form start -->
        <form role="form" action="{{url('/admin/member/store')}}" method="post">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">
              <label for="name">Username</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="ex. name">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="ex. test@test.com">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" name="role" id="role">
                <option value="member">Member</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" name="status" id="status">
                <option value="0">Not Verify</option>
                <option value="1">Approve</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create New Member</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
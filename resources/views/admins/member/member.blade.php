@extends('admins.layout')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Member
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Member</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Alert!</h4>
            {{Session::get('status')}}
        </div>
      @endif
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            <a href="{{url('/admin/member/create')}}" class="btn btn-block btn-primary">Create New Member</a>
          </h3>

          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Role</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->role}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>
                    @if($user->status == 1)
                      <span class="label label-success">Approved</span>
                    @else
                      <span class="label label-danger">Not Verify</span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ action('Admin\MemberController@edit',['id' => $user->id])}}" class="btn btn-default">Edit</a>
                    <a href="{{ action('Admin\MemberController@destroy',['id' => $user->id])}}" class="btn btn-del btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  $('.btn-del').on('click', function(event) {
    event.stopPropagation();
    event.preventDefualt();
    var urlDel = $this.attr('href');

    if( confirm('Are you sure want to do this ?') ) {
      window.location = urlDel;
    }
  })
  
</script>
@endsection
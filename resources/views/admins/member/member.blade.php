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
                    <button data-del-url="{{ action('Admin\MemberController@destroy',['id' => $user->id])}}" 
                      class="btn btn-danger del-btn" data-toggle="modal" data-target="#delConfirmModal">
                        Delete
                    </button>
                    
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

<!-- Modal -->
<div class="modal modal-danger" id="delConfirmModal" tabindex="-1" role="dialog" aria-labelledby="delConfirmModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">ยืนยันการดำเนินการ</h4>
      </div>
      <div class="modal-body">
        <p>ต้องการดำเนินการลย ใช่หรือไม่ ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left cancel-del" data-dismiss="modal">Close</button>
        <button data-url="" id="del-btn" class="btn btn-outline">ลบ</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
  $('.del-btn').on('click', function() {
    removeDelClass();
    $(this).addClass('del-clicked');
  })
  $(document).keyup(function(e) {
      if (e.keyCode == 27) { // escape key maps to keycode `27`
         removeDelClass() 
      }
  });
  $('.cancel-del').on('click', function() {
    removeDelClass();
  })
  var removeDelClass = function() {
    $('.del-btn').removeClass('del-clicked');
  }
  $('#delConfirmModal').on('shown.bs.modal', function () {
    var delUrl = $('.del-clicked').data('del-url');
    
    $('#del-btn').data('url',delUrl);
  })
  $('#del-btn').on('click', function(e) {
    e.preventDefault();
    var url = $(this).data('url');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: url,
      dataType: 'JSON',
      method: 'DELETE',
      success: function(res) {
        if(res.success == 'true') {
          $('.del-clicked').closest('tr').remove()
          $('#delConfirmModal').modal('toggle');
        }
      }
    });
  })
  
</script>
@endsection
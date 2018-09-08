@extends('layouts.backend.main')
@section('Title')
  Permissions List
@stop
@section('content')
<section class="content-header">
    <h1 class="pull-left">
      Permissions List
    </h1>
    <div class="pull-right">
				<a class="btn btn-app" href="{{route('permission.add')}}">
          <i class="fa fa-plus"></i> Add
      	</a>
			</div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table id="tabelPermissions" class='table table-striped table-bordered table-hover table-condensed'>
          <thead>
            <tr>              
              <th>DESCRIPTION</th>
              <th>NAME <small class="text-muted">(Route)</small></th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            @foreach($permissions as $perm)
            <tr>              
              <td>{{$perm->label}}</td>
              <td>{{$perm->name_permission}}</td>
              <td>
                <a href="{{route('permission.edit',['id' => $perm->id])}}" class='btn btn-warning'>Edit</a>
                <button id="{{$perm->id}}" class='btn btn-danger'>Delete</button>
              </td>
            </tr>
            <?php $count++;?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </section>
@stop

@section('footer')
<script src="{{url('assets/plugins/datatables')}}/jquery.dataTables.min.js"></script>
<script src="{{url('assets/plugins/datatables')}}/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#tabelPermissions').DataTable({
        responsive:true,
        "language": {
            "url": "{{url('assets/plugins/datatables')}}/indonesia.json"
        }        
      });
      $('body').on('click','.btn-danger',function(){
        //alert('test');
        var id = $(this).attr('id');
        swal({
          title:'SURE ?',
           text: "Want to delete this permission ?",
           type: "warning",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Yes, delete it!",
           closeOnConfirm: true,
        },function(isConfirm){
          if (isConfirm) {
            window.location = "permission/"+id+"/delete";
          }
        });
      });


    });
  </script>
@stop

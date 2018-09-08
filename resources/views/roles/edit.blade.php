@extends('layouts.backend.main')
@section('content')
	<section class="content-header">
      <h1>
        Edit Role
      </h1>
      
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-md-8">
	    		<div class="box box-success">
                    <form method="post" class="form-horizontal" action="{{route('role.update',['id' => $role->id])}}">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Role Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control input-lg" value="{{$role->name}}">
                          </div>
                        </div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            @foreach($allpermissions as $perm)
                            <div class="checkbox">
                              <label>
                                <input name="perms[]" type="checkbox" value="{{$perm->id}}" @if(in_array($perm->name_permission,$rolepermissions->toArray())) 
                                checked 
                                @endif>{{$perm->name_permission}} ({{$perm->label}})
                              </label>
                            </div>
                            @endforeach
                            
                          </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                      </div><!-- /.box-body -->
                      
                    </form>
	            </div>

	        </div>
        </div>
    </section>
@stop
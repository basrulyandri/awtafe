@extends('layouts.backend.main')
@section('content')
	<section class="content-header">
      <h1>
        Roles List
      </h1>
      
    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-md-8">
	    		<div class="box box-success">
    			@foreach($roles as $role)
	    			<div class="users-list">
	               	<div class="user-block">
	               		<span class="user-block-number">{!!$no!!}</span>
                        <span class="username">
                          <a href="{{route('role.edit',['id' => $role->id])}}">{!!$role->name!!}</a>                          
                        </span>                        
                    </div>
                    </div>
	            <?php $no++;?>
	            @endforeach
	            </div>
	        </div>
        </div>
    </section>


@stop
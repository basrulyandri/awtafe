@extends('layouts.backend.main')
@section('content')
	<section class="content-header">
      <h1 class="pull-left">
        Users List
      </h1>

			<div class="pull-right">
				<a class="btn btn-app" href="{{route('user.add')}}">
          <i class="fa fa-plus"></i> Add
      	</a>
			</div>

    </section>

    <section class="content">
    	<div class="row">
    		<div class="col-md-12">
	    		<div class="box box-success">
    			@foreach($users as $user)
	    			<div class="users-list">
	               	<div class="user-block">
	               		<span class="user-block-number" style="width:46px">{{(($users->currentPage() - 1 ) * $users->perPage() ) + $no}}</span>
                        <img class="img-circle img-bordered-sm margin-r-5" src="{{url('assets/uploads/user-photos').'/'.$user->photo}}" alt="user image">
                        <span class="username">
                          <a href="{{route('user.profile',['username' => $user->username])}}">{{$user->getNameOrEmail()}}</a>
                        </span>
                        <span class="description">{!!$user->role->name!!}</span>
                    </div>
                    </div>
	            <?php $no++;?>
	            @endforeach
	            </div>
	        </div>
        </div>
        <div class="row">
      <div class="col-md-12">
        {{$users->links()}} <span class="pull-right">Total : {{$users->total()}} Users</span>
      </div>
    </div>
    </section>


@stop

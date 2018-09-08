@extends('layouts.backend.main')

@section('title')
  User Profile
@stop
@section('content')
<section class="content-header">
  <h1>
    User Profile
  </h1>
</section>

<section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
					<a href="#">
						<img class="profile-user-img img-responsive img-circle" src="{!!url('assets/uploads/user-photos')!!}/{{$user->photo}}" alt="User profile picture">					
	                </a>

	                <div class='form-group{{$errors->has('photo') ? ' has-error' : ''}}'>
	                	
	                {!!Form::open(['route' => 'user.updatephoto','class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
	                	
            		  {!!Form::file('photo',['class' => 'form-control','placeholder' => 'Photo'])!!}
            		  @if($errors->has('photo'))
            		    <span class="help-block">{{$errors->first('photo')}}</span>
            		  @endif
	                	<button type="submit" class="btn btn-sm btn-info pull-right">Upload</button>
	                </div>	
	                <hr/>
	                	<input type="hidden" name="id" value="{{$user->id}}">
	                {!!Form::close()!!}
	                
	                <h3 class="profile-username text-center">{{$user->getNameOrEmail(TRUE)}}</h3>
	                <p class="text-muted text-center">{{$user->role->name}}</p> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
				Other Detail
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
@stop

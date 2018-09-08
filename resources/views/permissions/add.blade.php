@extends('layouts.backend.main')

@section('title')
  Add Permission
@stop

@section('content')
  <section class="content-header">
    <h1>Add Permission</h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-info">
          {!!Form::open(['class' => 'form-horizontal','route' => 'permission.create'])!!}
          <div class="box-body">
              <div class='form-group{{$errors->has('label') ? ' has-error' : ''}}'>
                {!!Form::label('label','Label',['class' => 'col-sm-2 control-label'])!!}
                <div class="col-sm-10">
                  {!!Form::text('label',old('label'),['class' => 'form-control'])!!}
                  @if($errors->has('label'))
                    <span class="help-block">{{$errors->first('label')}}</span>
                  @endif
                </div>
              </div>

              <div class='form-group{{$errors->has('name_permission') ? ' has-error' : ''}}'>
                {!!Form::label('name_permission','Name',['class' => 'col-sm-2 control-label'])!!}
                <div class="col-sm-10">
                  {!!Form::text('name_permission',old('name_permission'),['class' => 'form-control'])!!}
                  @if($errors->has('label'))
                    <span class="help-block">{{$errors->first('name_permission  ')}}</span>
                  @endif
                </div>
              </div>

              {!!Form::submit('Save',['class' => 'btn btn-primary pull-right'])!!}
            {!!Form::close()!!}
          </div>
        </div>

      </div>
    </div>
  </section>
@stop

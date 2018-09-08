@extends('layouts.backend.main')

@section('title')
  Ubah Identitas Perguruan Tinggi
@stop
@section('content')
<section class="content-header">
  <h1>
    Pengaturan Aplikasi
  </h1>
</section>

<section class="content">
  <div class='row'>
    <div class='col-md-12'>
      <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              @foreach($category as $c)
                <li @if($c->category == 'Umum') {{'class=active'}} @endif><a href="#{{$c->category}}" data-toggle="tab">{{$c->category}}</a></li>
              @endforeach
            </ul>
            <div class="tab-content">
            @foreach($category as $c)
              <div class="tab-pane @if($c->category == 'Umum') {{'active'}} @endif" id="{{$c->category}}">
                {!!Form::open(['route' => 'setting.update','class' => 'form-horizontal'])!!}
                
                  @foreach(\App\Setting::whereCategory($c->category)->get() as $s)
                    @if($s->type == 'list')

                        <div class='form-group{{$errors->has('$s->name') ? ' has-error' : ''}}'>
                          {!!Form::label($s->name,$s->label,['class' => 'col-sm-2 control-label'])!!}
                          <div class="col-sm-10">
                            {!!Form::select($s->name,call_user_func([$s->class,'lists'],'nama','id'),$s->value,['class' => 'form-control','required' => 'true',($s->disabled)? 'disabled':''])!!}
                            @if($errors->has('$s->name'))
                              <span class="help-block">{{$errors->first('$s->name')}}</span>
                            @endif
                          </div>
                        </div>
                    @else
                      <div class='form-group{{$errors->has($s->name) ? ' has-error' : ''}}'>
                        {!!Form::label($s->name,$s->label,['class' => 'col-sm-2 control-label'])!!}
                        <div class="col-sm-10">
                          {!!Form::text($s->name,$s->value,['class' => 'form-control','placeholder' => $s->label,($s->disabled)? 'disabled':''])!!}
                          <p class="help-block">{{$s->description}}</p>
                          @if($errors->has($s->name))
                            <span class="help-block">{{$errors->first($s->name)}}</span>
                          @endif
                        </div>
                      </div>
                    @endif
                  @endforeach
                  <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-primary pull-right" value="Simpan">
                    </div>
                  </div>

                {!!Form::close()!!}
              </div>
            @endforeach              
          </div>
    </div>
  </div>
</section>
@stop

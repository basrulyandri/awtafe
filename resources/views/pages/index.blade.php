@extends('layouts.backend.main')

@section('content')
{!!Form::open()!!}
{!!Form::text('name','test',['class'=>'form-control'])!!}

{!!Form::close()!!}

@stop

@extends('layouts.backend.main')
@section('header')
  
@endsection
@section('title')
  Berhasil Setup Semester Baru
@stop

@section('content') 

  	

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-green"><i class="fa fa-check"></i></h2>

        <div class="error-content">
          <h3>BERHASIL.</h3>

          <p>
            Semester Genap baru saja disetup.
          </p>

          <a class="btn btn-success" href="{{route('dashboard.index')}}">Kembali ke Halaman Dahboard</a>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
@stop

@section('footer')

@endsection

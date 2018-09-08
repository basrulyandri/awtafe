@extends('layouts.backend.main')

@section('title')
  Error 401
@stop
@section('content')
	<section class="content-header">
      <h1>
        401 Error Page
      </h1>

    </section>

    <section class="content">
    	<section class="content">
          <div class="error-page">
            <h2 class="headline text-yellow"> 401</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Anda tidak punya hak akses</h3>
              <p>
                Pesan Error ini keluar karena level user anda tidak diperbolehkan untuk mengakses halaman ini.
                <a href="{{route('dashboard.index')}}">kembali ke Dashboard</a>
              </p>

            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section>
    </section>

@stop

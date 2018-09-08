@extends('layouts.frontend.main')

@section('content')
 <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">ILMU PENGETAHUAN DALAM GENGGAMAN</h1>
          <p class="lead text-muted">“Bencana akibat kebodohan adalah sebesar-besar musibah seorang manusia.” ( Al-Ghazali ).</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Gabung Sekarang</a>            
          </p>
          <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Cari Buku" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Cari</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
            
          <div class="row">
             @foreach(collections() as $collection)
            <div class="col-md-2">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{url('/')}}/books/1 (1).jpg">
                <div class="card-body book-title-box">
                  <p class="card-text">{{$collection->title}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    
                      <button type="button" class="btn btn-sm btn-block btn-primary">Detail</button>                      
                    
                    
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </main>
@stop
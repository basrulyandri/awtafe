@extends('layouts.backend.main')
@section('header')
  
@endsection
@section('title')
  Dashboard
@stop

@section('content')

  <section class="content-header">
    <h1>Dashboard</h1>
  </section>
  

  <section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      	<div class="info-box">
        	<span class="info-box-icon bg-aqua"><i class="fa fa-file-archive-o"></i></span>

	        <div class="info-box-content">
	          <span class="info-box-text">Fatwa</span>
	          <span class="info-box-number">101</small></span>
	        </div>
        <!-- /.info-box-content -->
      	</div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Ijtima'</span>
          <span class="info-box-number">219</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-book"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Buku</span>
          <span class="info-box-number">154</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-pencil"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Artikel</span>
          <span class="info-box-number">112</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div> 

  <div class="row">
    <div class="col-md-12">        
      <div id="line-chart"></div>
    </div>
  </div>

  </section>
@stop

@section('footer')
  <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script>
  $(function () {    

     $('#line-charts').highcharts({
        title: {
            text: 'Perkembangan tiap Prodi Tiap tahun',
            x: -20 //center
        },        
        xAxis: {
            categories: ['2009', '2010', '2011', '2012', '2013', '2014',
                '2015', '2016']
        },
        yAxis: {
            title: {
                text: 'Jumlah Mahasiswa Aktif'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'PAI',
            data: [70, 69, 95, 145, 182, 215, 252,310]
        }, {
            name: 'PGMI',
            data: [20, 81, 95, 113, 170, 220, 248,381]
        }, {
            name: 'PBS',
            data: [25, 34, 21, 46, 72, 97, 115, 136,]
        }, {
            name: 'EKS',
            data: [39, 42, 57, 85, 92, 112, 120, 138]
        }]
    });
});
  </script>
@endsection


@extends('layouts.frontend.maintebakangka')
@section('header')
	<link rel="stylesheet" href="{!!url('assets')!!}/dist/css/autocomplete.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection

@section('content')
<div id="thinking" style="position: fixed;z-index: 9999;width: 100%;height: 100%; background-color: white;text-align: center;display: none">
		<img src="http://yoursmiles.org/msmile/think/m1708.gif" width="200px" style="margin:200px auto" alt="Preloader image">
</div>
<section id="team" class="section">
    <div class="container">
      <div class="row" id="hasil" style="display: none;">
      	 <div class="col-md-12">
          <div class="page-title text-center">  
                <div class="container">
					<div class="row text-center title" id="boxHasil">
															
					</div>	
					<a class="btn btn-blue" href="https://www.facebook.com/sharer/sharer.php?u={{route('games.tebak.angka')}}"><i class="fa fa-facebook"> Share</i></a>
					<br/>
					<a href="http://staibinamadani.ac.id/informasi-beasiswa-stai-binamadani-tahun-20172018/"><img src="http://staibinamadani.ac.id/wp-content/uploads/2016/12/banner-beasiswa.jpg" width="100%" style="margin: 10px;border: solid #ddd 5px;" alt=""></a>
				</div>    
          </div>
        </div>
      </div>
      <div class="row" id="petunjuk">
        
        
        <div class="col-md-12">
          <div class="page-title text-center">  
                <div class="container">
					<div class="row text-center title">
						<h2>Permainan Tebak Angka</h2>
						<h4>Ikuti langkah demi langkah di bawah ini</h4>										
					</div>			
				</div>    
          </div>
        </div>
       <div class="col-md-3">
			<div class="service">
				<div class="icon-holder">
					<h2>1</h2>
				</div>
				<h4 class="heading">Angka acak</h4>
				<p class="description">Hapalkan angka acak yang kami berikan di bawah ini :</p>
				<h3 id="angkaAcak" class="description">{{$angkaacak}}</h3>
			</div>
		</div>

      	<div class="col-md-3">
			<div class="service">
				<div class="icon-holder">
					<h2>2</h2>
				</div>
				<h4 class="heading">Kalikan</h4>
				<p class="description">Ambil Kalkulator dan kalikan angka acak tsb dengan angka kamu sendiri</p>

			</div>
		</div>

		<div class="col-md-3">
			<div class="service">
				<div class="icon-holder">
					<h2>3</h2>
				</div>
				<h4 class="heading">Simpan satu angka</h4>
				<p class="description">Dari hasil perkalian tsb, kamu pilih 1 angka saja yang kamu suka</p>
			</div>
		</div>
		<div class="col-md-3">
			<div class="service">
				<div class="icon-holder">
					<h2>4</h2>
				</div>
				<h4 class="heading">Input sisa hasilnya</h4>
				<p class="description">Masukkan hasil perkalian kamu, kecuali angka pilihan kamu.</p>
				<input type="text" id="hasilTebakAngka" name="hasil" class="description">
			</div>
		</div>
      </div>

      <div class="row">
      	<div class="col-md-4 col-md-offset-4" style="text-align: center;">
      		
		<button id="btnProses" class="btn btn-blue" style="display:none;">Proses</button>
      	</div>
      </div>
    </div>
  </section>
@endsection

@section('footer')
	<script>
		$(document).ready(function(){
			$('.site-name').css('color','#000000');
			$('#hasilTebakAngka').keyup(function(){
				$('#btnProses').show();
			});

			$('#btnProses').click(function(){
				var angkaAcak = $('#angkaAcak').text();
				var hasil = $('#hasilTebakAngka').val();
				var _token = '{{Session::token()}}';
				if($.isNumeric(hasil)){
				$.ajax({
				    method:'POST',
				    url:'{{route('proses.tebakangka')}}',
				    data:{_token:_token,angkaAcak:angkaAcak,hasil:hasil}
				    }).success(function(data){
				    	$('#petunjuk').hide();
				    	$('#btnProses').hide();
				    	$('#thinking').show();
				    	setTimeout(function(){
							    $('#thinking').hide();
							  }, 3000);
				    	$('#hasil').show();
				    	$('#boxHasil').html('<h1>Yihaaa !</h1><h3>Angka yang kamu simpan adalah :</h3><h1>'+data['msg']+'</h1>');
				    	$("html, body").animate({ scrollTop: 0 }, "slow");
				      console.log(data['msg']);
				  });
				}else{
					alert('Hasil Harus berupa Angka');
				}

			});
		});
	</script>
@endsection
{!!Form::open(['route' => 'pembayaran.konfirmasi','class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
  <input type="hidden" name="notagihan" value="{{$tagihan->no}}">
  <div class='form-group{{$errors->has('pembayaran_via_id') ? ' has-error' : ''}}'>
    {!!Form::label('pembayaran_via_id','Pembayaran Via',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::select('pembayaran_via_id',$via,old('pembayaran_via_id'),['class' => 'form-control'])!!}
      @if($errors->has('pembayaran_via_id'))
      <span class="help-block">{{$errors->first('pembayaran_via_id')}}</span>
      @endif
    </div>
  </div>  

  <div class='form-group{{$errors->has('nominal') ? ' has-error' : ''}}'>
    {!!Form::label('nominal','Nominal',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::text('nominal',old('nominal'),['class' => 'form-control','placeholder' => 'Nominal'])!!}
      @if($errors->has('nominal'))
      <span class="help-block">{{$errors->first('nominal')}}</span>
      @endif
    </div>
  </div>

  <div class='form-group{{$errors->has('nama_pengirim') ? ' has-error' : ''}}'>
    {!!Form::label('nama_pengirim','Nama Pengirim',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::text('nama_pengirim',old('nama_pengirim'),['class' => 'form-control','placeholder' => 'Nama Pengirim'])!!}
      @if($errors->has('nama_pengirim'))
      <span class="help-block">{{$errors->first('nama_pengirim')}}</span>
      @endif
    </div>
  </div>

  <div class='form-group{{$errors->has('no_rekening_pengirim') ? ' has-error' : ''}}'>
    {!!Form::label('no_rekening_pengirim','No. Rekening Pengirim',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::text('no_rekening_pengirim',old('no_rekening_pengirim'),['class' => 'form-control','placeholder' => 'No. Rekening Pengirim'])!!}
      @if($errors->has('no_rekening_pengirim'))
      <span class="help-block">{{$errors->first('no_rekening_pengirim')}}</span>
      @endif
    </div>
  </div>

  <div class='form-group{{$errors->has('bank_pengirim') ? ' has-error' : ''}}'>
    {!!Form::label('bank_pengirim','Bank Pengirim',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::text('bank_pengirim',old('bank_pengirim'),['class' => 'form-control','placeholder' => 'Bank Pengirim'])!!}
      @if($errors->has('bank_pengirim'))
      <span class="help-block">{{$errors->first('bank_pengirim')}}</span>
      @endif
    </div>
  </div>
  <div class='form-group{{$errors->has('bukti') ? ' has-error' : ''}}'>
    {!!Form::label('bukti','Bukti Bayar',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::file('bukti',['class' => 'form-control','placeholder' => 'Bukti Bayar'])!!}
      @if($errors->has('bukti'))
        <span class="help-block">{{$errors->first('bukti')}}</span>
      @endif
    </div>
  </div>

  <div class='form-group{{$errors->has('tgl_bayar') ? ' has-error' : ''}}'>
    {!!Form::label('tgl_bayar','Tanggal Bayar',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::text('tgl_bayar',old('tgl_bayar'),['class' => 'form-control','placeholder' => 'Tanggal Bayar','id' => 'tglBayar'])!!}
      @if($errors->has('tgl_bayar'))
        <span class="help-block">{{$errors->first('tgl_bayar')}}</span>
      @endif
    </div>
  </div>
  <div class='form-group{{$errors->has('keterangan') ? ' has-error' : ''}}'>
    {!!Form::label('keterangan','Keterangan',['class' => 'col-sm-3 control-label'])!!}
    <div class="col-sm-9">
      {!!Form::textarea('keterangan',old('keterangan'),['class' => 'form-control','placeholder' => 'Keterangan'])!!}
      @if($errors->has('keterangan'))
      <span class="help-block">{{$errors->first('keterangan')}}</span>
      @endif
    </div>
  </div>                                      
  <input type="submit" class="btn btn-primary pull-right" value="Konfirmasi">
{!!Form::close()!!}

          <div class="box box-primary">
            <div class="box-body box-profile">
             
              <a data-toggle="modal" href="#uploadFotoMahasiswa"><img class="profile-user-img img-responsive img-circle" src="{{$user->mahasiswa->fotoMahasiswa()}}" alt="User profile picture"></a>

              <h3 class="profile-username text-center">{{$user->mahasiswa->nama}}</h3>

              <p class="text-muted text-center">{{$user->mahasiswa->konsentrasi->nama}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right">{{$user->mahasiswa->status->nama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kelas</b> <a class="pull-right">{{$user->mahasiswa->kelas->nama}}</a>
                </li>               
                <li class="list-group-item">
                  <b>TTL</b> <a class="pull-right">{{$user->mahasiswa->tempat_lahir}}, {{$user->mahasiswa->tanggal_lahir->format('d F Y')}}</a>
                </li>
              </ul>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">{{$user->mahasiswa->alamat}}</p>
              <p class="text-muted">{{$user->mahasiswa->wilayah()}}</p>              
              <strong><i class="fa fa-phone margin-r-5"></i> {{$user->mahasiswa->telepon}}</strong><br/>
              <strong><i class="fa fa-envelope margin-r-5"></i> {{$user->mahasiswa->email}}</strong><br/>             
              <strong><i class="fa fa-graduation-cap margin-r-6"></i> {{$user->mahasiswa->asal_sekolah}}</strong><br/>
              <strong><i class="fa fa-book margin-r-5"></i> {{$user->mahasiswa->jurusan_sekolah}}</strong><br/>             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Kelengkapan Dokumen Box -->
          
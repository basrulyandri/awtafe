
      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('dashboard.index')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{{siteName()}}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
          @if(Auth::user()->isKeuangan())
            <li><a href="{{route('tagihan.index')}}"><i class="fa fa-money"></i></a></li>
            <li>
            <a href="{{route('pembayaran.daftarkonfirmasi')}}">
              <i class="fa fa-bell-o"></i>
              @if(jumlahKonfirmasiPembayaran() > 0)<span class="label label-danger">{{jumlahKonfirmasiPembayaran()}}</span>@endif
            </a>           
          </li>
          @endif

          <li><a style="padding-top: 5px;padding-bottom: 5px; margin:10px" class="btn btn-sm btn-primary" data-toggle="modal" href='#modalTambahKoleksi'><i class="fa fa-plus"></i> Tambah Koleksi</a></li>
          @if(Auth::user()->isAdmin())
             <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-gear"></i>              
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Pengaturan</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="{{route('setting.aplikasi')}}">
                          <div class="pull-left">
                            <img src="{!!url('assets/dist/img')!!}/setting-general.png" class="img-circle" alt="User Image">
                          </div>                      
                          <h4>
                            Umum                        
                          </h4>
                          <p>Pengaturan aplikasi bersifat umum</p>
                        </a>
                      </li>

                      <li><!-- start message -->
                        <a href="{{route('setting.identitaspt')}}">
                          <div class="pull-left">
                            <img src="{!!url('assets/dist/img')!!}/setting-institute.png" class="img-circle" alt="User Image">
                          </div>                      
                          <h4>
                            Identitas PT                       
                          </h4>
                          <p>Identitas Perguruan Tinggi</p>
                        </a>
                      </li>
                      
                     
                    </ul>
                  </li>              
                </ul>
              </li>
            @endif         
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(Auth::user()->role->id == 5)
                  <img src="{!!Auth::user()->mahasiswa->fotoMahasiswa()!!}" class="user-image" alt="User Image">
                @else
                  <img src="{!!url('assets')!!}/uploads/user-photos/{!!Auth::user()->photo!!}" class="user-image" alt="User Image">
                @endif
                  <span class="hidden-xs">{!!Auth::user()->first_name!!}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    @if(Auth::user()->role->id == 5)
                  <img src="{!!Auth::user()->mahasiswa->fotoMahasiswa()!!}" class="img-circle" alt="User Image">
                @else
                  <img src="{!!url('assets')!!}/uploads/user-photos/{!!Auth::user()->photo!!}" class="img-circle" alt="User Image">
                @endif
                    <p>
                      {!!Auth::user()->first_name!!} {!!Auth::user()->last_name!!} - {!!Auth::user()->role->name!!}
                      <small>Sejak {{Auth::user()->created_at->format('F Y')}}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{route('user.myprofile')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{route('auth.logout')}}" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
        </nav>
      </header>

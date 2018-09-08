      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img class="img-circle" src="{!!url('assets/uploads')!!}/{!!appLogo()!!}">
            </div>
            <div class="pull-left info">
              <p>{{PTName()}}</p>
              <a href="#"><!--<i class="fa fa-circle text-success"></i>--> {{motto()}}</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGASI UTAMA</li>
            @if(Auth::user()->canAccess('dashboard.index'))
            <li {{isActiveMenu('dashboard.index')}}>
              <a href="{!!route('dashboard.index')!!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            @endif
            @if(Auth::user()->canAccess('dashboard.mahasiswa') AND !Auth::user()->isAdmin())
            <li {{isActiveMenu('dashboard.mahasiswa')}}>
              <a href="{!!route('dashboard.mahasiswa')!!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            @endif

            @if(Auth::user()->canAccess('dashboard.dosen') AND !Auth::user()->isAdmin())
            <li {{isActiveMenu('dashboard.dosen')}}>
              <a href="{!!route('dashboard.dosen')!!}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            @endif
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @if(Auth::user()->canAccess('users.list'))
                <li {{isActiveMenu('users.list')}}><a href="{!!route('users.list')!!}"><i class="fa fa-circle-o"></i> User Lists</a></li>
                @endif
                @if(Auth::user()->canAccess('roles.list'))
                <li {{isActiveMenu('roles.list')}}><a href="{!!route('roles.list')!!}"><i class="fa fa-circle-o"></i> Roles</a></li>
                @endif
                @if(Auth::user()->canAccess('permissions.list'))
                <li {{isActiveMenu('permissions.list')}}><a href="{!!route('permissions.list')!!}"><i class="fa fa-circle-o"></i> Permissions</a></li>
                @endif
              </ul>
            </li>
            
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i>
                <span>Master</span>
                <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="treeview-menu">               
              </ul>
            </li>          

            <li><a href="{{route('fatwa.index')}}"><i class="fa fa-file-archive-o"></i> Fatwa</a></li>
            <li><a href="#"><i class="fa fa-archive"></i> Ijtima'</a></li>
            <li><a href="#"><i class="fa fa-book"></i> Buku</a></li>
            <li><a href="#"><i class="fa fa-pencil"></i> Artikel</a></li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
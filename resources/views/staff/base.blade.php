<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ URL::asset('admin/auth/img/github.png') }}" type="image/ico" />

    <title> @yield('title') </title>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{ URL::asset('admin/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('admin/dashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('admin/dashboard/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset('admin/dashboard/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{ URL::asset('admin/dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ URL::asset('admin/dashboard/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ URL::asset('admin/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Chart.js -->
    <script src="{{ URL::asset('admin/dashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('admin/dashboard/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/dashboard/css/style.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('home') }}" class="site_title"><i class="fa fa-paw"></i> <span>Dusun Bulu</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ URL::asset('admin/auth/img/github.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                {{-- <h2>{{ Auth::user()->name }}</h2> --}}
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li class=""><a><i class="fa fa-building"></i> Dusun Bulu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="{{ route('dusun.index') }}"><i class="fa fa-building"></i> Manajemen Dusun</a></li>
                      <li><a href="{{ route('batas-dusun.index') }}"><i class="fa fa-shield"></i> Batas Dusun</a></li>
                      <li><a href="{{ route('fasilitas.index') }}"><i class="fa fa-file"></i> Fasilitas Dusun</a></li>
                      <li><a href="{{ route('kegiatan.index') }}"><i class="fa fa-tasks"></i> Kegiatan Dusun</a></li>
                      <li><a href="{{ route('rt.index') }}"><i class="fa fa-users"></i> Manajemen RT</a></li>
                      <li><a href="{{ route('masyarakat.index') }}"><i class="fa fa-users"></i> Masyarakat</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-tasks"></i> Karang Taruna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="{{ route('karta-bule.index') }}"><i class="fa fa-sitemap"></i> KARTA BULE</a></li>
                      <li><a href="{{ route('bukid.index') }}"><i class="fa fa-sitemap"></i> Karang taruna BuKid</a></li>
                      <li><a href="{{ route('rembulan.index') }}"><i class="fa fa-sitemap"></i> Karang Taruna Rembulan</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-desktop"></i> Manajemen Postingan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="{{ route('artikel.index') }}"><i class="fa fa-book"></i> Artikel</a></li>
                      <li><a href="general_elements.html"><i class="fa fa-map-marker"></i> Destinasi</a></li>
                      <li><a href="general_elements.html"><i class="fa fa-calendar"></i> Event</a></li>
                      <li><a href="general_elements.html"><i class="fa fa-building"></i> Pojok Bulu</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ route('galeri.index') }}"><i class="fa fa-image"></i> Galery</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Anggota">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Kas HUMAMIKU">
                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Notulen">
                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ URL::asset('admin/auth/img/github.png') }}" alt="">
                    {{-- {{ Auth::user()->name }} --}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/"><i class="fa fa-home pull-right"></i> Home</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; 2020 KKN UNY - Dusun Bulu
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    
    <!-- tinyMCE -->
    <script src="https://cdn.tiny.cloud/1/q6853xnmt1tuy5hu2tbrmp01fhmjfvl2jqgdf7xuv9ptnoop/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
                          selector:'textarea',
                          plugins: "advlist",
                          advlist_bullet_styles: "square"
                        });
    </script>
    <!-- jQuery -->
    <script src="{{ URL::asset('admin/dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::asset('admin/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('admin/dashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ URL::asset('admin/dashboard/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ URL::asset('admin/dashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ URL::asset('admin/dashboard/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ URL::asset('admin/dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset('admin/dashboard/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ URL::asset('admin/dashboard/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ URL::asset('admin/dashboard/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ URL::asset('admin/dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ URL::asset('admin/dashboard/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ URL::asset('admin/dashboard/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ URL::asset('admin/dashboard/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL::asset('admin/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ URL::asset('admin/dashboard/js/custom.min.js') }}"></script>
  
  </body>
</html>

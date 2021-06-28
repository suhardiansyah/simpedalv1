<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPEDAL</title>
  <link href="<?php echo base_url() . 'assets/dist/img/favorit.png' ?>" rel="shortcut icon" type="image/ico" />
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/select2/select2.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>plugins/datatables/dataTables.bootstrap.css">
  <!-- CKEditor -->
  <script type="text/javascript" src="<?= base_url() . 'assets/' ?>plugins/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?= base_url() . 'assets/' ?>plugins/ckeditor/style.js"></script>


  </script>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() . 'assets/' ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini" onload="initialize()">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <!-- <a href="<?= base_url() . 'dashboard/' ?>" class="logo"> -->
      <a href="http://sedotcode.blogspot.co.id/2017/03/aplikasi-gis.html" rel="nofollow" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SIMPEDAL</b> DPMP2TSP Kab. Langkat</span>
      </a>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url() . 'assets/' ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('nama') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="<?= base_url() . 'dashboard/index' ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a href="<?= base_url() . 'dashboard/profil' ?>">
              <i class="fa fa-dashboard"></i> <span>Profil</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Lokasi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url() . 'dashboard/lokasiInvestasi' ?>"><i class="fa fa-circle-o"></i> Peta Lokasi Investasi</a></li>
              <li><a href="<?= base_url() . 'dashboard/lokasi_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Lokasi</a></li>
              <li><a href="<?= base_url() . 'dashboard/lokasi' ?>"><i class="fa fa-circle-o"></i> Daftar Lokasi</a></li>
              <li><a href="<?= base_url() . 'dashboard/lokasi_kategori' ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Data Kecamatan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url() . 'dashboard/petaKecamatan' ?>"><i class="fa fa-circle-o"></i> Peta Kecamatan</a></li>
              <li><a href="<?= base_url() . 'dashboard/Kecamatan_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Kecamatan</a></li>
              <li><a href="<?= base_url() . 'dashboard/Kecamatan' ?>"><i class="fa fa-circle-o"></i> Daftar Kecamatan</a></li>
              <li><a href="<?= base_url() . 'dashboard/Kecamatan_kategori' ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Data Berita</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url() . 'dashboard/berita_tambah' ?>"><i class="fa fa-circle-o"></i> Tambah Berita</a></li>
              <li><a href="<?= base_url() . 'dashboard/berita' ?>"><i class="fa fa-circle-o"></i> Daftar Berita</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="<?= base_url() . 'dashboard/komentar' ?>">
              <i class="fa fa-laptop"></i>
              <span>Komentar</span>
            </a>
          </li>
          <li class="header">Front End</li>
          <li><a href="<?= base_url() ?>" target="_blank"><i class="fa fa-eye text-green"></i> <span>View Site</span></a></li>
          <li class="header">A U T H</li>
          <li><a href="<?= base_url() . 'adminweb/logout' ?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $contents ?>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
      </div>
      <strong>Copyright &copy; 2016</strong> <a href="<?= base_url() ?>">Sistem Informasi Manajemen Investasi Kabupaten Langkat</a>. All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="<?= base_url() . 'assets/' ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="<?= base_url() . 'assets/' ?>bootstrap/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url() . 'assets/' ?>plugins/select2/select2.full.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() . 'assets/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() . 'assets/' ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() . 'assets/' ?>dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() . 'assets/' ?>dist/js/demo.js"></script>
  <!-- Page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });

      //Initialize Select2 Elements
      $(".select2").select2();
    });
  </script>
</body>

</html>
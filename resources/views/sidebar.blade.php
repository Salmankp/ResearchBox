<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('/vendor/fontawesome-freenew/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ URL::asset('/vendor/datatablesnew/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('/css/sb-adminnew.css')}}" rel="stylesheet">

</head>

<body id="page-top">


<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="/researcher-profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Login Screens:</h6>
      <a class="dropdown-item" href="login.html">Login</a>
      <a class="dropdown-item" href="register.html">Register</a>
      <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Other Pages:</h6>
      <a class="dropdown-item" href="404.html">404 Page</a>
      <a class="dropdown-item" href="blank.html">Blank Page</a>
    </div>
  </li> -->

  <li class="nav-item">
    <a class="nav-link" href="/researcher-profileview">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/upload-article">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Upload Article</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/conduct-survey">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Conduct Survey</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/create-advertisement">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Create Advertisement</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/article-view">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Articles</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/survey-view">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Conducted Surveys</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/advertisement-view">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Advertisements</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/view-performed-surveys">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Performed Surveys</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/online-tasks">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Online Tasks</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/researcher-performed-tasks">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Performed Tasks</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/followers">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Followers</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/sold-articles">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Sold Articles</span>
    </a>
  </li>




  <!-- <li class="nav-item">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->
</ul>



<!-- Bootstrap core JavaScript-->
<script src="{{asset('/vendor/jquerynew/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrapnew/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/vendor/jquery-easingnew/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('/vendor/chart.jsnew/Chart.min.js')}}"></script>
<script src="{{asset('/vendor/datatablesnew/jquery.dataTables.js')}}"></script>
<script src="{{asset('/vendor/datatablesnew/dataTables.bootstrap4.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/js/sb-adminnew.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('/js/demonew/datatables-demo.js')}}"></script>
<script src="{{asset('/js/demonew/chart-area-demo.js')}}"></script>

</body>

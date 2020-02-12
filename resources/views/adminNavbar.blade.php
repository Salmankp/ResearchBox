<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Profile</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('/vendor/fontawesome-freenew/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ URL::asset('/vendor/datatablesnew/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('/css/sb-adminnew.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Admin Profile</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="/admin/search/researchers" method="get">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Researchers..." aria-label="Search" aria-describedby="basic-addon2" name="researcher_name">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
            @if(auth()->guard('admin')->user()->unreadNotifications->count())
          <span class="badge badge-danger">{{count(auth()->guard('admin')->user()->unreadNotifications)}}</span>
           @endif
        </a>


        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">

          @if(auth()->guard('admin')->user()->Notifications->count() == 0)
          <a class="dropdown-item" href="#">No Notification</a>
          @endif


          @foreach(auth()->guard('admin')->user()->unreadNotifications as $notification)
          <a class="dropdown-item" href="{{ route('admin-markAsRead')}}" style="color: purple">Mark All As Read</a>
          @if(isset($notification->data['authenticate_article']))
          <a class="dropdown-item" href="/pending-articles" style="background-color: lightgray"><strong>{{$notification->data['authenticate_article']}}</strong> Upload an Article</a>
          <a class="dropdown-item" href="/pending-articles">{{$notification->created_at->diffForHumans()}} </a>
          @endif
          @endforeach


          @foreach(auth()->guard('admin')->user()->readNotifications as $notification)
          @if(isset($notification->data['authenticate_article']))
          <a class="dropdown-item" href="/pending-articles"><strong>{{$notification->data['authenticate_article']}}</strong> Upload an Article</a>
          <div class="dropdown-divider"></div>
          @endif
          @endforeach
          <a class="dropdown-item" href="/empty-notifications" style="color: purple">Delete Notifiications</a>
          <div class="dropdown-divider"></div>

       </div>
      </li>

      <!-- <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('researcher-logout')}}">
            Logout
        </a>
        </div>
      </li>
    </ul>

  </nav>
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

  <div id="wrapper">

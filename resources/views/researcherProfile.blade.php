<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Researcher Profile</title>

  <!-- Custom fonts for this template-->
  <link href="{{ URL::asset('/vendor/fontawesome-freenew/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ URL::asset('/vendor/datatablesnew/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ URL::asset('/css/sb-adminnew.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Research Box</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"action="/researchers/search" method="get">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Researchers..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">0
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-00">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
            @if(auth()->guard('researcher')->user()->unreadNotifications->count())
          <span class="badge badge-danger">{{count(auth()->guard('researcher')->user()->unreadNotifications)}}</span>
           @endif
        </a>


        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">

          @if(auth()->guard('researcher')->user()->Notifications->count() == 0)
          <a class="dropdown-item" href="#">No Notification</a>
          @endif


          @foreach(auth()->guard('researcher')->user()->unreadNotifications as $notification)
          <a class="dropdown-item" href="{{ route('markAsRead')}}" style="color: purple">Mark All As Read</a>
          @if(isset($notification->data['follow']))
          <a class="dropdown-item" href="/followers" style="background-color: lightgray"><strong>{{$notification->data['follow']}}</strong> Followed You</a>
          <a class="dropdown-item" href="/followers">{{$notification->created_at->diffForHumans()}} </a>
          @elseif(isset($notification->data['unfollow']))
          <a class="dropdown-item" href="/followers" style="background-color: lightgray"><strong>{{$notification->data['unfollow']}}</strong> Unfollowed You</a>
          <a class="dropdown-item" href="/followers">{{$notification->created_at->diffForHumans()}} </a>
          @elseif(isset($notification->data['task']))
          <a class="dropdown-item" href="/online-tasks" style="background-color: lightgray"> Online Task from <strong>{{$notification->data['task']}}</strong></a>
          <a class="dropdown-item" href="/online-tasks">{{$notification->created_at->diffForHumans()}} </a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['buyed_article']))
          <a class="dropdown-item" href="/sold-articles" style="background-color: lightgray"><strong>{{$notification->data['buyed_article']}}</strong> Has Buyed Your Article</a>
          <a class="dropdown-item" href="/sold-articles">{{$notification->created_at->diffForHumans()}} </a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['survey_performed']))
          <a class="dropdown-item" href="/view-performed-surveys" style="background-color: lightgray"><strong>{{$notification->data['survey_performed']}}</strong> Has Performed Your Survey</a>
          <a class="dropdown-item" href="/view-performed-surveys">{{$notification->created_at->diffForHumans()}} </a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['article_approved']))
          <a class="dropdown-item" href="/article-view" style="background-color: lightgray">Admin Approved Your Article <strong>{{$notification->data['article_approved']}}</strong></a>
          <a class="dropdown-item" href="/article-view">{{$notification->created_at->diffForHumans()}} </a>
          <div class="dropdown-divider"></div>
          @endif
          @endforeach


          @foreach(auth()->guard('researcher')->user()->readNotifications as $notification)
          @if(isset($notification->data['follow']))
          <a class="dropdown-item" href="/followers"><strong>{{$notification->data['follow']}}</strong> Followed You</a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['unfollow']))
          <a class="dropdown-item" href="/followers"><strong>{{$notification->data['unfollow']}}</strong> Unfollowed You</a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['task']))
          <a class="dropdown-item" href="/online-tasks"><strong>Online Task from{{$notification->data['task']}}</strong></a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['buyed_article']))
          <a class="dropdown-item" href="/sold-articles"><strong>{{$notification->data['buyed_article']}}</strong> Has Buyed Your Article</a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['survey_performed']))
          <a class="dropdown-item" href="/view-performed-surveys"><strong>{{$notification->data['survey_performed']}}</strong> Has Performed Your Survey</a>
          <div class="dropdown-divider"></div>
          @elseif(isset($notification->data['article_approved']))
          <a class="dropdown-item" href="/article-view">Admin Approved Your Article<strong> {{$notification->data['article_approved']}}</strong></a>
          <div class="dropdown-divider"></div>
          @endif
          @endforeach

          @if(auth()->guard('researcher')->user()->Notifications->count() > 0)
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/researcher-delete-notifications" style="color: purple">Delete Notifiications</a>
          @endif


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
          <a class="dropdown-item" href="/researcher-profileview">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('researcher-logout')}}">
            Logout
        </a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
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

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol> -->



             <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
               <div class="container">
                 <h1 class="jumbotron-heading" style="color: white">{{$researcher_name}}'s Dashboard</h1>

               </div>
             </section>


             <div style="margin-top: 5px"></div>


        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Research Box</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="researcher-view-all-researchers">
                <span class="float-left">Researchers</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Research Box</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="researcher-view-all-researchpapers">
                <span class="float-left">Researchpapers</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Research Box</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="researcher-view-all-journals">
                <span class="float-left">Journals</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Research Box</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="researcher-view-all-conferences">
                <span class="float-left">Conferences</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        @if (session('performed'))
        <div class="alert alert-success">
        {{ session('performed') }}!!
        </div>
         @endif

        <!-- Area Chart Example-->
        <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div> -->

        @if (session('uploaded'))
        <div class="alert alert-success">
        {{ session('uploaded') }}!!
        </div>
         @endif

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All Articles</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Article ID</th>
                    <th>Researcher Name</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Article Name</th>
                    <th>Service</th>
                  </tr>
                </thead>
                <!-- <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot> -->
                <tbody>
                  @foreach ($researchpapers as $researchpaper)
                  <tr>
                    <td> {{$researchpaper->id}} </td>
                    <td> {{$researchpaper->researcher_name}} </td>
                    <td> {{$researchpaper->phone}} </td>
                    <td> {{$researchpaper->designation}} </td>
                    <td> {{$researchpaper->article_name}} </td>
                    <td> {{$researchpaper->service}} </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



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

</html>

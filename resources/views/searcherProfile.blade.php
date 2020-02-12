<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Searcher Profile</title>

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
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action="/searchers-search-researchers" method="get">
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
            @if(auth()->guard('searcher')->user()->unreadNotifications->count())
          <span class="badge badge-danger">{{count(auth()->guard('searcher')->user()->unreadNotifications)}}</span>
           @endif
        </a>


        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">

          @if(auth()->guard('searcher')->user()->Notifications->count() == 0)
          <a class="dropdown-item" href="#">No Notification</a>
          @endif


          @foreach(auth()->guard('searcher')->user()->unreadNotifications as $notification)
          <a class="dropdown-item" href="{{ route('searcher-markAsRead')}}" style="color: purple">Mark All As Read</a>
          @if(isset($notification->data['performed_task']))
          <a class="dropdown-item" href="/performed-assistances" style="background-color: lightgray"><strong>{{$notification->data['performed_task']}}</strong> Performed Your Task</a>
          <a class="dropdown-item" href="/performed-assistances">{{$notification->created_at->diffForHumans()}} </a>


          @endif
          @endforeach


          @foreach(auth()->guard('searcher')->user()->readNotifications as $notification)
          @if(isset($notification->data['performed_task']))
          <a class="dropdown-item" href="/performed-assistances"><strong>{{$notification->data['performed_task']}}</strong> Performed Your Task</a>
          <div class="dropdown-divider"></div>


          @endif
          @endforeach


         @if(auth()->guard('searcher')->user()->Notifications->count() > 0)
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="/searcher-delete-notifications" style="color: purple">Delete Notifiications</a>
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
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>

            <a class="dropdown-item" href="{{route('searcher-logout')}}">
              Logout
          </a>

        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="/searcher-profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Research Feed</span>
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
    <a class="nav-link" href="/searcher-profileview">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/followed-researchers">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Followed Researchers</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/conduct-assistance">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Perform Assistance</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/all-assistances">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>All Assistances</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/performed-assistances">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Performed Assistances</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="/buyed-articles">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Buyed Articles</span>
    </a>
  </li>


</ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Research Feed</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol> -->

        <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
          <div class="container">
            <h1 class="jumbotron-heading" style="color: white">{{$searcher_name}}'s Profile</h1>

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
              <a class="card-footer text-white clearfix small z-1" href="searcher-view-all-researchers">
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
              <a class="card-footer text-white clearfix small z-1" href="searcher-view-all-researchpapers">
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
              <a class="card-footer text-white clearfix small z-1" href="searcher-view-all-journals">
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
              <a class="card-footer text-white clearfix small z-1" href="searcher-view-all-conferences">
                <span class="float-left">Conferences</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

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

        <!-- DataTables Example -->

        @if (session('unfollowed'))
        <div class="alert alert-danger">
        Unfollowed {{ session('unfollowed') }}!!
        </div>
         @endif

         @if (session('followed'))
         <div class="alert alert-info">
         Followed {{ session('followed') }}!!
         </div>
          @endif

          @if (session('performed'))
          <div class="alert alert-success">
          {{ session('performed') }}!!
          </div>
           @endif

           @if (session('assistance'))
           <div class="alert alert-success">
           {{ session('assistance') }}!!
           </div>
            @endif


        <div style="margin-top: 5px"></div>


        <div class="album py-5 bg-light">

          <div class="container">
            <div class="row">

            @foreach ($researchpapers as $researchpaper)
            @if($researchpaper->status == '1')


              <div class="col-lg-4 col-md-8col-sm-12 ">
                <div class="card mb-4 box-shadow">
                 <img class="card-img-top" src="storage/researchpapers/{{$researchpaper->pic}}" height="300px">
                  <!-- <img class="card-img-top" src="" style="width: 335px; height: 200px"> -->
                  <div class="card-body">
                    <b>Article Name</b> {{$researchpaper->article_name}}  <br>
                    <b>Researcher Name</b> {{$researchpaper->researcher_name}}  <br>
                    <b>Service</b>  {{$researchpaper->service}}  <br>
                    <b>Type</b> {{$researchpaper->type}} <br>
                    <b>Payment Type</b>  {{$researchpaper->payment_type}}  <br><br>


                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a href="/searcher-view-researchpaper/{{$researchpaper->id}}">
                        <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;&nbsp;
                        @if( $researchpaper->payment_type == 'free' )
                        <a href="download-pdf/{{$researchpaper->id}}">
                        <button type="button" class="btn btn-sm btn-outline-warning">Download</button></a>
                        </div>
                        @else

                        <a href="/buy-article/{{$researchpaper->id}}">
                        <button type="button" class="btn btn-sm btn-outline-warning">Buy</button></a>
                        </div>

                        @endif
                    </div>
                     <small class="text-muted">{{$researchpaper->created_at}}</small>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach

                @foreach ($surveys as $survey)


                <div class="col-lg-4 col-md-8col-sm-12 ">
                  <div class="card mb-4 box-shadow">
                   <img class="card-img-top" src="storage/Surveys/{{$survey->pic}}"  height="300px">
                    <!-- <img class="card-img-top" src="" style="width: 335px; height: 200px"> -->
                    <div class="card-body">
                      <b>Survey Name</b> {{$survey->survey_name}}  <br>
                      <b>Researcher Name</b> {{$survey->researcher_name}}  <br>
                      <b>Survey Type</b> {{$survey->type}} <br><br>

                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="/searcher_survey_details/{{$survey->id}}">
                          <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>

                        <a href="storage/Surveys/{{$survey->file}}" download="{{$survey->file}}">
                          <button type="button" class="btn btn-sm btn-outline-warning">Download</button></a>

                          <a href="/perform-survey/{{$survey->id}}">
                            <button type="button" class="btn btn-sm btn-outline-danger">Perform Survey</button></a>


                      </div>
                    </div>
                       <small class="text-muted">{{$survey->created_at}}</small>
                    </div>
                  </div>
                </div>
                  @endforeach

                  @foreach ($advertisements as $advertisement)


                  <div class="col-lg-4 col-md-8col-sm-12 ">
                    <div class="card mb-4 box-shadow">
                     <img class="card-img-top" src="storage/Advertisements/{{$advertisement->advertisement_img}}"  height="250px"></img>
                      <!-- <img class="card-img-top" src="" style="width: 335px; height: 200px"> -->
                      <div class="card-body">
                        <b>Advertisement Name</b> {{$advertisement->advertisement_name}}  <br>
                        <b>Researcher Name</b> {{$advertisement->researcher_name}}  <br>
                        <b>Advertisement Type</b> {{$advertisement->type}} <br><br>
                        <b>Advertisement Description</b> {{$advertisement->description}} <br><br>

                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="/searcher-advertisement-details/{{$advertisement->id}}">
                            <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;&nbsp;

                          <a href="download/{{ url('storage/Advertisements/'.$advertisement->advertisement_img) }}" download="{{ url('storage/Advertisements/'.$advertisement->advertisement_img) }}">
                            <button type="button" class="btn btn-sm btn-outline-warning">Download</button></a>
                            </div>

                        </div>
                         <small class="text-muted">{{$advertisement->created_at}}</small>
                      </div>
                    </div>
                  </div>
                    @endforeach


              <div style="margin-top: 10px; margin-left: 20px;"></div>

            </div>
          </div>
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

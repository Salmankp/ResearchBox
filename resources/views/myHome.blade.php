@extends('theme.researcher-default')



@section('content')

<div class="row">

    <div class="col-lg-12">

        <h1 class="page-header">Researcher Profile</h1>

    </div>

    <!-- /.col-lg-12 -->

</div>

<!-- /.row -->

@foreach($researchers as $researcher)
<h2>    {{ $researcher->name }} </h2>
<img src="/profile-images/{{$researcher->profile_pic}}" style="height:150px ; width:150px" >
@endforeach

<form action="/update-pic/{{$researcher->id}}" method="post" enctype="multipart/form-data">
  <label>Update Profile pic</label>
  <input type="file" name="profile_pic">
  <input type="hidden" name="_token" value="{{csrf_token() }}">
  <input type="submit" value="update">
</form>



<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-primary">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-comments fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">26</div>

                        <div>New Comments!</div>

                    </div>

                </div>

            </div>

            <a href="#">

                <div class="panel-footer">

                    <span class="pull-left">View Details</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-green">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">12</div>

                        <div>Category!</div>

                    </div>

                </div>

            </div>

            <a href="#">

                <div class="panel-footer">

                    <span class="pull-left">View Details</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-yellow">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-shopping-cart fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">124</div>

                        <div>Tasks!</div>

                    </div>

                </div>

            </div>

            <a href="#">

                <div class="panel-footer">

                    <span class="pull-left">View Details</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="panel panel-red">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-support fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">13</div>

                        <div>Survey Information!</div>

                    </div>

                </div>

            </div>

            <a href="#">

                <div class="panel-footer">

                    <span class="pull-left">View Details</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-3 col-md-6">

        <div class="panel panel">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-comments fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">26</div>

                        <div>Upload Article!</div>

                    </div>

                </div>

            </div>

            <a href="upload-article">

                <div class="panel-footer">

                    <span class="pull-left">Upload Article</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>

    <div class="col-lg-3 col-md-6">

        <div class="panel panel">

            <div class="panel-heading">

                <div class="row">

                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">

                        <div class="huge">12</div>

                        <div>Conduct Survey!</div>

                    </div>

                </div>

            </div>

            <a href="conduct-survey">

                <div class="panel-footer">

                    <span class="pull-left">Conduct Survey</span>

                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                    <div class="clearfix"></div>

                </div>

            </a>

        </div>

    </div>




</div>

<div>


<div>

  <div class="col-md-4" style="background-color:yellow">
        1
    </div>

  <div class="col-md-4" style="background-color:orange">
        2

    </div>

  <div class="col-md-4" style="background-color:red">
        3
    </div>

    </div>


@endsection

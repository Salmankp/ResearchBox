@include('searcherNavbar')
@include('searcherSidebar')


  @foreach ($searchers as $searcher)

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card mt-5">
                <div class="card-header card-header-primary" style="background-color: #9400D3">
                  <h4 class="card-title" style="color: white">User Profile</h4>
                  <p class="card-category" style="color: white"> {{$searcher->name}}'s Profile</p>
                </div>
                <div class="card-body">


              @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                   @endforeach
                  </ul>
              </div>
              @endif


               <form method = "post" action="/api/searcher_update_profile/{{$searcher->id}}">

                    @csrf
                    <div class="row">

                    <input type="hidden" class="form-control" name="id" value="">


                      <div class="col-md-4 mt-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Name</label>
                          <input type="text" class="form-control" value="{{$searcher->name}}" name="name">
                        </div>
                      </div>
                      <div class="col-md-4 mt-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" readonly="" value="{{$searcher->email}}">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 mt-3">
                        <div class="form-group">
                          <label>Researcher Description</label>
                          <div class="form-group">

                            <textarea class="form-control" name="description" id="textarea" rows="6">  Hi I am {{$searcher->name}}, I have a great intrest in researches and my hobby is to read the articles. I was looking for a platform where I could interact with the modern researchers. Research Base is one of the best platform for researchers.</textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right" style="background-color: purple">Update Profile</button>


                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-4 mt-5">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="">
                  <img src="/profile-images/{{$searcher->profile_pic}}" style="height:150px ; width:150px" >
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Researcher</h6>
                  <h4 class="card-title">{{$searcher->name}}</h4>
                  <p class="card-description">
                  Hi I am {{$searcher->name}}, I have a great intrest in researches and my hobby is to read the articles. I was looking for a platform where I could interact with the modern researchers. Research Base is one of the best platform for researchers.
                  </p>

                  <form action="/update-searcher-pic/{{$searcher->id}}" method="post" enctype="multipart/form-data">
                    <label><b>Update Profile pic</b></label>
                    <input type="file" name="profile_pic">
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                    <input type="submit" value="update">
                  </form>

                @endforeach

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
    </br></br></br></br></br></br></br>


</body>

</html>

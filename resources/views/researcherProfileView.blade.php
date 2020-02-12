@include('navbar')
@include('sidebar')




      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card mt-5">
                <div class="card-header card-header-primary" style="background-color: #9400D3">
                  <h4 class="card-title" style="color: white">Researcher Profile</h4>
                  <p class="card-category" style="color: white"> {{$researcher->name}} Profile</p>
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


               <form method= "post" action="/api/researcher_update_profile/{{$researcher->id}}">

                    @csrf
                    <div class="row">

                    <input type="hidden" class="form-control" name="id" value="">


                      <div class="col-md-4 mt-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Researcher Name</label>
                          <input type="text" class="form-control" value="{{$researcher->name}}" name="name" readonly="">
                        </div>
                      </div>
                      <div class="col-md-4 mt-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" readonly="" name="email" value="{{$researcher->email}}">
                        </div>
                      </div>
                    </div>

                    <div class="row">

                    <div class="col-md-4 mt-3">
                      <div class="form-group">
                        <label class="bmd-label-floating">Position</label>
                        <input type="text" class="form-control" value="{{$researcher->position}}" name="position">
                      </div>
                    </div>

                    <div class="col-md-4 mt-3">
                      <div class="form-group">
                        <label class="bmd-label-floating">Address</label>
                        <input type="text" class="form-control" value="{{$researcher->address}}" name="address">
                      </div>
                    </div>
                  </div>

                  <div class="row">

                  <div class="col-md-4 mt-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Date Of Birth</label>
                      <input type="text" class="form-control" value="{{$researcher->dob}}" name="dob" readonly>
                    </div>
                  </div>

                  <div class="col-md-4 mt-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone</label>
                      <input type="text" class="form-control" value="{{$researcher->phone}}" name="phone">
                    </div>
                  </div>
                </div>

                <div class="row">

                <div class="col-md-4 mt-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Zip Code</label>
                    <input type="text" class="form-control" value="{{$researcher->zip_code}}" name="zip_code">
                  </div>
                </div>

                <div class="col-md-4 mt-3">
                  <div class="form-group">
                    <label class="bmd-label-floating">Organization</label>
                    <input type="text" class="form-control" value="{{$researcher->organization}}" name="organization">
                  </div>
                </div>
              </div>

              <div class="row">

              <div class="col-md-4 mt-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Experience</label>
                  <input type="text" class="form-control" value="{{$researcher->experience}}" name="experience">
                </div>
              </div>

              <div class="col-md-4 mt-3">
                <div class="form-group">
                  <label class="bmd-label-floating">Area</label>
                  <input type="text" class="form-control" value="{{$researcher->area}}" name="area">
                </div>
              </div>
            </div>

            <div class="row">

            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label class="bmd-label-floating">Major</label>
                <input type="text" class="form-control" value="{{$researcher->major}}" name="major">
              </div>
            </div>

            <div class="col-md-4 mt-3">
              <div class="form-group">
                <label class="bmd-label-floating">Type</label>
                <input type="text" class="form-control" value="{{$researcher->type}}" name="type">
              </div>
            </div>
          </div>

                    <div class="row">
                      <div class="col-md-12 mt-3">
                        <div class="form-group">
                          <label>Researcher Description</label>
                          <div class="form-group">

                            <textarea class="form-control" name="description" id="textarea" rows="6">{{$researcher->description}}</textarea>
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
                  <a href="#pablo">
                  <img src="/profile-images/{{$researcher->profile_pic}}" style="height:150px ; width:150px" >
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Researcher</h6>
                  <h4 class="card-title">{{$researcher->name}}</h4>
                  <p class="card-description">
                  {{$researcher->description}}
                  </p>

                  <form action="/update-pic/{{$researcher->id}}" method="post" enctype="multipart/form-data">
                    <label><b>Update Profile pic</b></label>
                    <input type="file" name="profile_pic">
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                    <input type="submit" value="update">
                  </form>
                  
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

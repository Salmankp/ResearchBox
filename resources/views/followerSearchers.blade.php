

@include('navbar')
@include('sidebar')



<main role="main">

  <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
    <div class="container">
      <h1 class="jumbotron-heading" style="color: white">Followers</h1>

    </div>
  </section>

       <div class="container">
          <div class="row">

        @if(isset($showsearchers))
            @foreach ($showsearchers as $showsearcher)


           <div class="col-lg-4 col-md-8 col-sm-12 ">
             <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="/profile-images/{{$showsearcher->profile_pic}}" style="width: 347px; height: 250px">
               <div class="card-body">
                 <b>Follower Name:</b> {{$showsearcher->name}}  <br>
                 <b>Email:</b> {{$showsearcher->email}}  <br><br>


                 <small class="text-muted">{{$showsearcher->created_at}}</small>
               </div>
             </div>
           </div>


           @endforeach
           @endif
         </div>

       </div>

 </main>


@if(isset($researcher_id))

@include('navbar')
@include('sidebar')

@elseif(isset($admin_id))

@include('adminNavbar')
@include('adminSidebar')

@else
@include('searcherNavbar')
@include('searcherSidebar')

@endif


<main role="main">


  <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
    <div class="container">
      <h1 class="jumbotron-heading" style="color: white">Research Box</h1>
      <h3 class="jumbotron-heading" style="color: white">Researchers</h3>
    </div>
  </section>

       <div class="container">
          <div class="row">

        @if(isset($showresearchers))
            @foreach ($showresearchers as $showresearcher)


           <div class="col-lg-4 col-md-8 col-sm-12 ">
             <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="/profile-images/{{$showresearcher->profile_pic}}" style="width: 347px; height: 250px">
               <div class="card-body">
                 <b>Researcher Name:</b> {{$showresearcher->name}}  <br>
                 <b>Experience:</b> {{$showresearcher->experience}}  <br>
                 <b>Category:</b>  {{$showresearcher->category}}  <br>
                 <b>Position:</b> {{$showresearcher->position}} <br>
                 <b>Major:</b>  {{$showresearcher->major}}  <br><br>


                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                     @if(!isset($researcher_id) && !isset($admin_id))
                     <a href="/show-researcher-articles/{{$showresearcher->id}}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Articles</button></a>&nbsp;&nbsp;


                     
                     <a href="/follow/{{$showresearcher->id}}/{{$searcher_id}}">
                     <button type="button" class="btn btn-sm btn-outline-warning">Follow</button></a>&nbsp;&nbsp;




                     <a href="/unfollow/{{$showresearcher->id}}/{{$searcher_id}}">
                     <button type="button" class="btn btn-sm btn-outline-danger">Un Follow</button></a>&nbsp;&nbsp;



                     @elseif(!isset($researcher_id) && !isset($searcher_id))
                     <a href="/admin-view-researcher-articles/{{$showresearcher->id}}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Articles</button></a>&nbsp;&nbsp;

                     @else
                     <a href="/researcher-articles/{{$showresearcher->id}}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Articles</button></a>&nbsp;&nbsp;


                      @endif
                     </div>
                 </div>
                 <small class="text-muted">{{$showresearcher->created_at}}</small>
               </div>
             </div>
           </div>


           @endforeach
           @endif
         </div>

       </div>

 </main>



@if(isset($researcher_id))
@include('navbar')
@include('sidebar')

@else
@include('searcherNavbar')
@include('searcherSidebar')

@endif


<main role="main">
     <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
       <div class="container">
         @if(isset($researcher_id))
         <h1 class="jumbotron-heading" style="color: white">Sold Articles</h1>
         @else
            <h1 class="jumbotron-heading" style="color: white">Buyed Articles</h1>
        @endif
       <!-- <form action="/" method="POST">
         @csrf
           </br>
                   <div class="row">
                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                           <input type="text" class="form-control search-slt" name="survey_name" placeholder="Enter Survey Name">
                       </div>

                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <button type="button" class="btn btn-primary">Search</button>
                       </div>
                   </div>
            </form> -->

       </div>
     </section>

     <div style="margin-top: 5px"></div>


     <div class="album py-5 bg-light">

       <div class="container">
         <div class="row">

           @foreach ($researchpapers as $researchpaper)


           <div class="col-lg-4 col-md-8col-sm-12 ">
             <div class="card mb-4 box-shadow">
             <embed class="card-img-top" src="{{  url('storage/researchpapers/'.$researchpaper->pic) }}"  height="300px">
               <div class="card-body">
                 <b>Article Name</b> {{$researchpaper->article_name}}  <br>
                 <b>Researcher Name</b> {{$researchpaper->researcher_name}} <br>
                 <b>Researchpaper Price</b> {{$researchpaper->price}} <br>

                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                     @if(isset($researcher_id))
                     <a href="/researcher-view-other-researchpaper/{{ $researchpaper->id }}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>
                     @else
                     <a href="/searcher-view-researchpaper/{{ $researchpaper->id }}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>
                     @endif

                     </div>
                   <small class="text-muted">{{$researchpaper->created_at}}</small>
                 </div>
               </div>
             </div>
           </div>
             @endforeach

           <div style="margin-top: 10px; margin-left: 20px;"></div>

         </div>
       </div>
     </div>

 </main>

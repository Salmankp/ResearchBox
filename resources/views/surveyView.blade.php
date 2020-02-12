
@include('navbar')
@include('sidebar')

<main role="main">
     <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
       <div class="container">
         <h1 class="jumbotron-heading" style="color: white">Search Surveys</h1>

       <form action="/Survey/search" method="POST">
         @csrf
           </br>
                   <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                          <a href="view-performed-surveys" type="button" class="btn btn-secondary">See Performed Surveys</a>
                       </div>
                     <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                         <input type="text" class="form-control search-slt" name="Survey_name" placeholder="Enter Survey Name">
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                         <input type="text" class="form-control search-slt" required name="researcher" placeholder="Enter Researcher Name">
                       </div>
                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <button type="button" class="btn btn-primary">Search</button>
                       </div>

                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                       </div>

                   </div>
            </form>

       </div>
     </section>

     <div style="margin-top: 5px"></div>


     <div class="album py-5 bg-light">

       <div class="container">
         <div class="row">

           @foreach ($surveys as $survey)


           <div class="col-lg-4 col-md-8col-sm-12 ">
             <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="{{ url('storage/Surveys/'.$survey->pic) }}" style="width: 335px; height: 200px">
               <div class="card-body">
                 <b>Survey Name</b> {{$survey->survey_name}}  <br>
                 <b>Researcher Name</b> {{$survey->researcher_name}}  <br>
                 <b>Survey Type</b>  {{$survey->type}}  <br><br>


                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                     <a href="/api/survey/{{ $survey->id }}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;&nbsp;
                     <a href="/survey/{{ $survey->id }}/edit">
                     <button type="button" class="btn btn-sm btn-outline-danger">Edit</button></a>
                     </div>
                   <small class="text-muted">9 mins</small>
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

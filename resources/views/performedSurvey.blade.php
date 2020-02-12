
@include('navbar')
@include('sidebar')

<main role="main">
     <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
       <div class="container">
         <h1 class="jumbotron-heading" style="color: white">Search Performed Surveys</h1>

       <form action="/search-performed-surveys" method="POST">
         @csrf
           </br>
                   <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                     </div>

                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                           <input type="text" class="form-control search-slt" name="survey_name" placeholder="Enter Survey Name">
                       </div>

                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                      <button type="submit" class="btn btn-primary">Search</button>
                       </div>
                   </div>
            </form>

       </div>
     </section>

     <div style="margin-top: 5px"></div>


     <div class="album py-5 bg-light">

       <div class="container">
         <div class="row">

           @foreach ($performed_surveys as $performed_survey)


           <div class="col-lg-4 col-md-8col-sm-12 ">
             <div class="card mb-4 box-shadow">
             <embed class="card-img-top" src="{{  url('storage/PerformedSurveys/'.$performed_survey->pic) }}"  height="300px">
               <div class="card-body">
                 <b>Survey Name</b> {{$performed_survey->survey_name}}  <br>
                 <b>Researcher Name</b> {{$performed_survey->researcher_name}}  <br>
                 <b>Follower Name</b>  {{$performed_survey->searcher_name}}  <br>
                 <b>Follower Email</b>  {{$performed_survey->searcher_email}}  <br>
                 <b>Follower Qualification</b>  {{$performed_survey->searcher_qualification}}  <br>
                 <b>Follower Age</b>  {{$performed_survey->searcher_age}}  <br>
                 <b>Follower Description</b>  {{$performed_survey->searcher_description}}  <br><br>



                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                     <a href="/api/survey/{{ $performed_survey->id }}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;&nbsp;
                     <a href="download/{{ url('storage/PerformedSurveys/'.$performed_survey->file) }}" download="{{ url('storage/PerformedSurveys/'.$performed_survey->file) }}">
                     <button type="button" class="btn btn-sm btn-outline-warning">Download Performed Survey</button></a>
                     </div>
                   <small class="text-muted">{{$performed_survey->created_at}}</small>
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

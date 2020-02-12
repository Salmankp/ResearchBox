

@if(isset($researcher))
@include('navbar')
@include('sidebar')

@else

@include('searcherNavbar')
@include('searcherSidebar')

@endif


<main role="main">
     <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
       <div class="container">
         <h1 class="jumbotron-heading" style="color: white">Online Tasks</h1>

       </div>
     </section>

     <div style="margin-top: 5px"></div>


     <div class="album py-5 bg-light">

       <div class="container">
         <div class="row">

           @if(isset($all_assistances))
           @foreach ($all_assistances as $all_assistance)


           <div class="col-lg-4 col-md-8col-sm-12 ">
             <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="{{ url('storage/ConductAssistances/'.$all_assistance->pic) }}" style="width: 335px; height: 235px">
               <div class="card-body">
                 <b>Follower Name</b> {{$all_assistance->searcher_name}}  <br>
                 <b>Follower Email</b> {{$all_assistance->searcher_email}}  <br>
                 <b>Follower Qualification</b> {{$all_assistance->searcher_qualification}}  <br>
                 <b>Assistance Name</b>  {{$all_assistance->assistance_name}}  <br>
                 <b>Assistance Description</b>  {{$all_assistance->assistance_description}}  <br><br>

                 <div class="d-flex justify-content-between align-items-center">

                   <div class="btn-group">
                     <a href="download/{{ url('storage/ConductAssistances/'.$all_assistance->file) }}" download="{{ url('storage/ConductAssistances/'.$all_assistance->file) }}">
                     <button type="button" class="btn btn-sm btn-outline-info">Download Task</button></a>&nbsp;&nbsp;&nbsp;

                     @if(isset($researcher))
                     <a href="/perform-task/{{$all_assistance->id}}">
                     <button type="button" class="btn btn-sm btn-outline-warning">Perform Task</button></a>
                     @endif
                    </div>

                 </div>
                       <small class="text-muted">{{$all_assistance->created_at}}</small>
               </div>
             </div>
           </div>
             @endforeach
            @endif


            @if(isset($performed_assistances))
             @foreach ($performed_assistances as $performed_assistance)


             <div class="col-lg-4 col-md-8col-sm-12 ">
               <div class="card mb-4 box-shadow">
                 <img class="card-img-top" src="{{ url('storage/PerformedAssistances/'.$performed_assistance->pic) }}" style="width: 335px; height: 235px">
                 <div class="card-body">
                   <b>Assistance Name</b> {{$performed_assistance->assistance_name}}  <br>
                   <b>Researcher Name</b> {{$performed_assistance->researcher_name}}  <br>
                   <b>Researcher Qualification</b> {{$performed_assistance->researcher_qualification}}  <br>
                   <b>Assistance Description</b>  {{$performed_assistance->assistance_description}}  <br>
                   <b>Resarcher Description</b>  {{$performed_assistance->researcher_description}}  <br><br>

                   <div class="d-flex justify-content-between align-items-center">

                     <div class="btn-group">
                       <a href="download/{{ url('storage/PerformedAssistances/'.$performed_assistance->file) }}" download="{{ url('storage/PerformedAssistances/'.$performed_assistance->file) }}">
                       <button type="button" class="btn btn-sm btn-outline-info">Download Task</button></a>
                   </div>
                         <small class="text-muted">{{$performed_assistance->created_at}}</small>
                 </div>
               </div>
             </div>
           </div>
               @endforeach
              @endif


           <div style="margin-top: 10px; margin-left: 20px;"></div>

         </div>
       </div>
     </div>

 </main>




@include('adminNavbar')
@include('adminSidebar')

<main role="main">


  <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
    <div class="container">
      <h1 class="jumbotron-heading" style="color: white">Research Box</h1>
      <h3 class="jumbotron-heading" style="color: white">Pending Articles</h3>
    </div>
  </section>

     <div style="margin-top: 5px"></div>


     <div class="album py-5 bg-light">

       <div class="container">
         <div class="row">

         @if(isset($researchpapers))
           @foreach ($researchpapers as $researchpaper)


           <div class=" col-lg-4 col-md-8 col-sm-12">
             <div class="card mb-4 box-shadow">
               <embed class="card-img-top" src="{{ url('storage/researchpapers/'.$researchpaper->pic) }}"  height="300px"/> </embed>
               <!-- <img class="card-img-top" src="" style="width: 335px; height: 200px"> -->
               <div class="card-body">
                 <b>Article Name</b> {{$researchpaper->article_name}}  <br>
                 <b>Researcher Name</b> {{$researchpaper->researcher_name}}  <br>

                 @if ( $researchpaper->co_authors > 0 )
                 <b>Co-Author 1:</b> {{$researchpaper->co_author1}}  <br>
                 <b>Co-Author 2:</b> {{$researchpaper->co_author2}}  <br>
                 @endif

                 <b>Service</b>  {{$researchpaper->service}}  <br>
                 <b>Type</b> {{$researchpaper->type}} <br>
                 <b>Payment Type</b>  {{$researchpaper->payment_type}}  <br>
                 @if($researchpaper->status == 0)
                 <b>Status</b>  Pending <br><br>
                 @else
                <b>Status</b>  Approved <br><br>
                 @endif

                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">

                         <a href="/admin-view-other-researchpaper/{{ $researchpaper->id }}">
                         <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;
                         <a href="download/{{ url('storage/researchpapers/'.$researchpaper->file) }}" download="{{ url('storage/researchpapers/'.$researchpaper->file) }}">
                         <button type="button" class="btn btn-sm btn-outline-warning">Download</button></a>&nbsp;&nbsp;
                         @if($researchpaper->status == 0)
                         <a href="/admin-approved/{{$researchpaper->id}}">
                         <button type="button" class="btn btn-sm btn-outline-danger">Approve</button></a>
                         @endif


                     </div>
                 </div>
                 <small class="text-muted">{{$researchpaper->created_at}}</small>
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

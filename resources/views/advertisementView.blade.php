
@include('navbar')
@include('sidebar')

<main role="main">
     <section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
       <div class="container">
         <h1 class="jumbotron-heading" style="color: white">Search Advertisements</h1>

       <form action="/search-advertisement/{{$id}}" method="get">
         @csrf
           </br>
                   <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    </div>


                       <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                           <input type="text" class="form-control search-slt" name="advertisement_name" placeholder="Enter Advertisement Name">
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

           @foreach ($advertisements as $advertisement)


           <div class="col-lg-4 col-md-8col-sm-12 ">
             <div class="card mb-4 box-shadow">
               <img class="card-img-top" src="{{ url('storage/advertisements/'.$advertisement->advertisement_img) }}" style="width: 335px; height: 200px">
               <div class="card-body">
                 <b>Advertisement Name</b> {{$advertisement->advertisement_name}}  <br>
                 <b>Advertisement Name</b> {{$advertisement->researcher_name}}  <br>
                 <b>Advertisement Type</b>  {{$advertisement->type}}  <br><br>
                <b>Advertisement Description</b>  {{$advertisement->description}}  <br><br>


                 <div class="d-flex justify-content-between align-items-center">
                   <div class="btn-group">
                     <a href="/api/advertisement/{{ $advertisement->id }}">
                     <button type="button" class="btn btn-sm btn-outline-primary">View Details</button></a>&nbsp;&nbsp;&nbsp;
                     <a href="/advertisement/{{$advertisement->id}}/edit">
                     <button type="button" class="btn btn-sm btn-outline-danger">Edit</button></a>
                     </div>
                   <small class="text-muted">{{$advertisement->created_at}}</small>
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

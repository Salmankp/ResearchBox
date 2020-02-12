
@include('navbar')
@include('sidebar')




<main role="main">


	<section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
        <div class="container">
          <h1 class="jumbotron-heading" style="color: white">Article Details</h1>
          <p class="lead text-muted" style="color:#ffff;"></p>
        </div>

      </section>


      <div class="album py-5 bg-light">

        <div class="container">

          <div class="row">
            <div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="" style="width: 250px">
                <div class="card-body">
                  <p class="card-text"></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
											<form method="post" action="/api/researchpaper/{{ $researchpaper->id }}">
                        {{ method_field('DELETE') }}
                           {{ csrf_field() }}

                      <button type="submit" class="btn btn-sm btn-outline-danger" style="margin-top: 13px">Remove</button>
										</form>
                      </div>
                    <small class="text-muted" style="margin-top: 10px; margin-left: 10px;">Posted
                    </small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"> <b>Article Details</b></p>
                  <div class="d-flex justify-content-between align-items-center">


            <table class="table">

          			  <tbody>

										<tr>
          			      <tr>
          			      <th scope="col">Article Name</th>
          			      <td scope="col">{{$researchpaper->article_name}}</td>
          			      <th scope="col">Researcher Name</th>
          			      <td scope="col">{{$researchpaper->researcher_name}}</</td>
          			     </tr>

          			      <tr>
          			      <tr>
          			      <th scope="col">Researcher Designation</th>
          			      <td scope="col">{{$researchpaper->designation}}</</td>
          			      <th scope="col">Type</th>
          			      <td scope="col">{{$researchpaper->type}}</</td>
          			     </tr>

          			    <tr>
          			      <tr>
          			      <th scope="col">Service</th>
          			      <td scope="col">{{$researchpaper->service}}</td>
          			      <th scope="col">Institute</th>
          			      <td scope="col">{{$researchpaper->institute}}</</td>
          			     </tr>

          			       <tr>
          			      <tr>
          			      <th scope="col">Payment Type</th>
          			      <td scope="col">{{$researchpaper->payment_type}}</</td>
          			      <th scope="col">Isbn Number</th>
          			      <td scope="col">{{$researchpaper->isbn_number}}</</td>
          			     </tr>

										 @if($researchpaper->co_authors == '2')
          			      <tr>
          			      <tr>
          			      <th scope="col">Co Author1</th>
          			      <td scope="col">{{$researchpaper->co_author1}}</</td>
          			      <th scope="col">Co Author1 Designation</th>
          			      <td scope="col">{{$researchpaper->co_author1_designation}}</td>

          			     </tr>

										 <tr>
										 <tr>
										 <th scope="col">Co Author2</th>
										 <td scope="col">{{$researchpaper->co_author2}}</</td>
										 <th scope="col">Co Author2 Designation</th>
										 <td scope="col">{{$researchpaper->co_author2_designation}}</td>

										</tr>
										@endif

          			  </tbody>
			</table>





                  </div>
                </div>
              </div>
            </div>


				<div class="row">
           			 <div class="col-md-12 mt-5">
		              <div class="card mb-4 box-shadow">
		   				<h5 style="padding-left: 10px">Article Description </h5>
		                <div class="card-body">
		                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		                  <div class="d-flex justify-content-between align-items-center">


		                  </div>
		                </div>
		              </div>
		            </div>
            	 </div>

            	 <div class="row">
           			 <div class="col-md-12 mt-5">
		              <div class="card mb-4 box-shadow">
		   				<h5 style="padding-left: 10px">Article Specification </h5>
		                <div class="card-body">
		                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
		                  <div class="d-flex justify-content-between align-items-center">


		                  </div>
		                </div>
		              </div>
		            </div>

            	 </div>



          </div>
		</div>
		<div style="float: right;"><a href="/jobpost/show"><button type="button" class="btn btn-sm btn-outline-danger">Back</button></a></div>
	</div>

</main>

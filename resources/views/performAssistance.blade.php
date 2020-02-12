
@include('navbar')
@include('sidebar')


<html lang="en">

<head>
	<title>Perform Assistance</title>

	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->
    <!-- files for website-->


  <!-- form files -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="{{ URL::asset('/img/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/bootstrapf/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/font-awesome-4.7.0f/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/iconicf/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/animatef/animate.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/css-hamburgersf/hamburgers.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/animsitionf/css/animsition.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/daterangepickerf/daterangepicker.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/vendor/nouif/nouislider.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/utilf.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/mainf.css')}}">



<!--===============================================================================================-->
<style>
		#gc_div,
		#pu_div,
		#uosl_div,
		#har_div,
		#mit_div,
		#jname,
		#jp,
		#jpage,
		#jpdate,
		#cn,
		#cl,
		#cd,
		#cs,
		#paid,

		#inter {
			display: none;
		}

		#jj,
		#cc {
			display: none;
		}


    </style>
    <script>
        function rpType() {
        var al = document.getElementById("rptype");
        var cl = al.options[al.selectedIndex].value;
        // alert(cl);
        if(cl == "jr"){
           document.getElementById('jj').style.display = 'block';
           document.getElementById('cc').style.display = 'none';
}
          else {
          document.getElementById('cc').style.display = 'block';
          document.getElementById('jj').style.display = 'none';
}
}

function make(rad) {

		if (rad == ('radio1')) {
			document.getElementById('nat').style.display = 'block';
			document.getElementById('inter').style.display = 'none';

		} else{
			document.getElementById('nat').style.display = 'none';
			document.getElementById('inter').style.display = 'block';
		}

	}

	function ispaid(paaidd)  {

		if (paaidd ==('radioff')) {
			document.getElementById('paid').style.display = 'none';
			document.getElementById('free').style.display = 'block';

		}

		else{
			document.getElementById('paid').style.display = 'block';
			document.getElementById('free').style.display = 'none';

		}
	}
    </script>

</head>




<body>




	<div class="container-contact100">
		<div class="wrap-contact100">

			<section class="jumbotron text-center mt" style="background-color: #9400D3;"> <!-- #8A2BE2 -->
				<div class="container">
					<h1 class="jumbotron-heading" style="color: white">Perform Your Assistance</h1>

				</div>
			</section>

			<form class="contact100-form validate-form" action="/assistance-performed/{{$assistance_id}}/{{$assistance->searcher_id}}" enctype="multipart/form-data" method="POST">
				@csrf
				<!-- <span class="contact100-form-title">
					Perform Your Assistance
				</span> -->


				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Searcher Name *</span>
					<input class="input100" type="text" name="searcher_name" value="{{$assistance->searcher_name}}">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Your Designation">
					<span class="label-input100">Searcher Email *</span>
					<input class="input100" type="text" name="searcher_email" value="{{$assistance->searcher_email}}">
				</div>
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Searcher Qualification">
					<span class="label-input100">Searcher Qualification *</span>
					<input class="input100" type="text" name="searcher_qualification" value="{{$assistance->searcher_qualification}}">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Assistance Description">
					<span class="label-input100">Assistance Description *</span>
					<input class="input100" type="text" name="assistance_description" value="{{$assistance->assistance_description}}">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Searcher Email">
					<span class="label-input100">Assistance Name *</span>
					<input class="input100" type="text" name="assistance_name" value="{{$assistance->assistance_name}}">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Researcher Name">
					<span class="label-input100">Researcher Name *</span>
					<input class="input100" type="text" name="researcher_name" value="{{$researcher->name}}" >
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Researcher Qualification">
					<span class="label-input100">Researcher Qualification *</span>
					<input class="input100" type="text" name="researcher_qualification" value="{{$researcher->position}}">
				</div>

				<div class="wrap-input100 validate-input bg1">
					<span class="label-input100">Resarcher Description</span>
					<textarea class="md-textarea form-control" rows="3" name="researcher_description"></textarea>
				</div>



				<!-- <div class="wrap-input100 input100-select bg1">
				<span class="label-input100">Research Paper Type *</span>
				<div>
					<select class="js-select2" name="service" id="rptype" onchange="rpType();" required="" tabindex="-1" aria-hidden="true">
						<option value="" disabled="" selected="" hidden="">Choose Research Paper Type...</option>
						<option value="jr">Journal Research</option>
						<option value="cr">Conference Research</option>

					</select>
					<div class="dropDownSelect2"></div>
				</div>
			</div> -->

					<!-- <div class="w-full dis-none js-show-service"> -->
						<!--------------journal-------------->

						<!-- <div id="jj">


							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Journal Name">
								<span class="label-input100">Journal Name *</span>
								<input class="input100" type="text" name="journal_name" placeholder="Journal Name ">
							</div>

							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Journal Publisher">
								<span class="label-input100">Journal Publisher *</span>
								<input class="input100" type="text" name="journal_publisher" placeholder="Journal Publisher ">
							</div>


							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Journal page No">
								<span class="label-input100">Journal Page No *</span>
								<input class="input100" type="number" name="journal_page" placeholder="Journal Page No ">
							</div>


							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Journal Publishing Date">
								<span class="label-input100">Publishing Date *</span>
								<input class="input100" type="date" name="journal_publish_date" placeholder="Journal Publishing Date ">
							</div>
						</div> -->

						<!----------------Conference-------------------------->
						<!-- <div id="cc">
							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Conference Name">
								<span class="label-input100">Conference Name *</span>
								<input class="input100" type="text" name="Conference_name" placeholder="Conference Name ">
							</div>
							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Conference Date">
								<span class="label-input100">Conference Date *</span>
								<input class="input100" type="date" name="Conference_date" placeholder="Conference Date ">
							</div>
							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Conference Location">
								<span class="label-input100">Conference Location *</span>
								<input class="input100" type="text" name="conference_location" placeholder="Conference Location ">

							</div>
							<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Conference Superviser">
								<span class="label-input100">Conference Supervisor *</span>
								<input class="input100" type="text" name="conference_supervisor" placeholder="Conference Superviser ">

							</div> -->

							<!-- <div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
								<span class="label-input100">Which Insitution Organized *</span>
								<div>
									<select name="insitution" required>
										<option value="" disabled="" selected="" hidden="">Choose Insitution...</option>
										<option value="guu">Goverment University</option>
										<option value="puu">Punjab University</option>
										<option value="fuu">FAST University</option>

									</select>
								</div>
							</div> -->
						<!-- </div> -->
						<!-----------End RP Type---------->
					<!-- </div> -->
				<!----------end rp--------->
				<!--------------end Conference-------------->
				<!------------------------>
				<!-- <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">CATEGORIES</span>

					<div class="contact100-form-radio m-t-15">
						<input class="input-radio100" id="radio1" type="radio" name="type" value="national" onclick='make(this.id)' checked="checked">
						<label class="label-radio100" for="radio1">
							National
						</label>
					</div>

					<div class="contact100-form-radio">
						<input class="input-radio100" id="radio2" type="radio" name="type" onclick='make(this.id)' value="international">
						<label class="label-radio100" for="radio2">
							International
						</label>
					</div>
				</div> -->

				<!--------------National insitutions---------->
				<!-- <div id="nat">
					<div class="wrap-input100 input100-select bg1">
						<span class="label-input100">National insitutions *</span>
						<div>
							<select class="js-select3" name="insitute" id="uni" onchange="func();" required>
								<option value="" disabled="" selected="" hidden="">Choose University...</option>

								<option value="pu">Punjab University</option>
								<option value="gc">Goverment University</option>
								<option value="fast">Fast University</option>

							</select>
							<div class="dropDownSelect3"></div>
						</div>
					</div>


					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Department</span>

						<div class="contact100-form-radio m-t-15" id="pu_div">
							<input class="input-radio100" id="radio11" type="radio" name="pu" checked="checked">
							<label class="label-radio100" for="radio11">
								Biological Department
							</label>
							<input class="input-radio100" id="radio22" type="radio" name="pu">
							<label class="label-radio100" for="radio22">
								Islamiat Department
							</label>
							<input class="input-radio100" id="radio33" type="radio" name="pu">
							<label class="label-radio100" for="radio33">
								Arts Department
							</label>
						</div>

						<div class="contact100-form-radio" id="gc_div">
							<input class="input-radio100" id="radio44" type="radio" name="gc" checked="checked">
							<label class="label-radio100" for="radio44">
								Math Department
							</label>
							<input class="input-radio100" id="radio55" type="radio" name="gc">
							<label class="label-radio100" for="radio55">
								Chemistry Department
							</label>
							<input class="input-radio100" id="radio66" type="radio" name="gc">
							<label class="label-radio100" for="radio66">
								Urdu Department
							</label>
						</div>


						<div class="contact100-form-radio" id="fast_div">
							<input class="input-radio100" id="radio77" type="radio" name="fast" checked="checked">
							<label class="label-radio100" for="radio77">
								Physics Department
							</label>

							<input class="input-radio100" id="radio88" type="radio" name="fast">
							<label class="label-radio100" for="radio88">
								Computer Department
							</label>

							<input class="input-radio100" id="radio99" type="radio" name="fast">
							<label class="label-radio100" for="radio99">
								English Department
							</label>

						</div>
					</div>
				</div> -->
				<!------end insitution---------->
				<!--------------Your internatinal insitution---------->
				<!-- <div id="inter">
					<div class="wrap-input100 input100-select bg1">
						<span class="label-input100">International insitutions *</span>
						<div>
							<select class="js-select3" name="insitute" id="uni2" onchange="func2();" required>
								<option value="" disabled="" selected="" hidden="">Choose University...</option>

								<option value="ox">Oxford University</option>
								<option value="har">Harvard University</option>
								<option value="mit">MIT University</option>

							</select>
							<div class="dropDownSelect3"></div>
						</div>
					</div>


					<div class="wrap-contact100-form-radio">
						<span class="label-input100">Department</span>

						<div class="contact100-form-radio m-t-15" id="ox_div">
							<input class="input-radio100" id="radio111" type="radio" name="ox" checked="checked">
							<label class="label-radio100" for="radio111">
								Biological Department
							</label>
							<input class="input-radio100" id="radio222" type="radio" name="ox">
							<label class="label-radio100" for="radio222">
								Islamiat Department
							</label>
							<input class="input-radio100" id="radio333" type="radio" name="ox">
							<label class="label-radio100" for="radio333">
								Arts Department
							</label>
						</div>

						<div class="contact100-form-radio" id="har_div">
							<input class="input-radio100" id="radio444" type="radio" name="har" checked="checked">
							<label class="label-radio100" for="radio444">
								Math Department
							</label>
							<input class="input-radio100" id="radio555" type="radio" name="har">
							<label class="label-radio100" for="radio555">
								Chemistry Department
							</label>
							<input class="input-radio100" id="radio666" type="radio" name="har">
							<label class="label-radio100" for="radio666">
								Urdu Department
							</label>
						</div>


						<div class="contact100-form-radio" id="mit_div">
							<input class="input-radio100" id="radio777" type="radio" name="mit" checked="checked">
							<label class="label-radio100" for="radio777">
								Physics Department
							</label>

							<input class="input-radio100" id="radio888" type="radio" name="mit">
							<label class="label-radio100" for="radio888">
								Computer Department
							</label>

							<input class="input-radio100" id="radio999" type="radio" name="mit">
							<label class="label-radio100" for="radio999">
								English Department
							</label>

						</div>
					</div>
					</div> -->

					<!--------------Paid or free -------------->

					<!-- <div class="wrap-input100 input100-select bg1">
						<span class="label-input100">Choose Type</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radioff" type="radio" name="payment_type" value="free" onclick="ispaid(this.id)"  checked="checked">
							<label class="label-radio100" for="radioff">
								Free Article
							</label>
						</div>

						<div class="contact100-form-radio">
							<input class="input-radio100" id="radiopp" type="radio" name="payment_type" onclick="ispaid(this.id)"  value="paid">
							<label class="label-radio100" for="radiopp">
								Paid Article
							</label>
						</div>
					</div> -->
					 <!-- Free -->

					 <!-- <div id = "free">

						<div class="wrap-input100 input100-select bg1">

								<span class="label-input100"> Enjoy Our Research Paper Free *</span>

						</div>



					 </div> -->

					 <!-- End Free-->

					 <!-- Paid -->

					 <!-- <div id = "paid">
						 <div class = "wrap-input100 input100-select bg1">
							<div class="wrap-contact100-form-radio">
									<span class="label-input100">Choose Payment</span>

									<div class="contact100-form-radio m-t-15" id="lowpay">
										<input class="input-radio100" id="radiolow" type="radio" name="price" checked="checked" value="5$">
										<label class="label-radio100" for="radiolow">
											5$
										</label>
										<input class="input-radio100" id="radiomed" type="radio" name="price" value="10$">
										<label class="label-radio100" for="radiomed">
											10$
										</label>
										<input class="input-radio100" id="radiohigh" type="radio" name="price" value="15$">
										<label class="label-radio100" for="radiohigh">
											15$
										</label>
									</div>

									</div>

                                         </div>


					 </div> -->

					 <!-- End Paid -->

                    <!--------------End paid or free--------------->
					<!------end internation insitution---------->
					<!------------profile picture---------->
					<div class="wrap-input100 input100-select bg1">
					<!-- <br />
					<span class="label-input100"> Choose Your Profile Picture *</span>
					<br />
					<br />
					<input type="file" name="image1" required/>

					<br />
					<br /> -->
					<!---------------Upload Research paper-------->
					<span class="label-input100"> Upload Your Assistance *</span>
					<br />
					<br />
					<input type="file" name="file" accept="application/pdf"/>
					<!---------------- End research---------->
					<br />
					<br />
				</div>
					<div class="container-contact100-form-btn">
						<!-- <button class="contact100-form-btn" type="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
						 <button class="btn btn-primary"> Submit </button> -->
						<button class="btn btn-primary" type="submit" value="submit" onclick="window.location.href='/assistance-performed/{{$assistance_id}}/{{$assistance->searcher_id}}'" />Submit</button>
					</div>
			</form>
			</div>
		</div>




<!--===============================================================================================-->
<script src="{{asset('/vendor/jqueryf/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/animsitionf/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/bootstrapf/js/popper.js')}}"></script>
<script src="{{asset('/vendor/bootstrapf/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
</script>

<script src="{{asset('/vendor/select2/select2.min.js')}}"></script>

<script>
$(".js-select3").each(function(){
			$(this).select3({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect3')
			});


			$(".js-select3").each(function(){
				$(this).on('select3:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})


   function func() {
        var el = document.getElementById("uni");
        var op = el.options[el.selectedIndex].value;
        // alert(op);
        if(op == "pu"){
            document.getElementById('pu_div').style.display = 'block';
            document.getElementById('gc_div').style.display = 'none';
            document.getElementById('fast_div').style.display = 'none';
        }
        else if (op == 'gc'){
            document.getElementById('pu_div').style.display = 'none';
            document.getElementById('gc_div').style.display =  'block';
            document.getElementById('fast_div').style.display = 'none';
        }
        else{
            document.getElementById('gc_div').style.display = 'none';
            document.getElementById('pu_div').style.display = 'none';
            document.getElementById('fast_div').style.display = 'block';
        }
   }

	 function func2() {
			 var el = document.getElementById("uni2");
			 var op = el.options[el.selectedIndex].value;
			 // alert(op);
			 if (op == "ox") {
				 document.getElementById('ox_div').style.display = 'block';
				 document.getElementById('har_div').style.display = 'none';
				 document.getElementById('mit_div').style.display = 'none';
			 }
			 else if (op == 'har') {
				 document.getElementById('ox_div').style.display = 'none';
				 document.getElementById('har_div').style.display = 'block';
				 document.getElementById('mit_div').style.display = 'none';
			 }
			 else {
				 document.getElementById('ox_div').style.display = 'none';
				 document.getElementById('har_div').style.display = 'none';
				 document.getElementById('mit_div').style.display = 'block';
			 }
		 }


</script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/daterangepickerf/moment.min.js')}}"></script>
<script src="{{asset('/vendor/daterangepickerf/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/countdowntimef/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('/vendor/nouif/nouislider.min.js')}}"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
		<script src="{{asset('/js/mainf.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>

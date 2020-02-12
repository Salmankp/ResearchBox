<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload Article</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- files for website-->

  <!-- form files -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrapf/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0f/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconicf/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animatef/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgersf/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsitionf/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2f/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepickerf/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/nouif/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/utilf.css">
	<link rel="stylesheet" type="text/css" href="../css/mainf.css">
<!--===============================================================================================-->
<style>
        #gc_div ,#pu_div , #uosl_div , #jname , #jp , jpage , #jpdate , #cn , #cl , #cd , #cs{
            display: none;
        }
        #jj,#cc{
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
    </script>
</head>



<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Add Your Researches
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">Researcher Name *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Researcher Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate ="Phone No">
					<span class="label-input100">Phone</span>
					<input class="input100" type="number" name="phone" placeholder="Enter Your Phone No">
				</div>
                                 <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Your Designation">
					<span class="label-input100">Designation *</span>
					<input class="input100" type="text" name="desig" placeholder="Enter Your Designation ">
				</div>
                              <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Research Paper Name">
					<span class="label-input100">Research Paper *</span>
					<input class="input100" type="text" name="rpname" placeholder="Research Paper Name ">
				</div>



				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Research Paper Type *</span>
					<div>
						<select class="js-select2" name="service" id="rptype" onchange="rpType();"  required>
                                                        <option value="" disabled="" selected="" hidden=""  >Choose Research Paper Type...</option>
							<option value="jr">Journal Research</option>
							<option value="cr">Conference Research</option>

						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				<div class="w-full dis-none js-show-service">
					<!--------------journal-------------->

<div id="jj">


                                         <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Journal Name" >
					<span class="label-input100">Journal Name *</span>
					<input class="input100" type="text" name="jname" placeholder="Journal Name ">
				</div>

                                  <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Journal Publisher"  >
					<span class="label-input100">Journal Publisher *</span>
					<input class="input100" type="text" name="jp" placeholder="Journal Publisher ">
				</div>


                                   <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Journal page No" id="jpage">
					<span class="label-input100">Journal Page No *</span>
					<input class="input100" type="number" name="jpage" placeholder="Journal Page No ">
				</div>


                                     <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Journal Publishing Date" >
					<span class="label-input100">Publishing Date *</span>
					<input class="input100" type="date" name="jpdate" placeholder="Journal Publishing Date ">
				</div>
</div>

                               <!----------------Conference------------------------->
<div id ="cc">
                                    <div class="wrap-input200 validate-input2 bg1 rs1-wrap-input200" data-validate = "Journal Name" >
					<span class="label-input100">Journal Name *</span>
					<input class="input100" type="text" name="jname" placeholder="Journal Name ">
				</div>

                                  <div class="wrap-input200 validate-input2 bg1 rs1-wrap-input200" data-validate = "Journal Publisher"  >
					<span class="label-input100">Journal Publisher *</span>
					<input class="input100" type="text" name="jp" placeholder="Journal Publisher ">
				</div>


                                   <div class="wrap-input200 validate-input2 bg1 rs1-wrap-input200" data-validate = "Journal page No" id="jpage">
					<span class="label-input100">Journal Page No *</span>
					<input class="input100" type="number" name="jpage" placeholder="Journal Page No ">
				</div>


                                     <div class="wrap-input200 validate-input2 bg1 rs1-wrap-input200" data-validate = "Journal Publishing Date" >
					<span class="label-input100">Publishing Date *</span>
					<input class="input100" type="date" name="jpdate" placeholder="Journal Publishing Date ">
				</div>

                               <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Which Insitution Organized *</span>
					<div>
						<select name="insitutions"  required>
                                                        <option value="" disabled="" selected="" hidden="">Choose Insitution...</option>
							<option value="guu">Goverment University</option>
							<option value="puu">Punjab University</option>
                                                        <option value="fuu">FAST University</option>

						</select>
						</div>
				</div> </div>
                                  <!--------------end Conference-------------->
                              <!------------------------>
					<div class="wrap-contact100-form-radio">
						<span class="label-input100">CATEGORIES</span>

						<div class="contact100-form-radio m-t-15">
							<input class="input-radio100" id="radio1" type="radio" name="type-product" value="national" checked="checked">
							<label class="label-radio100" for="radio1">
								National
							</label>
						</div>

						<div class="contact100-form-radio" >
							<input class="input-radio100" id="radio2" type="radio" name="type-product" value="international">
							<label class="label-radio100" for="radio2">
								International
							</label>
						</div>
				</div>
                             </div>
                            <!--------------Your insitution--------->

                               <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Your insitution *</span>
					<div>
						<select class="js-select3" name="service" id="uni" onchange="func();" required>
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
						<div class="contact100-form-radio m-t-15" id="pu_div" >
							<input class="input-radio100" pu_id="pu_bio" type="radio" name="pu_bio" checked="checked">
							<label class="label-radio100" for="radio11">
								Biological Department
							</label>
                                                 <input class="input-radio100" pu_id="pu_isl" type="radio" name="pu_isl">
							<label class="label-radio100" for="radio12">
								Islamiat Department
							</label>
                                                <input class="input-radio100" pu_id="pu_arts" type="radio" name="pu_arts">
							<label class="label-radio100" for="radio13">
								Arts Department
							</label>
						</div>

						<div class="contact100-form-radio" id="gc_div">
							<input class="input-radio100" gc_id="gc_math" type="radio" name="gc_math"checked="checked">
							<label class="label-radio100" for="radio12">
								Math Department
							</label>
                                               <input class="input-radio100" gc_id="gc_chem" type="radio" name="gc_chem" >
							<label class="label-radio100" for="radio12">
								Chemistry Department
							</label>
                                                   <input class="input-radio100" gc_id="gc_urdu" type="radio" name="gc_urdu">
							<label class="label-radio100" for="radio12">
								Urdu Department
							</label>
						</div>


                                          <div class="contact100-form-radio" id="fast_div">
							<input class="input-radio100" fast_id="fast_phy" type="radio" name="fast_phy" checked="checked">
							<label class="label-radio100" for="radio13">
								Physics Department
							</label>

                                        <input class="input-radio100" fast_id="fast_comp" type="radio" name="fast_comp">
							<label class="label-radio100" for="radio13">
								Computer Department
							</label>

				   <input class="input-radio100" fast_id="fast_eng" type="radio" name="fast_eng">
							<label class="label-radio100" for="radio13">
								English Department
							</label>

					</div>

                                 <!------end insitution---------->
                                <!------------profile picture---------->
                               <br />
                                 <span class="label-input100"> Choose Your Profile Picture *</span><br /><br />
                                       <input type="file" name="image1"  required/>

                               <!---------------end profile---------->
                                <br /> <br />
                               <!---------------Upload Research paper-------->
                              <span class="label-input100"> Upload Your Research Paper *</span><br /><br />
                                       <input type="file" name="image"  required/>
                                    <!---------------- End research---------->
				<br /> <br />

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="../vendor/jqueryf/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsitionf/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrapf/js/popper.js"></script>
	<script src="../vendor/bootstrapf/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2f/select2.min.js"></script>
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

	<script src="../vendor/select2f/select2.min.js"></script>
<script src="../vendor/select3f/select3.min.js"></script>
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




</script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepickerf/moment.min.js"></script>
	<script src="../vendor/daterangepickerf/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntimef/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/nouif/nouislider.min.js"></script>
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
	<script src="../js/mainf.js"></script>

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

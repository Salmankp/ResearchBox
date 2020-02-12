<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Signup</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="../css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="../css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="../css/style2.css"/>
</head>
<body style=" background-image: url('../img/background1.jpg')" >
	<div class="page-content">
		<div class="wizard-v4-content" style="background-image: url('../img/wizard-v4.jpg')">
			<div class="wizard-form">
				<div class="wizard-header">
					<h3 class="heading">Sign Up</h3>
					<p>Fill all form field to go next step</p>
				</div>

				@if($errors->any())
				<p  class="alert alert-info">{{$errors->first()}}</p>
				@endif

		        <form class="form-register" action= "{{route('researcher-register')}}" method="post">
							  @csrf
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-text">About</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Personal Information:</h3>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" required value="">

											@if ($errors->has('name'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('name') }}</strong>
													</span>
											@endif

											<span class="label">Name</span>
					  						<span class="border"></span>
										</label>
									</div>
									<!-- <div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="last-name" name="last-name" required>
											<span class="label">Last Name</span>
					  						<span class="border"></span>
										</label>
									</div> -->
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-1">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="address" name="address" required>
											<span class="label">Address Location</span>
					  						<span class="border"></span>
										</label>
									</div>

									<div class="form-row">
										<div class="form-holder form-holder-2">
											<label class="form-row-inner">
												<input type="date" class="form-control" id="dob" name="dob" required>
												<span class="label"></span>
													<span class="border"></span>
											</label>
										</div>
									</div>

								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="phone" name="phone" required>
											<span class="label">Phone Number</span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
									<label class="form-row-inner">
										<input type="text" class="form-control" id="zip_code" name="zip_code" required>
										<span class="label">Zip Code</span>
											<span class="border"></span>
									</label>
								</div>
							</div>


							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-lock"></i></span>
			            	<span class="step-text">Account</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Required Information For profile</h3>
								<!-- <div class="form-row">
									<div id="radio">
										<input type="radio" name="gender" value="male" checked class="radio-1"> I already have an account.
  										<input type="radio" name="gender" value="female"> I'm newbie
									</div>
								</div> -->
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  value=""required>

											@if ($errors->has('email'))
													<span class="invalid-feedback" role="alert">
														<p> <strong>{{ $errors->first('email') }}</strong> </p>
													</span>
											@endif

											<span class="label">Email</span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"  value="" required>

											@if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif

											<span class="label">Password</span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>

								<!-- <div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" required>

											@if ($errors->has('password'))
													<span class="invalid-feedback" role="alert">
															<strong>{{ $errors->first('password') }}</strong>
													</span>
											@endif

											<span class="label">Password</span>
											<span class="border"></span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="password" name="comfirm_password" id="comfirm_password" class="form-control" required>
											<span class="label">Comfirm Password</span>
											<span class="border"></span>
										</label>
									</div>
								</div>
							</div> -->
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-text">Experience</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<h3>Portfolio Information</h3>

									<div class="form-row">

										<div class="form-holder form-holder-2">
											<label class="form-row-inner">
												<input type="text" class="form-control" id="organization" name="organization" required>
												<span class="label">Organization</span>
												<span class="border"></span>
											</label>
										</div>



								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="experience" name="experience" required>
											<span class="label">Experience in Years</span>
											<span class="border"></span>
										</label>
									</div>
								</div>
							</div>


									<div class="form-row">

										<div class="form-holder form-holder-2">
											<select name="category" id="category">
												<option value="Category" disabled selected>Category</option>
												<option value="ISLAMIC">ISLAMIC</option>
												<option value="Science">Science</option>
												<option value="Web article">Web Articles</option>
												<option value="Physics">Physics</option>
												<option value="HRM">HRM</option>
												<option value="Management">Management</option>
												<option value="Engenering">Engenering</option>
												<option value="Programming">Programming</option>
												<option value="HCI">HCI</option>
											</select>
										</div>



								<div class="form-row">
									<div class="form-holder form-holder-2">
										<select name="position" id="position">
											<option value="Position" disabled selected> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Position  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</option>
											<option value="Manager">Manager</option>
											<option value="Employee">Employee</option>
											<option value="Director">Director</option>
										</select>
									</div>
								</div>
							</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<select name="area" id="area">
											<option value="Research Area" disabled selected>Research Area</option>
											<option value="Marketing">Marketing</option>
											<option value="Finance">Finance</option>
											<option value="IT Support">IT Support</option>
										</select>
									</div>
								</div>

							</div>
			            </section>
			            <!-- SECTION 4 -->
			            <h2>
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-text">Academic Information</span>
			            </h2>
			            <section>
			                <div class="inner">
			                		<h4>Major In </h4>
												<div class="form-row">
													<div class="form-holder form-holder-2">
														<label class="form-row-inner">
															<input type="text" name="major" id="major" class="form-control" required>
															<span class="label">Major in</span>
															<span class="border"></span>
														</label>
													</div>
												</div>


								<div class="form-row">

								<div class="form-holder form-holder-2">
									<select name="type" id="inventory">
										<option value="Researching Type" disabled selected>Researching Type</option>
										<option value="Internatonal">Internatonal</option>
										<option value="National">National</option>
									</select>
								</div>
							</div>
								<div class="form-row">

										<label class="form-row-inner">
											<textarea name="description" rows = "8" cols = "90" id="description" class="form-control" required>
												Enter Description...
											</textarea>
											<span class="border"></span>
												</label>


								 </div>
							</div>
								<div class="row">
									<button class="submit_style" type="submit">
										SignUp
									</button>
								</div>


			            </section>

		        	</div>

		        </form>
			</div>
		</div>
	</div>

	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/jquery.steps.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/main2.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
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
<body style="background-image: url('../img/background1.jpg')">
	<div class="page-content">
		<div class="wizard-v4-content" style="background-image: url('../img/wizard-v4.jpg')">
			<div class="wizard-form">
				<div class="wizard-header">
					<h3 class="heading">Login</h3>
					<p>Fill all form field to go next step</p>
				</div>

		        <form class="form-register" action="#" method="post">
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
											<input type="text" class="form-control" id="email" name="email" required>
											<span class="label">Email</span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="password" name="password" required>
											<span class="label">Password</span>
					  						<span class="border"></span>
										</label>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
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

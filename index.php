<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PASA Contact List</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<!-- Bootstrap itself -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles -->
	<link rel="stylesheet" href="assets/css/master.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
	<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">

</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">
	<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Login</h4>
	      </div>
	      <div class="modal-body">
	        <input id="userName" type="text" placeholder="User Name">
					<input id="password" type="password" placeholder="Password">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" id="login">Login</button>
	      </div>
	    </div>

	  </div>
	</div>
<nav class="mainmenu">
	<div class="container">
		<div class="dropdown">
			<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<li><a href="#head" class="active">Home</a></li>
				<li><a href="#search">Search</a></li>
				<li><a href="#insert">Add Contact</a></li>

			</ul>
		</div>
	</div>
</nav>


<!--(Home) section -->
<section class="section" id="head">

	<div class="container">
		<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">
				<h1 class="title">PASA QA Contact List</h1>
				<h2 class="subtitle">Add or Search Contacts</h2>
			</div> <!-- /col -->
		</div> <!-- /row -->
	</div>
</section>

<!-- (Search) section -->
<section class="section" id="search">
	<div class="container">
	 <br />
	 <h2 align="center">Contact Search</h2><br />
	 <div class="form-group">
		<div class="input-group">
		 <span class="input-group-addon">Search</span>
		 <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
		</div>
	 </div>
	 <br />
	 <div id="result"></div>
	</div>
</section>

<!-- (insert) section -->
<section class="section" id="insert">
	<div class="container">
	  <div id="form">
	  <div class="container-fluid">
	  <div class="form-group">
	    <label class="col-sm-3 control-label">Manufacturer</label>
	      <div class="col-sm-3">
	       <select class="selectpicker" data-live-search="true" data-width="auto">
					 <?php

 	        include 'php/connect.php';

 	        $query =$link->prepare("SELECT mfr_name FROM manufacturer ORDER BY mfr_name");
 	        $query->execute();

 	        while($rows = $query->fetch(PDO::FETCH_ASSOC)) {
 	        echo '<option value= "'.$rows[mfr_name].'"> '.$rows[mfr_name].'</option>"';
 	        }
 	        ?>
	        </select>
	      </div>
	    </div>
	<div class="row">

	<label class="col">First Name :</label>
	<input id="first_name" class="col" type="text">
	<label class="col">Last Name :</label>
	<input id="last_name" class="col" type="text">
	<div class="w-100"></div>
	<label class="col">Email :</label>
	<input id="email" class="col" type="text">
	<label class="col">Phone :</label>
	<input id="phone" class="col" type="text">
	<div class="w-100"></div>
	<label class="col">Extension :</label>
	<input id="ext" class="col" type="text">
	<label class="col">Alt Phone :</label>
	<input id="alt_phone" class="col" type="text">
	<div class="w-100"></div>
	<label class="col">Alt Phone Extension :</label>
	<input id="alt_ext" class="col" type="text">
	<label class="col">address:</label>
	<input id="address" class="col" type="text">
	<div class="w-100"></div>
	<label class="col">Alternate Address :</label>
	<input id="alt_address" class="col" type="text">
	<label class="col">Role :</label>
	<input id="role" class="col" type="text">
	<div class="w-100"></div>
	<div class="col">
	<input id="submit" type="button" value="Submit">
	<div class="w-100"></div>
	</div>
	</div>
	</div>
	</div>
</section>





<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="js/blockUI.js"></script>
<script src="assets/js/modernizr.custom.72241.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<!-- Custom template scripts -->
<script src="assets/js/master.js"></script>
<script src="js/livesearch.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
</body>
</html>

<?php
require("config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo TODO_SYSTEM_NAME; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap-glyphicons.css" rel="stylesheet" media="screen">
		<style type="text/css">
			.navbar form[role="search"] .form-group{
				position:relative;
			}
			.navbar form[role="search"] .form-group button[type="submit"]{
				position:absolute;
				color:#333;
				top:0;
				right:0;
			}
			.navbar form[role="search"] .form-group button[type="submit"]:hover{
				opacity:.8;
				text-decoration: none;
			}
			.twitter-typeahead .tt-query,
			.twitter-typeahead .tt-hint {
				margin-bottom: 0;
			}
			
			.tt-dropdown-menu {
				min-width: 160px;
				margin-top: 2px;
				padding: 5px 0;
				background-color: #fff;
				border: 1px solid #ccc;
				border: 1px solid rgba(0,0,0,.2);
				*border-right-width: 2px;
				*border-bottom-width: 2px;
				-webkit-border-radius: 6px;
				   -moz-border-radius: 6px;
				        border-radius: 6px;
				-webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
				   -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
				        box-shadow: 0 5px 10px rgba(0,0,0,.2);
				-webkit-background-clip: padding-box;
				   -moz-background-clip: padding;
				        background-clip: padding-box;
			}
			
			.tt-suggestion, .tt-header {
				display: block;
				padding: 3px 20px;
			}
			
			.tt-suggestion.tt-is-under-cursor {
				color: #fff;
				background-color: #0081c2;
				background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
				background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
				background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
				background-image: -o-linear-gradient(top, #0088cc, #0077b3);
				background-image: linear-gradient(to bottom, #0088cc, #0077b3);
				background-repeat: repeat-x;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0)
			}
			
			.tt-suggestion.tt-is-under-cursor a {
				color: #fff;
			}

			.tt-suggestion p, .tt-header {
				margin: 0;
			}
			.navbar form[role="search"] .form-group input[type="search"]{
				background:#FFF !important;
			}
			.tt-header{
				font-weight:bold;
			}
		</style>
	</head>
	<body>
		<nav class="navbar container" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      				<span class="sr-only">Toggle navigation</span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><?php echo TODO_SYSTEM_NAME_SHORT; ?></a>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Tasks</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="settings.php">Settings</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
    				<div class="form-group">
    					<input type="search" class="form-control" placeholder="Search">
    					<button type="submit" class="btn btn-link"><span class="glyphicon glyphicon-search"></span></button>
    				</div>
    			</form>
			</div>
		</nav>
		<h1>Hello world !</h1>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
		<script type="text/javascript" src="js/respond.min.js"></script>

		<script type="text/javascript" src="js/typeahead.min.js"></script>
		<script type="text/javascript">
			$('.navbar form[role="search"] .form-group input[type="search"]').typeahead([
				{
					name: 'accounts',
					local: ['timtrueman', 'JakeHarding', 'vskarich', 'timtrueman2', 'JakeHarding2', 'vskarich2'],
					header: '<p class="tt-header">accounts</p>'
				},
				{
					name: 'names',
					local: ['timtrueman', 'JakeHarding', 'vskarich', 'timtrueman2', 'JakeHarding2', 'vskarich2'],
					header: '<p class="tt-header">names</p>'
				}
			]);
		</script>
	</body>
</html>

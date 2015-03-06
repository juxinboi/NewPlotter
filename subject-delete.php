<?php
	session_start();	
	include('db.php');
	$message = '';
	$error = '';
	if(isset($_GET['id']))
	{
		$subjNo = trim($_GET['id']);
		$plotter = find_subject($subjNo);
		if($plotter)
		{
			delete_subject($subjNo);
			$message = "Subject successfully deleted!";
			$error = 0;
		}
		else
		{
			$error = 1;
			$message = "Failed to delete.";
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Online Subject Plotter</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
 
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
<div class="intro-header">
<body id="page-top" class="index">
	<?php include('header.php'); ?>
	<div class="container">	
		<div class="plotter-admin-bg">
			<h3> Subject Lists</h3>			
				<div class="table-responsive table subject-table">
					<table class="table table-striped table-condensed table-hover">
						<thead>
							<tr>
								<th width="150">Subject</th>
								<th>EDP Code</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Days</th>
								<th>Room</th>
								<th>Units</th>
								<th width="50"> </th>
								<th width="50"> </th>
							</tr>
						</thead>
							<tr>
								<td><?php echo htmlentities($plotter['edpcode']); ?></td>
								<td><?php echo htmlentities($plotter['subject']); ?></td>
								<td><?php echo htmlentities($plotter['stime']); ?></td>
								<td><?php echo htmlentities($plotter['etime']); ?></td>
								<td><?php echo htmlentities($plotter['days']); ?></td>
								<td><?php echo htmlentities($plotter['room']); ?></td>
								<td><?php echo htmlentities($plotter['units']); ?></td>
							</tr>
					</table>
				</div>	
				
				<?php if ($error == 0): ?>
					<div class="success-delete">
						<div class="alert alert-success" role="alert">
							<?php echo $message; ?>
						</div>
					</div>
				<?php else: ?>
					<div class="success-delete">
						<div class="alert alert-danger" role="alert">
							<?php echo $message; ?>
						</div>
					</div>
				<?php endif; ?>
	</div>	
	<script>
		//go back to notes list page after 3 seconds.
		setTimeout(function(){ document.location = 'admin.php'; }, 4000);
	</script>
</body>
</html>
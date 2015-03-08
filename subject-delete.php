<?php
	session_start();	
	include('db.php');
	$message = '';
	$error = '';
	if(isset($_GET['id']))
	{
		$subjNo = trim($_GET['id']);
		$plotter = find_edpcode($subjNo);
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

    <title>OSP</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>



  <!-- Header -->
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
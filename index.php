<?php
	session_start();
	include ("db.php");
	$error = '';
	$studentuser = '';	
	
	if(isset($_POST['login']))
	{
		$studentuser = $_POST['studentuser'];
		$pass = $_POST['pass'];
		
		
		if($studentuser == 'admin' and $pass == 'admin')
		{			
			$_SESSION['islogin'] = $studentuser;
			header('location: admin.php');
			exit();
		} 
		else 
		{			
			$student = search_student($studentuser);		
		
			if($student['studentid'] == $studentuser and $pass == 'student')
			{
				$_SESSION['islogin'] = $studentuser;
				header('location: student.php');
				exit();
			}
			else 
			{
				$error = 'Invalid username or passwords!';
			}
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


    <!-- Header -->
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Online Subject Plotter </h1>
						<div class="uc-header">
							<h3>University of Cebu</h3>
							<header>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-offset-4 col-md-4">
												<div class="form-group">
													<form class="form" method="post">												
														<input type="text" class="form-control" name="studentuser" value="<?php echo htmlentities($studentuser); ?>" placeholder="Username"> <br>						
														<input type="password" class="form-control" name="pass" placeholder="Password">	<br>
														<?php if($error != ''): ?>
															<div class="alert alert-danger error" role="alert">
																<?php echo $error; ?>
															</div>
														<?php endif; ?>
															<button type="submit" class="btn btn-primary btn-lg" name="login"> Login </button>																		
													</form>
												</div>
										</div>
									</div>
								</div>
							</header>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

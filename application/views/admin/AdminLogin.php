<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/layout.php"); ?>
		<title> Admin Panel</title>
	</head>
	<body class="main-body app sidebar-mini Light-mode">
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<img src="<?= base_url(); ?>assets/img/brand/logo-white.png" class=" m-0 mb-4" alt="logo">
							<h5 class="mb-4">Buymenow Grocery</h5>
							<p class="mb-5">Buymenow Grocery is designed to be sinple, Faster and has easy steps for your favourite household items. The shopping portal has got togather various essential Products that you would need for your day to day life which allows user to purchase groceries online. Home delivery service allows you to shop without leaving the convenience of your home.</p>
							
						</div>
					</div>
				</div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Admin Login</h2>
						<?php if($feed = $this->session->flashdata("Feed")){ ?>
							<h4 class="text-danger"><?= $feed; ?></h4>
						<?php } ?>
						<form action="<?= base_url(); ?>admin_panel/AdminLogin/loginProcess?refer=<?= @$_GET['refer']; ?>" method="post">
							<div class="form-group">
								<label>Username</label><input class="form-control" placeholder="Enter your Username" type="text" name="username" required="required" value="" >
							</div>
							<div class="form-group">
								<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password" name="password" required="required" value=""  >
							</div><button class="btn btn-main-primary btn-block">Sign In</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						
						
					</div>
				</div>
			</div>
			</div>
		</div>
	</body>
</html>
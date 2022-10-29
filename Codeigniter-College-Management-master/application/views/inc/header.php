<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>College Management System</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
		</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a href="#" class="navbar-brand" style="color: #fff;">College Management System</a>

			<div class="col-lg-2 ml-auto" style="margin-top: 15px;" id="">
				<div class="btn btn-group btn-light btn-sm">
					<a href="#" class="btn btn-sm">Settings</a>
					<a href="#" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<?php
							$user_id = $this->session->userdata('user_id');
						?>
						<?php if($user_id == 1): ?>
							<li class="btn btn-lg"><?php echo anchor("admin/dashboard", 'Dashboard'); ?></li>
							<li class="btn btn-lg"><?php echo anchor("admin/moderator", 'Moderator'); ?></li>
							<li class="btn btn-lg"><?php echo anchor("welcome/logout", 'Logout'); ?></li>
						<?php else: ?>
							<li class="btn btn-lg"><?php echo anchor("welcome/logout", 'Logout'); ?></li>
						<?php endif; ?>
					</ul>
				</div>
			</div>

		</nav>

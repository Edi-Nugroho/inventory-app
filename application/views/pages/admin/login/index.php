<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory App - Login</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/')?>style2.css">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-5'); ?>/dist/css/bootstrap.min.css">
    <script src="<?= base_url('assets/bootstrap-5'); ?>/dist/js/bootstrap.bundle.min.js"></script>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: 'Poppins';
		}

		.kotak{
			width: 60%;
			height: 500px;
			margin: 90px auto;
			border-radius: 10px;
			box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.3);
			display: flex;
			border: none;
		}

		.gambar{
			flex: 1;
			/*border-right: 1px solid #E9E9E9;*/
		}

		img{
			width: 300px;
			margin: 95px 40px;
		}

		.form{
			flex: 1;
		}

		.judul{
			margin: 100px 0px 40px 85px;
		}

		.login{
			margin: 20px 50px 0px 0px;
		}

		#email, #password{
			margin-bottom: 20px;
		}



	</style>
</head>
<body>
	<div class="kotak">
		<div class="gambar">
			<img src="<?= base_url('assets/login/login.png') ?>">
		</div>
		<form action="<?= site_url('login/submit'); ?>" method="POST">
		<div class="form">
			<div class="judul">
				<h3>Login</h3>
			</div>

			<div style="margin-right: 50px;">
				<?= $this->session->flashdata('error'); ?>
				<?= $this->session->unset_userdata('error'); ?>
			</div>

			<div class="login">
				<label for="email">Email</label>
				<input type="text" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>">

				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control">

				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</form>
	</div>
</body>
</html>
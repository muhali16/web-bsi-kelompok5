<?php 
include "../admin/_config.php";
session_start();
if(isset($_SESSION['login'])){
	header("Location: " . APP_URL);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Login</title>
		<!-- Bootstrap CSS -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
			crossorigin="anonymous"
		/>
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<!-- font awesome  -->
		<link
			rel="stylesheet"
			href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
			integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
			crossorigin="anonymous"
		/>
		<style>
			* {
				font-family: "Poppins", sans-serif;
			}
		</style>
	</head>
	<body class="bg-danger">
		<main class="d-flex flex-md-row flex-column vh-100 w-100">
			<section class="position-relative has-bg-img" data-aos="fade-right" data-aos-delay="500">
				<h1
					class="text-white p-4 p-md-5 position-absolute w-100 bg-dark text-end bottom-0 end-0"
					style="--bs-bg-opacity: 0.5"
				>
					<strong>BANGKITKAN<br />SEMANGAT<br />INDONESIA.</strong>
				</h1>
				<img
					src="../admin/view/assets/bela-negara.jpeg"
					alt="Background Login"
					class="bg-img img-fluid h-100"
				/>
			</section>
			<section class="p-5 w-md-50">
				<div class="p-4 bg-white rounded-3 shadow" data-aos="fade-left" data-aos-delay="1000" data-aos-duration="1000">
					<h1 class="mb-3 text-danger"><strong>Login</strong></h1>
					<form method="POST" action="auth.php">
						<!-- Email input -->
						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example1"
								>Username</label
							>
							<input
								type="text"
								id="form2Example1"
								class="form-control"
								name="email" 
							/>
						</div>
						<!-- Password input -->
						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example2"
								>Password</label
							>
							<div class="input-group mb-3">
								<input
									name="password"
									type="password"
									value=""
									class="input form-control"
									id="password"
									required="true"
									aria-label="password"
									aria-describedby="basic-addon1"
								/>
								<div class="input-group-append">
									<span
										class="input-group-text h-100"
										onclick="password_show_hide();"
									>
										<i class="fas fa-eye" id="show_eye"></i>
										<i
											class="fas fa-eye-slash d-none"
											id="hide_eye"
										></i>
									</span>
								</div>
							</div>
						</div>
						<div class="w-100 text-end">
							<button
								type="submit"
								name="login"
								class="btn btn-danger login w-50"
							>
								Sign in
							</button>
						</div>
					</form>
				</div>
			</section>
		</main>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
			crossorigin="anonymous"
		></script>
	
		<script>
			AOS.init();
			function password_show_hide() {
				var x = document.getElementById("password");
				var show_eye = document.getElementById("show_eye");
				var hide_eye = document.getElementById("hide_eye");
				hide_eye.classList.remove("d-none");
				if (x.type === "password") {
					x.type = "text";
					show_eye.style.display = "none";
					hide_eye.style.display = "block";
				} else {
					x.type = "password";
					show_eye.style.display = "block";
					hide_eye.style.display = "none";
				}
			}
		</script>
	</body>
</html>

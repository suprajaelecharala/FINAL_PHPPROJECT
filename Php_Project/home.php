<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
	<style>
		body {
			background-color: #f2f2f2;
			font-family: 'Open Sans', sans-serif;
			font-size: 16px;
			line-height: 1.5;
			margin: 0;
			padding: 0;
		}
		header {
			background-color: #333;
			color: #fff;
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			position: sticky;
			top: 0;
			z-index: 1;
		}
		h1, h2, h3 {
			margin: 0;
			padding: 0;
		}
		h1 {
			font-size: 40px;
			margin-top: 30px;
			text-align: center;
		}
		h2 {
			font-size: 24px;
			margin: 30px 0;
		}
		nav ul {
			display: flex;
			list-style: none;
			margin: 0;
			padding: 0;
		}
		nav li {
			margin: 0 20px;
		}
		nav a {
			color: #fff;
			text-decoration: none;
			transition: color 0.3s ease;
		}
		nav a:hover {
			color: #f2f2f2;
		}
		article {
			margin: 50px auto;
			max-width: 600px;
			text-align: center;
		}
		article p {
			font-size: 18px;
			line-height: 1.5;
			margin: 20px 0;
		}
		footer {
			background-color: #333;
			color: #fff;
			padding: 10px;
			text-align: center;
			position: absolute;
			bottom: 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<header>
		<h1>Our Company</h1>
		<nav>
			<ul>
				<li><a href="Login.php">Login</a></li>
				<li><a href="registration.php">SignUp</a></li>
				<li><a href="history.php">History</a></li>
			</ul>
			
		</nav>
	</header>

	<article>
		<h2>Welcome to Our Website</h2>
		<p><ul>
            <li>Level 1 -- Ascending Letters</li>
            <li>Level 2 -- Descending Letters</li>
            <li>Level 3 -- Ascending Numbers</li>
            <li>Level 4 -- Descending Numbers</li>
            <li>Level 5 -- Max to min Letters</li>
            <li>Level 6 -- Max to min Numbers</li>
        </p>
	</article>

	<footer>
		<p>&copy; <?php echo date("Y"); ?> Our Company. All rights reserved. Presented by Supraja Elecharala, Prachi, and Jasanpreet Kaur.</p>
	</footer>
</body>
</html>

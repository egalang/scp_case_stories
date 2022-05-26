<?php
	require 'db.php';
	if(!isset($_COOKIE['gatherer'])) {
		header("Location: msauth.php");
	}
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM settings;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $mailto = $row['mailto'];
    $msg = $row['msg'];
    $email = $row['email'];
	$pwd = $row['pwd'];
	$host = $row['host'];
	$port = $row['port'];
	$sec = $row['sec'];
	$client_id = $row['client_id'];
    $tenant_id = $row['tenant_id'];
    $secret = $row['secret'];
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="/login/images/icons/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title>Save the Children Philippines - Case Stories</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="editor/css/editor.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="editor/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="editor/examples/resources/demo.css">
	<style type="text/css" class="init">
		ul {
			position: -webkit-sticky; /* Safari */
			position: sticky;
			top: 0;
		}

		ul.topnav {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #f3f3f3;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: black;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #e6e6e6;}

		ul.topnav li a.active {background-color: #cccccc;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
	</style>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="editor/js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="editor/js/editor.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/editor-demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	</script>
</head>
<body class="dt-example dt-example-bootstrap">
	<ul class="topnav">
		<li><a href="cases_list.php">Cases</a></li>
		<li><a href="programs_list.php">Programs</a></li>
		<li><a href="locations_list.php">Locations</a></li>
		<li><a href="gatherers_list.php">Users</a></li>
		<li><a href="cases_export.php">Export</a></li>
		<li><a class="active" href="settings_page.php">Settings</a></li>
		<li class="right"><a href="msauth.php?action=logout">Logout</a></li>
	</ul>
	<div class="container">
		<section>
			<h1>Settings <span>Page</span></h1>
			<div>
				<hr>
			</div>
			<form action="settings_save.php">
			<div class="row">
				<div class="col-sm-6">
					<h3>Notification</h3>
					<div class="form-group">
						<label for="mailto">Recipient:</label>
						<input type="email" class="form-control" id="mailto" placeholder="Enter email" value="<?php echo $mailto; ?>" name="mailto">
					</div>
					<div class="form-group">
						<label for="msg">Message:</label>
						<textarea class="form-control" rows="5" id="msg" placeholder="Type message" name="msg"><?php echo $msg; ?></textarea>
					</div>
					<h3>Single Sign-On</h3>
					<div class="form-group">
						<label for="tenant_id">Tenant ID:</label>
						<input type="text" class="form-control" id="tenant_id" value="<?php echo $tenant_id; ?>" name="tenant_id">
					</div>
					<div class="form-group">
						<label for="client_id">Client ID:</label>
						<input type="text" class="form-control" id="client_id" value="<?php echo $client_id; ?>" name="client_id">
					</div>
					<div class="form-group">
						<label for="secret">Client ID:</label>
						<input type="password" class="form-control" id="secret" value="<?php echo $secret; ?>" name="secret">
					</div>
				</div>
				<div class="col-sm-6">
					<h3>Mail Relay</h3>
					<div class="form-group">
						<label for="email">Account:</label>
						<input type="email" class="form-control" id="email" value="<?php echo $email; ?>" name="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" value="<?php echo $pwd; ?>" name="pwd">
					</div>
					<div class="form-group">
						<label for="host">Host:</label>
						<input type="text" class="form-control" id="host" value="<?php echo $host; ?>" name="host">
					</div>
					<div class="form-group">
						<label for="port">Port:</label>
						<input type="text" class="form-control" id="port" value="<?php echo $port; ?>" name="port">
					</div>
					<div class="form-group">
						<label for="sec">Security:</label>
						<input type="text" class="form-control" id="sec" value="<?php echo $sec; ?>" name="sec">
					</div>
					<!-- 
					<table class="table">
						<tr>
							<td>Account</td><td><input type="text" value="<?php echo $email; ?>" name="email" /></td>
						</tr>
						<tr>
							<td>Password</td><td><input type="password" value="<?php echo $pwd; ?>" name="pwd" /></td>
						</tr>
						<tr>
							<td>Relay Host</td><td><input type="text" value="<?php echo $host; ?>" name="host" /></td>
						</tr>
						<tr>
							<td>Relay Port</td><td><input type="text" value="<?php echo $port; ?>" name="port" /></td>
						</tr>
						<tr>
							<td>Encryption</td><td><input type="text" value="<?php echo $sec; ?>" name="sec" /></td>
						</tr>
					</table> 
					-->
				</div>
			</div>
			<br><input class="btn btn-default" type="submit" value="Save" />
			</form>
			<div>
				<hr>
			</div>
        </section>
        <section>
            <h1>Settings <span>Page</span></h1>
        </section>
    </div>
</body>
</html>
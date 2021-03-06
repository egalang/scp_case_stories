<?php
	require 'db.php';
    if(!isset($_COOKIE['gatherer'])) {
		header("Location: msauth.php");
	}
	if( isset($_GET['id']) ){
		$id = $_GET['id'];
    }
    //fetch data
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM cases
            LEFT JOIN programs ON programs.id = cases.project_information_id
            LEFT JOIN locations ON locations.id = programs.location WHERE cases.id = $id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $lastname = $row['lastname'];
    $age = $row['age'];
    $gender = $row['gender'];
    $summary = $row['summary'];
    $story = $row['story'];
    $additional_interview = $row['additional_interview'];
    $gatherer = $row['gatherer'];
    $interview_date = $row['interview_date'];
    $location = $row['barangay'].', '.$row['municipality'].', '.$row['province'];
    $background = $row['background'];
    // fetch data end
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Save the Children Philippines - Case Stories</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/ico" href="/login/images/icons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
</head>
<body>
    <!-- <ul class="topnav">
		<li><a class="active" href="cases_list.php">Cases</a></li>
		<li><a href="programs_list.php">Programs</a></li>
		<li><a href="locations_list.php">Locations</a></li>
		<li><a href="gatherers_list.php">Users</a></li>
		<li><a href="cases_export.php">Export</a></li>
		<li><a href="settings_page.php">Settings</a></li>
		<li class="right"><a href="logout.php">Logout</a></li>
	</ul> -->
    <div class="container p-5 my-5">        
        <a href="cases_list_m.php" class="btn btn-secondary" role="button">Return to List</a>
        <hr>
        <div class="row">
            <div class="col">
                <img src="https://www.savethechildren.org/etc/clientlibs/us/clientlib-site/images/icons/stc-logo.svg" class="img-fluid" alt="Save the Children" width="50%">
            </div>
            <div class="col">
                <h1 style="text-align:right">Case Story</h1>
            </div>
        </div>
        <hr> 
        <h2><?php echo $firstname.' '.$middlename.' '.$lastname.', '.$age; ?> years old</h2>
        <p style="color:red">When using this case story, DO NOT change any of the details. If you???re unsure about anything to do with its use, please contact the Publications & Editorial team in communications. Please also send a copy of each use of a case study to Lean.Pasion@savethechildren.org</p>
        <table class="table table-bordered">
            <tr><th>Child/Adult</th><td><?php echo $firstname.' '.$middlename.' '.$lastname.', '.$age; ?> years old (<?php echo $gender; ?>)</td></tr>
            <tr><th>Themes</th><td>[To be added by picture editor]</td></tr>
        </table>
        <h3>Photo References</h3>
        <?php
            $sql = "SELECT * FROM `users_files`
                    LEFT JOIN files ON files.id = users_files.file_id
                    WHERE users_files.user_id = $id;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<img src='".$row['web_path']."' class='img-thumbnail' width='150'>";
                }
            }
            $conn->close();
        ?>
        <h3>Summary</h3>
        <p><?php echo $summary; ?></p>
        <?php
            if( $gender == 'Male' ){
                $pronoun = 'His story in his own words';
            } else {
                $pronoun = 'Her story in her own words';
            }
        ?>
        <h3><?php echo $pronoun; ?></h3>
        <p><?php echo $story; ?></p>
        <h3>Additional interview with child???s parent/teacher/etc.</h3>
        <p><?php echo $additional_interview; ?></p>
        <h5>Interview conducted by <?php echo $gatherer; ?>, during an assignment to <?php echo $location; ?> on <?php echo $interview_date; ?>.</h4>
        <hr>
        <h3>Project information and major issues:</h3>
        <p><?php echo $background; ?></p>
        <h5>Figures are correct to the date of edit. For more information about Save the Children???s work in the Philippines, visit their <a href=https://www.savethechildren.org.ph/.>website</a>.</h4>
    </div>
</body>
</html>

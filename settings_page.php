<?php
	require 'db.php';
	if(!isset($_COOKIE['gatherer'])) {
		header("Location: msauth.php");
	}
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM settings;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="editor/css/editor.dataTables.min.css">
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
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script type="text/javascript" language="javascript" src="editor/js/dataTables.editor.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/editor-demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	editor = new $.fn.dataTable.Editor( {
		ajax: "cases.php",
		table: "#example",
		fields: [ {
				label: "First name:",
				name: "cases.firstname"
			}, {
				label: "Middle name:",
				name: "cases.middlename"
			}, {
				label: "Last Name:",
				name: "cases.lastname"
			}, {
				label: "Age:",
				name: "cases.age"
			}, {
				label: "Gender:",
				name: "cases.gender",
				type: "select",
				options: [
					{ label: "Male", value: "Male" },
					{ label: "Female", value: "Female" }
				]
			}, {
				label: "Program:",
				name: "cases.project_information_id",
                type: "select"
			}, {
				type: "datetime",
				label: "Interview Date:",
				name: "cases.interview_date"
			}, {
				type: "textarea",
				label: "Summary:",
				name: "cases.summary"
			}, {
				type: "textarea",
				label: "Story:",
				name: "cases.story"
			}, {
				type: "textarea",
				label: "Additional Interview:",
				name: "cases.additional_interview"
			}, {
				type: "hidden",
				name: "cases.gatherer_id",
				default: "1"
			}, {
				type: "hidden",
				name: "cases.country_id",
				default: "1"
			}, {
				type: "hidden",
				name: "cases.website_id",
				default: "1"
			}, {
				label: "Attachments:",
				name: "files[].id",
				type: "uploadMany",
				display: function ( fileId, counter ) {
					return '<img src="'+editor.file( 'files', fileId ).web_path+'"/>';
				},
				noFileText: 'No Attachments'
			}
		]
	} );

	$('#example').DataTable( {
		dom: "Bfrtip",
		ajax: "cases.php",
		columns: [
			{ data: null, render: function ( data, type, row ) {
				// Combine the first and last names into a single table field
				return '<a href="cases_page.php?id='+data.cases.id+'">'+data.cases.id+'</a>';
			} },
			{ data: null, render: function ( data, type, row ) {
				// Combine the first and last names into a single table field
				return data.cases.firstname+' '+data.cases.middlename+' '+data.cases.lastname;
			} },
			{ data: "cases.age" },
			{ data: "cases.gender" },
			{ data: "programs.title" },
			{ data: "cases.interview_date" },
			{ data: null, render: function ( data, type, row ) {
				// Combine the first and last names into a single table field
				return data.locations.barangay+', '+data.locations.municipality+', '+data.locations.province;
			} },
			{
				data: "files",
				render: function ( d ) {
					return d.length ?
						d.length+' attachment(s)' :
						'No Attachments';
				},
				title: "Attachments"
			}
		],
		colReorder: true,
		responsive: true,
		select: true,
		buttons: [
			//{ extend: "create", editor: editor },
			//{ extend: "edit",   editor: editor },
			//{ extend: "remove", editor: editor },
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
		]
	} );
} );



	</script>
</head>
<body class="dt-example php">
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
            <div>
				<h3>Notification</h3>
				<table class="table">
					<tr>
						<td>Email</td><td><input type="text" value="administrator@savethechildren.net.ph" /></td>
					</tr>
					<tr>
						<td>Message</td><td><input type="textarea" value="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." /></td>
					</tr>
				</table>
				<h3>Mail Relay</h3>
				<table class="table">
					<tr>
						<td>Relay Host</td><td><input type="text" value="mail.obbsco.com" /></td>
					</tr>
					<tr>
						<td>Relay Port</td><td><input type="text" value="587" /></td>
					</tr>
					<tr>
						<td>Encryption</td><td><input type="text" value="TLS" /></td>
					</tr>
				</table>
                <h3>Single Sign-On</h3>
				<form action="settings_save.php">
				<table class="table">
					<tr>
						<td>Tenant ID</td><td><input type="text" value="<?php echo $tenant_id; ?>" name="tenant_id" /></td>
					</tr>
					<tr>
						<td>Client ID</td><td><input type="text" value="<?php echo $client_id; ?>" name="client_id" /></td>
					</tr>
					<tr>
						<td>Secret</td><td><input type="password" value="<?php echo $secret; ?>" name="secret" /></td>
					</tr>
				</table>
				<br><input type="submit" value="Save" />
				</form>
            </div>
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
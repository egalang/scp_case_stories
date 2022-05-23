<?php
	if(!isset($_COOKIE['gatherer'])) {
		header("Location: msauth.php");
	}
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
	<script type="text/javascript" language="javascript" src="editor/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/demo.js"></script>
	<script type="text/javascript" language="javascript" src="editor/examples/resources/editor-demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
	


var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
	editor = new $.fn.dataTable.Editor( {
		ajax: "programs.php",
		table: "#example",
		fields: [ {
				label: "Title:",
				name: "programs.title"
			}, {
				label: "Location:",
				name: "programs.location",
                type: "select"
			}, {
				label: "Background:",
				name: "programs.background",
				type: "textarea"
			}
		]
	} );

	$('#example').DataTable( {
		dom: "Bfrtip",
		ajax: "programs.php",
		columns: [
			{ data: "programs.title" },
			//{ data: "locations.barangay" },
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.locations.barangay+', '+data.locations.municipality+', '+data.locations.province;
            } },
			{ data: "programs.background" }
		],
		colReorder: true,
		responsive: true,
		select: true,
		buttons: [
			{ extend: "create", editor: editor },
			{ extend: "edit",   editor: editor },
			{ extend: "remove", editor: editor }
		]
	} );
} );



	</script>
</head>
<body class="dt-example php">
	<ul class="topnav">
		<li><a href="cases_list.php">Cases</a></li>
		<li><a class="active" href="programs_list.php">Programs</a></li>
		<li><a href="locations_list.php">Locations</a></li>
		<li><a href="gatherers_list.php">Users</a></li>
		<li><a href="cases_export.php">Export</a></li>
		<li><a href="settings_page.php">Settings</a></li>
		<li class="right"><a href="msauth.php?action=logout">Logout</a></li>
	</ul>
	<div class="container">
		<section>
			<h1>Programs <span>List</span></h1>
			<div>
				<hr>
			</div>
			<div class="demo-html">
				<table id="example" class="display responsive nowrap" style="width:100%">
					<thead>
						<tr>
							<th>Title</th>
							<th>Location</th>
							<th>Background</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
                            <th>Title</th>
							<th>Location</th>
							<th>Background</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<div>
				<hr>
			</div>
        </section>
        <section>
            <h1>Programs <span>List</span></h1>
        </section>
    </div>
</body>
</html>
<?php
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment;filename=Contacts.csv');

	// Setup the following using your own MySQL login information.
	$db_hostname = "hostname";
	$db_database = "database";
	$db_username = "username";
	$db_password = "password";

	$db_server = mysql_connect($db_hostname, $db_username, $db_password);

	if (!$db_server)
	{
		die("Unable to connect to MySQL: ".mysql_error());
	}

	mysql_select_db($db_database)
		or die("Unable to select database: ".mysql_error());

	$csv_file = fopen("Contacts.csv", "w");

	$result = mysql_query("SELECT * FROM contact_table ORDER BY lname");
	if (!$result) die("Database access failed: ".mysql_error());
	$rows = mysql_num_rows($result);

	// Header for Outlook Field Mapping
	fwrite($csv_file, "\"Last Name\",\"First Name\",\"Primary Phone\",\"E-mail Address\"".PHP_EOL);

	for ($j = 0; $j < $rows; $j++)
	{
		$lname = mysql_result($result, $j, 'lname');
		$fname = mysql_result($result, $j, 'fname');
		$phone = mysql_result($result, $j, 'phone');
		$email = mysql_result($result, $j, 'email');

		// Individual Contacts
		fwrite($csv_file, "\"".$lname."\",\"".$fname."\",\"".$phone."\",\"".$email."\"".PHP_EOL);
	}

	mysql_close($db_server);
	fclose($csv_file);
	readfile("Contacts.csv");
?>
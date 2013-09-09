<?php
    function SFD13_connect_db()
	{
		mysql_connect(SFD13_DB_SERVER, SFD13_DB_USER, SFD13_DB_PASSWORD) or die("Error connecting to db" . mysql_error());
		mysql_select_db(SFD13_DB_NAME) or die("Database not found" . mysql_error());
	}
?>
<?php

   function SFD13_CONNECT_DB() // Connect to Database
	{
		mysql_connect(SFD13_DB_SERVER, SFD13_DB_USER, SFD13_DB_PASSWORD) or die("Error connecting to db" . mysql_error());
		mysql_select_db(SFD13_DB_NAME) or die("Database not found" . mysql_error());
	}

	
	function sfd13_make_url($url, $text, $extra_text='') // To Create Custom Internal URL 
	{
		$link = '<a href="';
		$link .= SFD13_FOLDER.$url.'" '.$extra_text.' ';
		$link .= '>'.$text.'</a>';
		
		echo $link;
	}
	
    function get_questions() // To Display Question For Form
	{
	    SFD13_CONNECT_DB();
	    $questions = "SELECT * FROM question";
	    $questions_query = mysql_query($questions);
	
	    while($questions_fetch = mysql_fetch_array($questions_query, MYSQL_ASSOC))
        {
			$val = 0;
		    $id = $questions_fetch["id"];
		    echo($questions_fetch["id"] . ") ". $questions_fetch["question"]);
			echo "<br />";
         if($questions_fetch["answer_type"] == 0) 
         {
         	echo '&nbsp &nbsp &nbsp<input type = "textarea" name = "'.$id.'">';
            echo "<br /><br />";
         }
         else
         { 
  			   $options = "SELECT * FROM options where `question_id` = $id";
			   $options_query = mysql_query($options);
						
			   while($options_fetch = mysql_fetch_array($options_query, MYSQL_ASSOC))
			   {
				   $option = $options_fetch["options"];
			      if($questions_fetch["answer_type"] == 1 ) $type = "radio";
				   else  $type = "checkbox";
				   echo '&nbsp &nbsp &nbsp<input type = "'.$type.'" name = "'.$id.'" value = "'.$val.'">'.$option;
				   echo '<input type = "hidden" name = "id_number" value = "'.$id.'">';
				   $val++;
               echo "<br />";
			   }   
		      echo "<br /><br />";
	      }
		}
	}


		
	function add_answers($id, $answer)
	{
		$user_no = get_last_user_count();
	   SFD13_CONNECT_DB();
		$ent = "INSERT INTO answer (user_no,question_id,answer) values('$user_no','$id','$answer');";
		$sql = mysql_query("$ent") or die("Couldn't Enter Data to MySql : ".mysql_error());
	}
	
	function add_visitor_info()
	{
		$_SERVER['HTTP_USER_AGENT'];
       $browser = get_browser();
       $time =  456;
       $ip = $_SERVER["REMOTE_ADDR"];
	   $b = $browser["parent"];
	   $os = $browser["platform"];
       $sql = "INSERT INTO visitor_info (browser, os, ip, timestamp) values('$b','$os','$ip','$time')";
	   $query = mysql_query("$sql") or die("Couldn't Enter Data to MySql : ".mysql_error());
	} 
	
	function show_results()
	{
	    SFD13_CONNECT_DB();
	    $questions = "SELECT * FROM question";
	    $questions_query = mysql_query($questions);
	
	    while($questions_fetch = mysql_fetch_array($questions_query, MYSQL_ASSOC))
        {
			$amount = 0;
			$val = 0;
		    $id = $questions_fetch["id"];
			echo($questions_fetch["id"] . ") ". $questions_fetch["question"]);
			echo "<br />";

			$options = "SELECT * FROM options where `question_id` = $id";
			$options_query = mysql_query($options);
				
			while($options_fetch = mysql_fetch_array($options_query, MYSQL_ASSOC)) 
			{
				$option = $options_fetch["options"];
				$amount = 0;
				$answers = "SELECT * FROM answer where `question_id` = $id";
				$answers_query = mysql_query($answers);
				while($answers_fetch = mysql_fetch_array($answers_query, MYSQL_ASSOC)) 
				{
					$number = $answers_fetch["answer"];
					if ($number == $val) $amount++;
				}
				$val++;
				echo $option.': '.$amount.'<br />';
			}
			echo '<br />';
		}
	}
	
	function show_question($question_id)
	{
	    SFD13_CONNECT_DB();
	    $questions = "SELECT * FROM question where `id` = $question_id";
	    $questions_query = mysql_query($questions);
		$questions_fetch = mysql_fetch_array($questions_query, MYSQL_ASSOC);
		echo($questions_fetch["id"] . ") ". $questions_fetch["question"]);
	}
	
function show_options($question_id)
	{
	    SFD13_CONNECT_DB();
	    $options = "SELECT * FROM options where `question_id` = $question_id";
	    $options_query = mysql_query($options);
		$val = 0;
		$comma = 0;
		while($options_fetch = mysql_fetch_array($options_query, MYSQL_ASSOC))
		{
			if ($comma == 0) {}
			else echo ',';
			$comma++;
			$option = $options_fetch["options"];
			$amount = 0;
			$answers = "SELECT * FROM answer where `question_id` = $question_id";
			$answers_query = mysql_query($answers);
			while($answers_fetch = mysql_fetch_array($answers_query, MYSQL_ASSOC)) 
			{
				$number = $answers_fetch["answer"];
				if ($number == $val) $amount++;
			}
			$val++;
			echo '{ 	name: "'.$option.'", data:['.$amount.']	}';
						
		}
	}
	
	function inc_count($count)
	{
		$count++; 
		return $count;	
	}
	
	function get_last()
	{
		SFD13_CONNECT_DB();
	    $questions = "SELECT * FROM question";
	    $questions_query = mysql_query($questions);
		$count = 0;
	
	    while($questions_fetch = mysql_fetch_array($questions_query, MYSQL_ASSOC))
        {
			$count++;
		}
		return $count;
	}
	
	function get_last_user_count()
	{
		SFD13_CONNECT_DB();
	    $user_no = "SELECT user_no FROM answer";
	    $user_no_query = mysql_query($user_no);
		$count = 0;
	
	    while($user_no_fetch = mysql_fetch_array($user_no_query, MYSQL_ASSOC))
        {
			$count++;
		}
		return $count;
	}
?>



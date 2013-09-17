<?php
    require_once('include/definations.php');
	require_once('include/function.php');
	
   $last = get_last();    
   $wrong_input = 0;
   for($i = 1;$i <= $last; $i++ )
   {
   	
      if(!isset($_POST[$i])) 
         {
           $wrong_input++;
           } 
   }  	
   //echo $wrong_input;
	if($wrong_input != 0) 
	{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Survey</title>
<link rel="shortcut icon" href="images/sfd.ico" >
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class = "wish">HAPPY SOFTWARE FREEDOM DAY!!!</div>
    <div class = "not_filled"> Please answer all the questions</div>
    <div class = "question_box">
            <div class = "questions">
            <h1> SURVEY</h1>
            <br />Please fill the following questionnaire according to your knowledge. Default answers for empty fields will be chosen automatically.<br /><br /><br />
                <form action = "submit.php" method = "post">
                    <?php 
                    
SFD13_CONNECT_DB();
	    $questions = "SELECT * FROM question";
	    $questions_query = mysql_query($questions);
	
	    while($questions_fetch = mysql_fetch_array($questions_query, MYSQL_ASSOC))
        {
			$val = 0;
		    $id = $questions_fetch["id"];
			if(!isset($_POST[$id])) echo ($questions_fetch["id"] . ") ". $questions_fetch["question"]) ."<a class = 'asterisk'>***</a>";	
    		 else	echo($questions_fetch["id"] . ") ". $questions_fetch["question"]);
			echo "<br />";
         if($questions_fetch["answer_type"] == 0) 
         {
         	if(isset($_POST[$id])) { echo '&nbsp &nbsp &nbsp<input type = text name = "'.$id.'" placeholder = "'.$_POST[$id].'" svalue = "'.$_POST[$id].'">';}
         	else {echo '&nbsp &nbsp &nbsp<input type = "textarea" name = "'.$id.'">';}
            echo "<br /><br />";
         }
         else{
			$options = "SELECT * FROM options where `question_id` = $id";
			$options_query = mysql_query($options);
						
			while($options_fetch = mysql_fetch_array($options_query, MYSQL_ASSOC))
			{
				$option = $options_fetch["options"];
				if($questions_fetch["answer_type"] == 1 ) $type = "radio";
				else $type = "checkbox";
				if(isset($_POST[$id])) {
               if($_POST[$id] == $val) { echo '&nbsp &nbsp &nbsp<input type = "'.$type.'" name = "'.$id.'" value = "'.$val.'" checked>'.$option;} 					
					else echo '&nbsp &nbsp &nbsp<input type = "'.$type.'" name = "'.$id.'" value = "'.$val.'">'.$option;
					
					}


				else echo '&nbsp &nbsp &nbsp<input type = "'.$type.'" name = "'.$id.'" value = "'.$val.'">'.$option;
				echo '<input type = "hidden" name = "id_number" value = "'.$id.'">';
				$val++;
                echo "<br />";
			}
		    echo "<br /><br />";
		  }
		}                    
                     ?>
                    <br/>
                    <input class = "button_submit" type="submit" value = "Submit" />
                </form>
        </div>
    </div>
</body>
</html>   

<?php 
 }
 else 
   {
   		$last_id = $_POST["id_number"];
	      $id = 1;
	      add_visitor_info();
	      while ($id <= $last_id)
	      {
		      if(!isset($_POST[$id])) $answer = 0;
		      else 
		      {
			      $answer = $_POST[$id];
		      }
		
		      add_answers($id,$answer);
		      $id++;
	      }
	      //add_visitor_info();
      ?>

      <!DOCTYPE HTML>
      <html>
      <head>
      <meta charset="utf-8">
      <title>Survey Submitted</title>
      <link rel="shortcut icon" href="images/sfd.ico" >
      <link href="style/style.css" rel="stylesheet" type="text/css">
      </head>

      <body>
	      <div class = "wish">HAPPY SOFTWARE FREEDOM DAY!!!</div>
          <div class = "smiley"></div>
          <!--<div class = "thank_you">Thank You!!!</div>-->
               </body>
      </html>  
      <?php } ?> 

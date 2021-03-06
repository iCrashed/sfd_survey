<?php
    require_once('include/definations.php');
	require_once('include/function.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Results</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			<?php 
				if(!isset($_POST["next_question"])) $count = 1; 
				else $count = $_POST["next_question"]; 
				$ans_type = type($count);
				if  ($ans_type == 0)
				{
			?>
					var question = '<?php show_question($count);?>';
					$('#container').html(question);
					var ans = '<?php show_text($count);?>';
					var ans_field = document.createElement("div");
					ans_field.innerHTML = ans;
					document.getElementById("container").appendChild(ans_field);
					
			<?php } else {?>
				$('#container').highcharts({
					chart: {
						type: 'column'
					},
					title: {
						text: '<?php show_question($count);?>'
					},
					xAxis: {
						categories: [
							'Answers'
						]
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Number of People'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
							'<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [
						<?php show_options($count);?>
					]
				});
			<?php }?>
		});
    </script>
    <script src="js/highcharts.js"></script>
    <script src="js/exporting.js"></script>
    
    <link rel="shortcut icon" href="images/sfd.ico" >
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class = "wish">HAPPY SOFTWARE FREEDOM DAY!!!</div>
    <div class = "thank_you">Survey Results</div>
	<div class = "results">
    </div>
	<div id="container" style=" min-width: 310px; height: 400px; margin: 0 auto"></div><div id = "answer"></div>
    <div class = "for_button">
    <form method="post" action="result.php">
    	<input type="hidden" name="next_question" value="<?php $count = inc_count($count); echo $count;?>">
        <?php
			$last_id = get_last();
			if ($last_id >= $count)	echo'<input class = "next_button" type="submit" value="Next Question">';
		?>
    </form>
    </div>
    </body>
</html>

sfd_survey
==========

Survey Page for Software Freedoom Day celebration event of FOSS Nepal 


SFD Survey is a PHP based e-survey. The result is displayed in bar graph. Graph library is from http://www.highcharts.com/

-----------------------------------------------------------------------------------------------------------

Database Server Modification

Database Server Info are declared in include/definations.php

-----------------------------------------------------------------------------------------------------------

Add Question

Add the question in question table of database and question type 
    
    Question Type  0 ==> Text
                   1 ==> Radio Button
                   2 ==> Checkbox
                   
Then Add options in option table

-------------------------------------------------------------------------------------------------------------

The answer in text are not displayed in the graph. Keywords can be used to identify the anwer using regex and displaying it respectivly 

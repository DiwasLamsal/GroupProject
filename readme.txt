*******************************************************************

*Please read this file as a walkthrough to use the system

GROUP B - CSY2027 GROUP PROJECT ASSIGNMENT

* Database name: groupb
*******************************************************************

Please Upload the SQL file groupb.sql before you proceed. The database name is groupb. 


*******************************************
*IMPORTANT*

Please add the folder GroupProject to the root server directory because Absolute path has been used
The files such as CSS, images, or javascript required absolute pathing due to the htaccess structure 
and the MVC module

The folder structure shall be:

	htdocs/GroupProject/
	
such that GroupProject is the first directory in the url - localhost/GroupProject

Please do not change the root folder name or restructure the directories

*******************************************

Information about Database Connection code:

The database connection code can be found inside the pdoconnect folder inside the app folder.

/GroupProject/App/pdoconnect/pdoconnect.php

The current values are:

$server = 'localhost';
$username = 'root';
$password = '';
$schema = 'groupb';

If you have different information for your MySQL, please find the file pdoconnect.php and edit it



*******************************************

LOGIN INFORMATION:

----------------------
Administrator: Diwas Lamsal
ID: 10000000
password: asdasdasd
----------------------
----------------------
Module Leader:
ID: 10000004
password: asdasdasd
----------------------
----------------------
Module Leader: 
ID: 10000003
password: asdasdasd
----------------------
----------------------
Student: Ayush Raj Moktan
ID: 10000012
password: asdasdasd
----------------------
----------------------
Student: Binayak Dhakal
ID: 10000013
password: asdasdasd
----------------------

*******************************************

Resources information:

All the dummy data that can be uploaded to the system is placed inside the uploadData folder inside the resources folder 
inside the public folder. 

/GroupProject/Public/resources/uploadData

The admissionData folder contains student UCAS admission csv file.
The assignmentSubmission folder contains dummy student assignment submissions files.
The assignmentUpload folder contains dummy assignments for different modules.
The attendanceData folder contains attendance csv files for two students in Level 6.
The resourceUpload folder contains dummy resources for different modules.

You can use these files to test the differnt aspects of the system.

*******************************************

Please view Binayak Dhakal and Ayush Raj Moktan as examples
as the assignment, attendance, and other related data have 
already been entered for them.

The login details above are for users with data already
added for displaying the usage of system.


*******************************************

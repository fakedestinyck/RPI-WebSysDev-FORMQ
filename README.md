# RPI-WebSysDev-FORMQ
Group Project for ITWS 4500

FORM Q is generally targeted at RPI students. At Rensselaer, many students have a difficult time finding roommates. There are resources targeted at helping students find roommates; for example, RPI’s SLL has a survey meant to match students with individual matches with similar characteristics. This may be a good start but it is flawed, with limited questions and options. There are two more important issues with the “solution” made by SLL that the team will fix. The first is that this website does not offer group matching, and the second is that this website is only an option for students looking to live on campus. As such, a large portion of upperclassmen students cannot use the website. Since the team is including features for students who live off campus and students searching for a group, the number of potential users increases greatly.

Our website looks to solve these issues by fixing issues present in SLL’s solution and implementing new ideas.  Find Our Roommate Questionnaire, or FORM Q, can be used by all Rensselaer students through the utilization of Rensselaer’s Central Authentication Service (CAS).   FORM Q does not discriminate to students who desire to live on campus and is more group friendly, allowing for groups up to 9 people long.  It will remain nonrestrictive as the creators of the product were meant to be its administrators.
Questions on the website are more creative as they are made by students for students.  In addition, a notes section on the questionnaire allows students to enter customized responses in the case that questions on the website do not fulfill all desires of the student.  The note section is meant to function similarly to descriptions placed in advertisements.
 
The website’s type of users include those looking to “advertise” for a roommate through the creation of a profile and those looking to search through profiles for roommates. Users can belong to both groups, meaning they can “advertise” for a roommate and search through other profiles. For users looking to “advertise” for a roommate, they will fill out a profile with contact information and preferences. Groups are allowed through the utilization of a group dashboard that allows users to join or remove students from their group.

Users looking to search for matches have matches displayed utilizing an algorithm that matches students based off of preferences.  Group preferences are created using the average value between individual group members.  Users can also select what preference(s) that they would not like to be taken into account when matches are found.


# Technology Choices 

# Technical Documents
These are small descriptions about all the main pages involved in the website. For more information on each of the pages, please refer to the files themselves as they have more documentation through descriptions and multi-line comments. 
### CAS-1.3.5
These are all the file that are needed in order to make CAS authentication work. The other files in the website use these in order to actually ensure CAS authentication is used. The project team did not make many edits if at all - they were just added. 
### API 
This was part of the "API" we wrote for the project (it's more like a library). It is mainly a bunch of helper functions written in order to make the rest of the website easier to develop and use. 
#### Library_Mongo.php 
This file helps describe the functions needed to navigate through a MongoDB instance. Includes a constructor for the instance, with all the functions needed. Read through it for a full list of functions.

#### checkLogin.php
This file is used to check to see if a user is logged into a page or not. It uses the CAS API to see if a user is logged in, and will take them to login.php if they are not. 

#### connect.php 
This connects the user to the database, allowing for changes to the database to be made. 

#### email.class.php 
A file containing a class that helps with sending email. It creates a class and defines several methods to write what is going on to an user.

#### getallusers.php 
A PHP page that just returns all the users in an array to the developer. Used in AJAX calls. 

#### leaveorspam.php 
This file uses the email class in order to send an email to a user who has been added to a group in order to let the user know they've been added, and possiblyt report the uesr if the adder is adding the user without their consent. 

#### login.php
This is just the path to login to the CAS system.

#### logout.php 
This is just the path to logout of the CAS system.

#### readdata.php 
This page reads data from columns on a page. 

#### sendmail.php 
This page, when called, allows an email to be sent to a user. 

#### storedata.php 
This is a page that, when called, allows for a user to sign up if their information is entered correctly. 

#### storeretrievedata.php
This file grabs information and stores a new user in the database. If a user is found, then it will return the information that is already stored. 

### database 
These are all the files related to the database. These are run in order to ensure one has the right version of php needed to develop the website, and populates the data. Please make sure to have MongoDB installed beforehand. 

#### MongoDB.php
This file is especially important - it inserts the document the Database is going to hold and inserts it into the mongoDB instance. 

#### phpinfo.php 
Just a simple page to make sure you have a version of PHP compatible with development for the website. 

### error 
These are the files in case the website needs to return error codes. 

#### 403.php 
Returns an error message if the user is blocked. 

#### 405.php 
Returns an error message if the user does not have the permissions to read the file.

#### 500.php 
Returns an error message if something unexpected happens. 

### resources 
These are just different pictures used by the aboutus page and the pictures used for various pages in website, like the User Dashboard and the About Us. 

### MongoDB.php 
This file adds test data to the database in order to allow for testing.

### aboutus.php 
This file contains information about the development team, with information on how to contact us.

### admin_dashboard.php 
This file describes the Admin Dashboard, which is only accessible to administrators. It is the dashboard that allows the admins to blacklist users who are using the website incorrectly, or have been reported. 

### auth.php 
This file is a simple php file to take a user to the login page if they have to. 

### cacert.pem 
This file describes the sercurity certificates for authentication. 

### disclaimer.php 
This file contains the page that is displayed to users about information on our disclaimer. It is one of the ways the site communicates with users. 

### footer.php
This is the footer that a lot of pages have, it describes a footer which can be just included in other files. Any styling in the footer is just directly in the tags.

### header.css 
This file contains the CSS for navbar.php, which is the header of any page seen on the website. 

### index.php 
This is the landing page of the website. It allows for communication with the user and describes what the website is about. It also contains a button that will take users to the questionnaire page if it is their first time using the site. Before that though, they have to log in. 

### match.php 
This page is where the user is taken after selecting criteria to search by in search.php and is taken to their results. The user can click on the results and view their matches. The page takes in group IDs of groups that best matched with the group. 

### navbar.php
This file is included in almost every page - it is the header that is seen that allows users to be taken to various parts of the website. If the user is an admin, which this file checks for, the ability to go to the admin dashboard is provided as well. Developers can include this file on any file they are working on which requires a header. 

### profile.php 
This file displays the user profile entered in. A javascript file of the same name is used by it in order to actually get the information via an AJAX call. 

### questionaire.php
This is a large file, and one of the core parts of the application. It allows for users to fill out questions in order to create their profiles. Originally, there was a difference between group information and individual information, but the team decided the group informattion was not needed. Both methods of entry will still work for users though. It controls how it is with a lot of hide/show functionality, and answers are submitted via an AJAX call using a javascript file of the same name. 

### search.php
This file allows for users to check what is not important to them, and then use the algorithm written in a javascript file of the same name to search for potential users. The algorithm takes in what the user does not care about, and matches groups and individuals together based on Euclidean distance between the groups. For more information, please refer to the commented code in the file.

### user_dashboard.php
This is a large file that went through a lot of changes. It displays the information of a user and what groups they are apart of, who is in their group, allows for the removal and addition of members, and has a navbar for navigation. It interracts with a javascript file of the same name with several functions in order to work properly.

# How to Install 

### mongoDB

Make sure you have mongoDB installed, if not install it here: https://docs.mongodb.com/.
For the project to work on Windows you need an older version of PHP (5.6), and follow the instructions in the readme.md in the database folder.

### Possible CAS Issues 

If the CAS system doesn't work, change the checkLogin.php file in the api folder to the following:
<?PHP 
        defined('check') or die('No direct script access allowed.');
        session_start();
        $_SESSION["name"] = ''; //Your name
        $_SESSION["rin"] = ''; //Your RIN
        $_SESSION["email"] = ''; //Your email
        $_SESSION["role"] = 1; //Role 1:Admin, 2:Normal, 3:Banned
        $_SESSION["rcsid"] = ''; //Your RCSID
        $_SESSION["token"] = 'empty';
        $encrypt = 'empty';
        $user_name = $_SESSION["name"];
        $user_rin = $_SESSION["rin"];
        $user_email = $_SESSION["email"];
        $user_role = $_SESSION["role"]; 
?>

# Navigation 
The website is fairly simple to navigate. Users can visit the landing page of the site and go to the About Us or Disclaimer. They can also log in with the CAS system. If it is their first time loggin in, they will be taken to the questionaire.php page in order to fill out informaiton about themselves. After they complete the questionnaire, they are taken to their profile, and have the option to change their information if need be. From there, the user can choose to find roommates, or be taken to their dashboard. On the search page, the user can use the matching functionality, click what is important to them in search.php, and then be taken to match.php which allows them to see their matches. The user can also go to their dashboard in order to add or remove users from their group. Users can logout when they would like as well. Unfortunetly, the team currently does not have a way to re-direct the logout page back to the main site, but this is something the team will pursue in the future. 

If a user is an admin, they can also go to the admin dashboard via the navbar. This allows them to blacklist any users who may be using the site in a bad way. There currently is not a way to see specifically what was done wrong, but the team can work on adding error reports with the reporting of users. 

# How to Contribute 
Please follow the installation instructions and read the code documentation. Create a new branch or fork and make edits there. Afterwards, a member of the development team will review your code, and approve the PR request. _Thank you for your interest!_ 

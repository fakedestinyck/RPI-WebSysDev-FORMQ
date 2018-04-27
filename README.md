# RPI-WebSysDev-FORMQ
Group Project for ITWS 4500

FORM Q is generally targeted at RPI students. At Rensselaer, many students have a difficult time finding roommates. There are resources targeted at helping students find roommates; for example, RPI’s SLL has a survey meant to match students with individual matches with similar characteristics. This may be a good start but it is flawed, with limited questions and options. There are two more important issues with the “solution” made by SLL that the team will fix. The first is that this website does not offer group matching, and the second is that this website is only an option for students looking to live on campus. As such, a large portion of upperclassmen students cannot use the website. Since the team is including features for students who live off campus and students searching for a group, the number of potential users increases greatly.

The website’s type of users include those looking to “advertise” for a roommate through the creation of a profile and those looking to search through profiles for roommates. Users can belong to both groups, meaning they can “advertise” for a roommate and search through other profiles. For users looking to “advertise” for a roommate, they will fill out a profile with contact information, preferences and be given the option to prioritize these preferences. For example, a user would be able to mark down that they prioritize limited noise when filling out their profile. If they are in a group, this profile will be a group profile. On group profiles, the group answers these preferences as one unit collectively.

Users looking to search for matches can search by number of people. For example, a group of two students may be looking to match with another two students in order to live in an apartment style complex for four people. They can specifically search for groups of two and see the collective profile of the other groups of two. This provides much more options for students, especially for those looking for apartments with large groups of people to join. From there, the student or group of students can reach out to potential roommates via the contact information provided on the profiles.

# Technology Choices 

# Technical Documents
These are small descriptions about all the main pages involved in the website. For more information on each of the pages, please refer to the files themselves as they have more documentation through descriptions and multi-line comments. 
### CAS-1.3.5
These are all the file that are needed in order to make CAS authentication work. The other files in the website use these in order to actually ensure CAS authentication is used. The project team did not make many edits if at all - they were just added. 
### API 
This was part of the "API" we wrote for the project (it's more like a library). It is mainly a bunch of helper functions written in order to make the rest of the website easier to develop and use. 
#### Library_Mongo.php 

#### checkLogin.php

#### connect.php 

#### email.class.php 

#### getallusers.php 

#### leaveorspam.php 

#### login.php

#### logout.php 

#### readdata.php 

#### sendmail.php 

#### storedata.php 

#### storeretrievedata.php

### database 
These are all the files related to the database. These are run in order to ensure one has the right version of php needed to develop the website, and populates the data. Please make sure to have MongoDB installed beforehand. 

#### MongoDB.php

#### php_mongo.dll

#### phpinfo.php 

### error 
These are the files in case the website needs to return error codes. 

#### 403.php 

#### 405.php 

#### 500.php 

### resources 
These are just different pictures used by the aboutus page and the pictures used for various pages in website, like the User Dashboard and the About Us. 

### MongoDB.php 

### aboutus.php 

### admin_dashboard.php 

### auth.php 

### cacert.pem 

### disclaimer.php 

### footer.php 

### index.php 

### match.php 

### navbar.php

### profile.php 

### questionaire.php

### search.php

### user_dashboard.php

# How to Install 

# Navigation 

# How to Contribute 

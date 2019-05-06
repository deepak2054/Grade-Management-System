# Grade-Management-System


 ABSTRACT
As project, we have come with the development of the website ‘Grade Management System
(GMS)’. Managing grade of the student in a proper manner has always been the priority of
every educational system worldwide. With the help of GMS, faculties and other members who
are involved in managing grades of the Post Graduate student of DOCSE of Kathmandu
University can access, edit and manage the grades in more convenient, easy and secured
manner. GMS is developed using HTML, CSS as a frontend development tool while PHP and
MYSQL as a backend development tool.




ACKNOWLEDGEMENT
Firstly we are much pleased to conduct the project ‘Grade Management System’ . Therefore we
would like to thank the DOCSE for providing us an opportunity to work on this project. At most,
we would like to thank our project supervisor Mr. Manoj Shakya for guiding, assisting and
pointing out our mistakes. He has been helping us in many ways from the day we had started our
project. Moreover we are greatful to our project coordinator for beliving the eligibility of our
project.We are greatful to our seniors for being with us and for guiding us due to which our project
is carried out with mutual coordination among the group members. The contribution and hardwork
of our team has brought project to its final stage . We wish to acknowledge all the teachers, seniors
and friends who helped directly or indirectly and we express our sincere appreciation for their
suggestions. We would like to express our gratitude to CE 2nd Year Students Roshan
Adhikari,Anish Byanjankar, Salil Koirala,S ajan Maharjan,Saurav prajapati and Vivek Shakya
Batch who initiated this project.
4Table of Contents
1. INTRODUCTION ...................................................................................................................... 6
1.1 Background and Objectives .................................................................................................. 6
1.2 Problems and Possible Solutions .......................................................................................... 7
1.3 Scope and Opportunities ....................................................................................................... 7
2. RELATED WORK ..................................................................................................................... 8
2.1 Creatrix Campus ................................................................................................................... 8
2.2 Quick Schools ....................................................................................................................... 9
3. SOFTWARE DEVELOPMENT ............................................................................................. 10
3.1 System Overview ................................................................................................................ 10
3.2 Use Case Diagram ............................................................................................................... 11
3.3 Activity Diagram ................................................................................................................ 12
3.4 Data Flow Diagram ............................................................................................................. 13
3.5 Database Diagram ............................................................................................................... 14
3.6 Working Mechanism Of GMS ............................................................................................ 15
4. CONCLUSION AND RECOMMENDATION ........................................................................ 16
4.1 Conclusion .......................................................................................................................... 16
4.2 Recommendation ................................................................................................................ 16
BIBLIOGRAPHY ......................................................................................................................... 17
GANTT CHART .......................................................................................................................... 18
51. INTRODUCTION
1.1 Background and Objectives
Grade Management System abb. as GMS is a cross-platform for the management of the grades
for the Department of Computer Science and Engineering priorotised for .PostGraduates.This
system is helpful for replacing the orthodox way of knowing the grades by the students.Earlier the
students were compelled to know about their grades standing in line or just looking at the reports
attached on the notice board,this was really time consuming and ofcourse irritating,but the GMS
has revolutionized the method of observing and seeking information of the grades.
GMS empowers the process of managing the grades in more methodic way.The faculties,the
students and other users with administrative power can access the grades with just simple
click.The connection with the managed and the systematic database makes the search process more
faster and convinient.GMS can indeed be a sample website for all those educational organization
who plan of making their grade management systematic and ofcourse digitalized.
The world is moving forward in the process of digitalization,the educational sector is really
important in bringing such change,GMS can be a sample website for many such projects.
61.2 Problems and Possible Solutions
Grades are always important for a student,his/her overall performance of the semester is presented
in the form of grades so to make it faster,convinient and managed its important for any educational
organization.University is always an example for colleges in the country,in such situation when a
University’s department brings the system like GMS its a step forward in the field of digitalization.
The earlier method of presenting the grades one by one and giving it among the students can be
changed to GMS.This system empowers a way of accessing the result from the place we want if
we have internet connection setup.Its on web and the access is just away some clicks,the saving of
time,faster processing and convinience are all along provided with the GMS.



1.3 Scope and Opportunities
Every educational institute wants a well managed and a well informative grade management
technique.After all the grading system of any educational organization defines the management
skills and also the productivity of the educational institute.GMS empowers the grading in more
managed manner,the teacher and the students along with the educational institute get benifited
with this kind of platform.In context of Nepal where the digitalization is in its initial phase,GMS
can definetely contribute in the process of digitalization.Remember those old days when we had
the system of storing datas in register in every government office,but nowadays due to
digitalization the register sytem are slowly turning into computers.We often talk about E-
Government,the GMS can play a vital role in the process of E-Government.There are thousands
of community schools all across the country,when we setup the GMS technology in these kinds of
community school,the students information,there performance and even results of alumnis can be
easily accessed.This technology determines the overall performance of the educational
organization.
In a nutshell,scoring grades determines the performance of the students while managing the
grades,presenting it in a welldefined manner and making further plans with the grades determines
the performance of the educational organization.In this way,an educational system can be
revolutionized with the help of GMS,and we can definetely say there are enough scopes for this
technology.
72. RELATED WORK
We found two websites which are somewhat similar to our GMS in terms of managing academic
records
2.1 Creatrix Campus
Creatrix Campus is a cloud-based educational management solution with the ability to automate,
streamline, monitor, and communicate information related to students, staff, parents, and other
day to day administrative activities for better decision-making
82.2 Quick Schools
Quick Schools is a school management system for the web generation. It is an online gradebook.
This is a way for parents to track a child’s progress. It is a central location for homework and
assignment.
93. SOFTWARE DEVELOPMENT
Software development is the process of computer programming, documenting, testing, and bug
fixing involved in creating and maintaining applications and frameworks resulting in
a software product.
3.1 System Overview
a. Front-End WEB DEVELOPMENT
We have used HTML – Markup Language to build the framework of the website.
As well as , we used CSS- Style Sheet for styling purposes. In order to make the
website dynamic we used Java Script Library- jQuery.
b. Back-end web development
The backend of GMS is based upon PHP as scripting language and MYSQL for
maintaining database.
c. Development tools
Brackets and Sublime text were used for text-editing purposes. Whereas XAMPP,
LAMP and WAMPP for hosting the website.
d. Interface
GMS is an web application.
103.2 Use Case Diagram
Administrator, Teacher and Student are the three actors in the above given Use Case Diagram.
Administrator possess the major access of the system. Whereas Teacher has permission to
Assign Grades and Students can only view their reports.
113.3 Activity Diagram
First of all Teacher , Student and Courses are entered into the database by the Administrator.
Teachers are assigned into different courses where the teacher in turn assigns the grade to the
students in their respective courses. Now, the students can view their report.
123.4 Data Flow Diagram
The above mentioned diagram is the Data Flow Diagram for GMS. Information from the users
are stored in respective tables of the database. When teacher assign the grade in the certain
course, it is updated in the course and grade tables. When student requests for grade then data is
retrieved from grade table by view report function.
133.5 Database Diagram
There are seven tables that are stored in database; class, course, student, student_grade,
teacher_detail, user and user_detail. The table class and courses comprises basic information of
class such as class id, batch, course code and instructor. The table student, teacher_detail and
user_detail consists all the essential information such as name, address, email address and so on.
The table student_grade stores information such as registration number, grade, class id and so
on. The table user stores username and password.
143.6 Working Mechanism Of GMS
154. CONCLUSION AND RECOMMENDATION
4.1 Conclusion
Grade Management System is a website that allows the management of grades of the
students in more systematic manner. With this website the access can be allowed to only
those who should manage the grades. GMS is a platform for different parties with different
authorities i.e. Faculties and Students. Faculties can update, upgrade grades according to
their respective subjects and students can view the grades. This can be a sample website
to many other educational organization who plan of managing the grades in systematic
manner.
4.2 Recommendation
We have developed this application as our project during third semester.This project has
turned out to be informative in many ways. Each stage we have learned various things
related to Web development,Databases the FrontEnd,the BackEnd development and many
Information Technology related things. With the experience of developing the websites
like this, we get the information about how the Websites work.In this age of Internet
everyone wants to get online,even the small organization wants to get connected with
Internet,with the experience of GMS we can make websites for many such organization
and hence make them connected to this ocean called Internet.
1

6BIBLIOGRAPHY
1. Jeff Noble, Ed tittel,, HTML,XHTML & CSS for Dummies , 2008.
2. Dooley, Kline MYSQL SERVER ADMIN,2010.
3. Silberschatz, Korth,Sudarshan, DATABASE SYSTEM CONCEPTS,2006..
4. PHP-Web Development :
www.thenewboston.com
http://www.tizag.com/phpT/
http://php.net/manual/en/index.php
http://www.learnphptutorial.com/
http://www.1keydata.com/

5. HTML and CSS:
https://www.w3schools.com
www.hongkiat.com/blog/sites-to-learn-coding-online
https://www.awwwards.com/websites/css3/
http://www.codecademy.com/
http://teamtreehouse.com/
6.Creately: Online Diagram Software to draw Flowcharts, UML & more
https://www.creately.com/
6. MYSQLI
http://eti.ng/php-and-mysqli-database-integration.html
http://www.mysqltutorial.org/

2
3
Gathering
3 System Design
4 Implementation/Build
5 Code Review and
Debugging
6
Documentation
18
4
5
6
7
8
9
10 11 12

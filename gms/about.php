<?php require_once ("session/session.php");?>

<?php confirm_logged_in(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About GMS</title>
        <link rel="stylesheet" type="text/css" href="css/about.css">
        <link rel="stylesheet" href="css/bootstrap.css">

    

    </head>
    <body>
        <?php include('include/header.php'); ?>
        <?php include("include/connect.php"); ?>
        <?php
            if (logged_in_username() == "admin") {
                include('include/nav.php');
                navbar('about');
            }
            else
            {
                $username = logged_in_username();
                include("include/user_nav.php");
            }
        ?>
        
 <div class='container-fluid' >

 <!--                               
<center>
    <div id = "outerbox" >
        <div id="sliderbox">
            <img src = "images/fast.jpg">
            <img src = "images/two2.jpg">
            <img src = "images/three3.jpg">
            <img src ="images/four4.jpg">
        </div>
    </div>
    <br>

    <div id = "new">

     <p style="font-family::; cursive;"> This new updated version of <strong>GMS 3.0</strong> is done as a Second year First Semester project by a group of four students.It was initially started by ................................................... for the fullfillment of .....................under supervision of Mr.Manoj Shakya.
       .</p>
    </div>
</center>
-->

    



    <div id="contact_page">
       
              

                <div style="border-bottom: 1px solid #f1f1f1;margin: 10px auto;"></div>
                <h2 style="color: #444;">About GMS</h2>
                <p>Grade Management System abb. as GMS is a cross-platform for the management of the grades for the Department of Computer Science and Engineering prioritized for Post Graduates.This system is helpful for replacing the orthodox way of knowing the grades by the students.Earlier the students were compelled to know about their grades standing in line or just looking at the reports attached on the notice board,this was really time consuming and ofcourse irritating,but the GMS has revolutionized the method of observing and seeking information of the grades.
                GMS empowers the process of managing the grades in more methodic way.
                <br><br>The faculties,the students and other users with administrative power can  access the grades with just simple click.The connection with the managed and the systematic database makes the search process more faster and convinient.GMS can indeed be a sample website for all those educational organization who plan of making their grade management systematic and ofcourse digitalized.  
                The world is moving forward in the process of digitalization,the educational sector is really important in bringing such change,GMS can be a sample website for many such projects.</p>
                <h2 style="color: #444;">Contributors</h2>

                 <div style="border-bottom: 1px solid #f1f1f1;margin: 10px auto;"></div>

                <div id="contributors">
                    <div class="contributors_each">
                        <div>
                            <img src="images/deepu.jpg" />

                        </div>
                        <div>
                            <p>Deepak Shrestha</p>
                            <p>iamdeepak42@gmail.com</p>
                        </div>
                    </div>

                    <div class="contributors_each">
                        <div>
                            <img src=" images/subash.jpg" />

                        </div>
                        <div>
                            <p>Subash Aryal</p>
                            <p>reddevils@gmail.com</p>
                        </div>
                    </div>

                    <div class="contributors_each">
                        <div>
                            <img src=" images/ame.jpg" />

                        </div>
                        <div>
                            <p>Amit Upreti</p>
                            <p>a.u.aua937@gmail.com</p>
                        </div>
                    </div>

                    <div class="contributors_each">
                        <div>
                            <img src=" images/sujal.jpg" />

                        </div>
                        <div>
                            <p>Sujal Paudel</p>
                            <p>thesujal17@gmail.com</p>
                        </div>

                        

                    </div>
                     


                    <div style="clear: both;"></div>
                         <p align="center">                This project was initiated by CE 2nd Year Students Roshan Adhikari,Anish Byanjankar, Salil Koirala,Sajan Maharjan,Saurav prajapati and Vivek Shakya Batch and reworked by CE 2nd year students of 2015 Batch under the supervision of Mr.Manoj Shakya.</p>
                </div>

        <div style="clear: both;"></div>
                
            </div>
        

 </div>

 </body>
 </html>

                            

<?php include 'include/footer.php'; ?>
<?php

$isMatch = false;

if ($isMatch) {
            $_SESSION['username'] = $myusername;
            

            echo "<script type='text/javascript'>alert('Welcome, $name');</script>";
            echo "<script type='text/javascript'>window.location.replace('service.html');</script>";

        } else {
            echo "<script type='text/javascript'>alert('Sorry, please check your username and password.');</script>";
            
        }
        ?>

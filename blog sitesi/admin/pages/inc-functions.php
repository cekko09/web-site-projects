<?php 

// VT Baglan
       // error_reporting(0);

       $dbHost = "localhost";
       $dbUser = "root";
       $dbpass = "";
       $dbname = "blog";


       try {
           $db = new  PDO("mysql:host=localhost;dbname=blog", "root" , "");
       } catch (PDOException $e) {

        echo $e->GetMessage();
           //throw $th;
       }

     

       define("_SITE","http://http://localhost/blog/");


















?>
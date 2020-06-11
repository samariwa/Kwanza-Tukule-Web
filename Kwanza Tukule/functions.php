<?php
   function generateRandomString(){
   	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = 11;
            $string = '';
            for ($p = 0; $p < $charactersLength; $p++) {
                $string .= $characters[rand(0, $charactersLength - 1)];
            }
            return $string;
   }
   function redirectToLoginPage(){
 	header('Location:login.php');
   	exit();
 }
 ?>
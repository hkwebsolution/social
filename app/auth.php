<?php

/**
 * Authentication checking
 */

 function authcheck($table, $col, $data){


    $login_data = connect()->query("SELECT * FROM {$table} WHERE $col='{$data}'");

    if ($login_data->num_rows == 1) {
        return $login_data->fetch_object();
    } else {
        return false;
    }
    
 }

 /**
  * Password check
  */

  function passCheck( $user_pass, $db_pass){

    $data = password_verify($user_pass, $db_pass);

    if ($data == true) {
        return true;
    } else {
        return false;
    }
    
  }

  

   /**
    * User login check
    */
    function userLogin(){

        if (isset($_SESSION['id'])) {
            return true;
        }else {
            return false;
        }

    }
   
    /**
     * Login User's all Data getting by id
     */
    function loginUserData($table, $id){
        $data = connect()->query("SELECT * FROM {$table} WHERE id = '$id'");
        return $data-> fetch_object();
    }
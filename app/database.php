<?php

/**
 * DAtabase connection
 */
function connect(){

    return new mysqli(HOST, USER, PASS, DB);
}

/**
 * 
 * Create
 */

function create($sql){

    connect()->query($sql);
}

/**
 * Get all data
 */

function all($table){
    return connect()->query("SELECT*FROM {$table}");
}

/**
 * Delete
 */

 function delete($table, $id){


    connect()->query("DELETE FROM {$table} WHERE id='{$id}'");
 }

 /**
  * Data exists check
  */
  function dataCheck($table, $col, $val){

    $data = connect()->query("SELECT {$col} FROM {$table} WHERE {$col}='{$val}'");
    
    if($data->num_rows>0){

        return false;
    }else{
        return true;
    }
    
  }

  /**
   * Edit data
   */

   function update($sql){
       connect()->query($sql);
   }
<?php
    $query = "";
    foreach($state as $key => $value){
        if($value){
            $query .= "{$key}={$value}";
        }
    }
    if(!empty($query)){
        $query = "?{$query}";
    }
    header('Location: /answer'.$query);
?>
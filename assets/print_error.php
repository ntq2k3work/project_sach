<?php 
        $error = "";
        $show_error = "";
        $success = "";
        $show_success = "";
            if(isset($_GET['error'])){ 
                $error = $_GET['error'];
                $show_error = "<span style=\"color: red;\">$error</span>";
            }
            if(isset($_GET['success'])){
                $success = $_GET['success'];
                $show_success = "<span style=\"color: green;\">$success</span>";
            }

?>
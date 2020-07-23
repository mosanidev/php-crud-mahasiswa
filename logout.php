<?php

    session_start();
    
    session_unset();                                                

    header("location: "."/mahasiswa/index.php");


?>
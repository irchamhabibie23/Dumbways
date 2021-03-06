<?php
$id = $_GET["skilid"];
$user = $_GET["userid"];
require 'functions.php';
if (deleteSkill($id) > 0){  
    echo "
        <script>
            alert('Skill berhasil di hapus');
            document.location.href = 'update.php?id=$user';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Gagal !!!');
            document.location.href = 'update.php?id=$user';
        </script>";
        echo "<br>";
        echo mysqli_error($conn);
    }
?>
<?php
// koneksi ke database
require 'functions.php';
$users = query("SELECT * FROM users_tb");

// tombol cari di klik
// jika tombol sumbit sudah di pencet
if (isset($_POST["addSkill"])){
    addSkill($_POST["skillInput"], $_POST["id"]);
}


if (isset($_POST["addChar"])){
    //ambil data dari formulir dan
    //cek apakah data berhasil ditambahkan atau tidak
    if ( addEmp ($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('Gagal !!!');
            document.location.href = 'index.php';
        </script>";
        
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background-color: black;
        color: white;
        font-family: "Monaco", monospace;
    }
    table{
        background-color:#2e2e2e;
        padding: 5px;
        width: 30%;
    }
    #skill{
        color: red;
    }

    button{
        background-color: red;
        color :white;
        border-radius: 5px;
    }
    button:hover {
    opacity: 0.8;
    }
    #btn{
        width: 150px;
    }
    input[type="file"] {
    display: none;
    }
    .custom-file-upload {
    border-radius: 5px;
    border: 1px solid #ccc;
    color: black;
    display: inline-block;
    padding: 0px 12px;
    cursor: pointer;
    background-color: rgb(255, 255, 255);
    }
    #gambar{
        width: 100px;
    }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>DW Employee</h1>
    
    <table>
            <tr>
            <form action="" method="post" enctype="multipart/form-data">
                <td><label for="gambar" class="custom-file-upload"><input type="file" name="gambar" id="gambar"/>Attache</label></td>
                <td><input name="nama" type="text" autofocus placeholder="Input Name Programmer..."></td>
                <td align="right">
                    <button id="btn" name="addChar">Add Character</button>
                </td>
            </form>
            </tr>
            
        </table>
        <br>
    
   
    <?php foreach ($users as $user) : ?>
        <?php $skills = skill($user["name"])?>
        <table boarder="1">
        <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <td><img src="img/<?= $user["photo"];?>" width="100px"></td>
                <td align="left" style="font-size:20px"><?=$user["name"];?><br>
                <div id="skill"><?php foreach ($skills as $skill) :?>
                    <?=$skill["skill_name"]?>
                    <?php endforeach ?>
                <br>
                
                <input name="skillInput" type="text"autofocus placeholder="Input Skill...">
                </td>
                <td align="right">
                <a href="update.php?id=<?= $user["id"];?>"><button type="button">Edit</button></a> <a href="delete.php?id=<?= $user["id"];?>"><button type="button">x</button></a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <input type="hidden" name="id" value="<?=$user["id"]?>">
                    <button id="btn" name="addSkill" type="submit">Add Skill</button>
                </td>
                
            </tr>
        </form>
        </table>
        <br>
    <?php endforeach; ?>
    
    
</body>
</html>
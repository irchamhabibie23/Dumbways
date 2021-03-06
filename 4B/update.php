<?php
require 'functions.php';
//ambil data dari URL
$id=$_GET["id"];
//query data mahasiswa berdasarkan id
$users = query("SELECT * FROM users_tb WHERE id = $id ")[0];
$skills = skill($users["name"]);

// jika tombol sumbit sudah di pencet
if (isset($_POST["submit"])){
    if ( updateEmp($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
        </script>
        ";
    }else if(isset($_POST["addSkill"])){
        $skillAdded = $_POST["addSkill"];
        foreach ($skillAdded as $skill ){
        addSkill($skill, $id);
        }
        echo "
        <script>
            alert('Skill berhasil ditambahkan');
            document.location.href = 'update.php?id=$id';
        </script>";
    }else{
        echo "
        <script>
            alert('Tidak ada data yang berubah');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        background-color: black;
        color: white;
        font-family: "Monaco", monospace;
    }
    table{
        background-color:#2e2e2e;
        padding: 5px;
        width: 20%;
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
    <title>Update Data</title>
</head>
<body>

    <h1>Update Data <button onclick="document.location.href='index.php'" style="width:auto;"><i class="fa fa-home"></i> Home</button></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="table-responsive">
        <table boarder="1" id="form_table" class="table table-bordered">
            <tr class="case">
                <td width=1% ><img src="img/<?= $users["photo"];?>" width="100px">
                <input type="hidden" name="id" value="<?=$users["id"]?>">
                <input type="hidden" name="gambarLama" value="<?=$users["photo"]?>">
                </td>
                </tr>
                <td align="left" style="font-size:20px"><input type="text" name="nama" id="nama" required value="<?=$users["name"];?>"><br>
                </td>
                </tr>
                <?php $i=1?>
                <?php foreach ($skills as $skill) :?>
                    <div id="container">
                <td>
                    Skills: <?=$skill["skill_name"]?> <a href="deleteskill.php?skilid=<?=$skill["skill_id"]?>&userid=<?=$users["id"]?>"><button type="button">delete</button>
                    <?php $i++?>
                </td>
                </tr>
                <?php endforeach ?>
            </tr>
        
        </table>
            <input type="file" name="gambar" id="gambar">
            <button type="submit" name="submit">Ubah</button>
            <button type="button" class='btn btn-success addmore'>+</button>
            <a href="update.php?id=<?= $id;?>"><button type="button">Reset</button></a>
            </div>
            
    </form>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $(".addmore").on('click', function () {
            var count = $('table tr').length;
            var data = "<tr class='case' id = 'container'>";
            data += "<td>Skills:<input id ='tom' class='form-control' type='text' name='addSkill[]' required/></td> </tr>";
            $('#form_table').append(data);
            count++;
        });
    });
        function addFields(){
            // Number of inputs to create
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
        }
</script>
</body>
</html>
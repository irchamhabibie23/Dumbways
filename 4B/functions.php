<?php 
// koneksi ke database
// fetch dari object $result
// mysqli_fetch_row() -- mengembalikan array numerik
// mysql_fetch_assoc() -- mengembalikan array associative
// mysql_fetch_array() -- mengembalikan keduanya
// mysqli_fetch_object() -- mengembalikan object

$conn = mysqli_connect("localhost", "root", "kocam", "employee");

function query($query) {
    global $conn ;
    $result = mysqli_query($conn, $query);
    if (!$result){
        echo mysqli_error($conn, $query);
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row ;
    }
    return $rows;
}

function skill($keyword){
    $query = "SELECT users_tb.id, users_tb.name, users_tb.photo, skill_tb.skill_name, skill_tb.skill_id
    FROM skill_tb
    JOIN users_tb
    ON skill_tb.user_id = users_tb.id
    WHERE users_tb.name = '$keyword'
    ";
    return query($query);
}

function updateEmp($data){
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    // check apakah user pilih gambar baru
    if ($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    } else{
        $gambar = upload();
    }
    $query = "UPDATE users_tb SET 
                name = '$nama',
                photo = '$gambar'
                WHERE id = $id;
            ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addSkill($data1, $data2){
    global $conn; 
    $nama = htmlspecialchars($data1);
    $id = $data2;

    $query = "INSERT INTO skill_tb VALUES (Null,'$nama', '$id');";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function addEmp($data){
    global $conn; 
    $nama = htmlspecialchars($data["nama"]);
    // upload gambar
    $gambar = upload();
    if (!$gambar){
        return false;
    }

    $query = "INSERT INTO users_tb VALUES (Null,'$nama', '$gambar');";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function deleteEmp($id){
    global $conn;
    $query = "DELETE FROM users_tb WHERE id = $id;";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpFile = $_FILES['gambar']['tmp_name'];

    // check apakah ada gambar yang diupload
    if ($error == 4){
        echo "
        <script>
            alert('Upload Gambar Terlebih Dahulu');
        </script>";
        return false;
    }
    // check apakah file yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
        <script>
            alert('Ekstensi Gambar yang Diperbolehkan : .jpg, .jpeg, dan .png');
        </script>"; 
        return false;
    }
    // check apakah ukuranFile terlalu besar
    if ($ukuranFile > 1048576 ){
        echo "
        <script>
            alert('Ukuran Gambar Maksimal 1MB !!');
        </script>";
        return false;
    }
    // lolos check generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpFile, 'img/' . $namaFileBaru);
    return $namaFileBaru; 
}


function deleteSkill($id){
    global $conn;
    $query = "DELETE FROM skill_tb WHERE skill_id = $id;";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>
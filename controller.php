<?php
include 'konek.php'; // Menyertakan koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tugas = $_POST['tugas'];
    $quiz = $_POST['quiz'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    // Menghitung nilai akhir dan grade
    $nilai_akhir = ($tugas * 0.2) + ($quiz * 0.2) + ($uts * 0.3) + ($uas * 0.3);

    // Menentukan grade
    if ($nilai_akhir >= 85) {
        $grade = "A";
    } elseif ($nilai_akhir >= 75) {
        $grade = "B";
    } elseif ($nilai_akhir >= 60) {
        $grade = "C";
    } elseif ($nilai_akhir >= 40) {
        $grade = "D";
    } elseif ($nilai_akhir >= 30) {
        $grade = "E";
    } else {
        $grade = "F";
    }

    // Query menyimpan data ke database
    $sql = "INSERT INTO db_nama (nim, nama, tugas, quiz, uts, uas, nilai_akhir, grade) 
            VALUES ('$nim', '$nama', '$tugas', '$quiz', '$uts', '$uas', '$nilai_akhir', '$grade')";
    if ($conn->query($sql) === TRUE) {
        // Redirect setelah submit  
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
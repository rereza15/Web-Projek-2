<!doctype html>
<html lang="en">
<head>
    <meta charset="UTC+7">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form Nilai</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: "Noto Sans JP", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(222,0,198,1) 35%, rgba(0,212,255,1) 100%);
        }

        .Tabel_nilai {
            display: flex;
            gap: 20px;
            height: auto;
            border: 2px solid black;  
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,253,254,1) 35%, rgba(0,212,255,1) 100%);
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
        table td {
            padding: 10px;
            border: 1px solid black;
        }
        h3 {
            text-align: center;
            font-family: "Kalam", cursive;
            font-weight: 300;
            font-style: normal;
            
        }
 
 
    </style>
    
</head>
<body>
    <div class="Tabel_Nilai">
        <form method="post" action="">
            <label for="nim">NIM:</label>
            <input type="number" id="nim" name="nim" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="tugas">Tugas:</label>
            <input type="number" id="tugas" name="tugas" required>

            <label for="quiz">Quiz:</label>
            <input type="number" id="quiz" name="quiz" required>

            <label for="uts">UTS:</label>
            <input type="number" id="uts" name="uts" required>

            <label for="uas">UAS:</label>
            <input type="number" id="uas" name="uas" required>

            <input type="submit" value="Submit">
        </form>

        <div class="tabel">
        <h3>Hasil Keseluruhan Nilai Mahasiswa</h3>
            <?php
            //Memasukan file file yg ingin di jalankan
            include("konek.php");
            include("controller.php");

            $sql = "SELECT * FROM db_nama";
            $result = $conn->query($sql);
            // menampilkan data
            if ($result->num_rows > 0) {
                // membuat border untuk tabel
                echo "<table border='1'>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>Quiz</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                            <th>Grade</th>
                        </tr>";

                // mengambil setiap baris data
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['nim'] . "</td>
                            <td>" . $row['nama'] . "</td>
                            <td>" . $row['tugas'] . "</td>
                            <td>" . $row['quiz'] . "</td>
                            <td>" . $row['uts'] . "</td>
                            <td>" . $row['uas'] . "</td>
                            <td>" . $row['nilai_akhir'] . "</td>
                            <td>" . $row['grade'] . "</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data di database.";
            }
            ?>
        </div>
    </div>
</body>
</html>
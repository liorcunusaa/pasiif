<?php
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Mahasiswa</title>
    
    <style>
        .container_mhs {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 50vh;
            
        }

        .wrapper {
            align-items: center;
            background: #fff;
            width: 90%;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.4);
            background: linear-gradient(#D5A3FF 0%, #77A5F8);
        }

        h2 {
            text-align: center;
            color: #fff;
            font-size: 50px;

        }

        hr {
            width: 100px;
            margin: 10px auto;
            color : black;
        }

        .members {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .team-mem {
            margin: 8px;
            text-align: center;
        }

        #img_mhs {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px;
            object-fit: cover;
        }

        h4,
        #ket {
            font-size: 12px;
            margin: 7px;
            color : #fff;
        }
    </style>
</head>
<body>

<div class="container_mhs">
    <div class="wrapper">
        <h2>Mahasiswa</h2>
        <hr>
        <div class="members">
            <?php if (mysqli_num_rows($mahasiswa) > 0): ?>
                <?php while ($p = mysqli_fetch_array($mahasiswa)): ?>
                    <div class="team-mem">
                        <img id="img_mhs" src="uploads/peserta/<?= $p['gambar'] ?>" alt="Foto Mahasiswa">
                        <h4><?= htmlspecialchars($p['nama_mhs'], ENT_QUOTES, 'UTF-8') ?></h4>
                        <p id="ket"><?= htmlspecialchars($p['nim'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>

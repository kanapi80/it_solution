
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
            margin: 0;
            font-size: small;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .back{
            background-color: #00968d;
            color: white;
        }
    </style>
</head>
<body>
<!-- <img  src="http://localhost:8080/assets/img/rsud.png" alt="" style="width:130px;height:130px"> -->
<!-- <img  src="http://localhost:8080/img/rsud.png') ?>" alt="" style="width:130px;height:130px"> -->
<!-- <img src="<?= base_url('assets/img/rsud.png') ?>" alt="Logo" style="width:130px;height:130px"> -->
    
<h3 class="text-center">DAFTAR ADMINISTRATOR </h3>
    <table class="table">
        <tr class="back">
            <th class="text-center">ID</th>
            <th>NAMA ADMIN</th>
            <th>USER NAME</th>
            <th class="text-center">LEVEL</th>
            <th class="text-center">STATUS</th>
            <th>TUPOKSI</th>
        </tr>
        <?php foreach ($selectadmin as $admin): ?>
        <tr>
            <td class="text-center"><?= $admin['IdAdmin']; ?></td>
            <td><?= $admin['NamaAdmin']; ?></td>
            <td><?= $admin['UserName']; ?></td>
            <td class="text-center"><?= $admin['Level']; ?></td>
            <td class="text-center"><?php if($admin['Status'] == 1) {echo "Aktif";} else {echo "Tidak Aktif";} ?></td>
            <td><?= $admin['Tupoksi']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

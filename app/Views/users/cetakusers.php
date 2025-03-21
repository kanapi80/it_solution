<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            font-size: small;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .back {
            background-color: #00968d;
            color: white;
        }

        .qr-code {
            width: 60px;
            height: 60px;
        }
    </style>
</head>

<body>
    <h3 class="text-center">DAFTAR ADMINISTRATOR</h3>
    <table class="table">
        <tr class="back">
            <th class="text-center">ID</th>
            <th>NAMA ADMIN</th>
            <th>USER NAME</th>
            <th class="text-center">LEVEL</th>
            <th class="text-center">STATUS</th>
            <th class="text-center">TUPOKSI</th>
        </tr>
        <?php foreach ($selectadmin as $admin): ?>
            <tr>
                <td class="text-center"><?= $admin['IdAdmin']; ?></td>
                <td><?= $admin['NamaAdmin']; ?></td>
                <td><?= $admin['UserName']; ?></td>
                <td class="text-center"><?= $admin['Level']; ?></td>
                <td class="text-center">
                    <?= ($admin['Status'] == 1) ? "Aktif" : "Tidak Aktif"; ?>
                </td>
                <td class="text-center">
                    <?php if (!empty($admin['qrPath'])): ?>
                        <img src="<?= $admin['qrPath']; ?>" class="qr-code" alt="QR Code">
                    <?php else: ?>
                        <span>Tidak Ada QR</span>
                        <?php endif; ?>>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
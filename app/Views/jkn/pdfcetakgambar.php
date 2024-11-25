<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        img {
            max-width: 100%;
            /* height: auto; */
            margin-top: 0;
        }
    </style>
</head>


<body>

    <?php foreach ($penunjang as $row) : ?>
        <img src="../public/uploads/<?= $row['image']; ?>" width="800px" height="1095px">
    <?php endforeach; ?>
</body>

</html>
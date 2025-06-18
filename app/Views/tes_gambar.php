<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Test Gambar</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
        }

        img {
            max-width: 400px;
            height: auto;
            border: 3px solid #007bff;
        }

        .url {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>Test Menampilkan Gambar WordPress</h1>

    <img src="<?= $image ?>" alt="Gambar Featured" />
    <div class="url">URL Gambar: <br><?= $image ?></div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            margin-top: 100px; 
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>🎉 Terima kasih sudah memilih!</h1>
    <p>Suara kamu sudah tercatat dan tidak bisa diubah lagi.</p>

    <a href="{{ route('logout') }}" class="btn">Keluar / Login Ulang</a>
</body>
</html>

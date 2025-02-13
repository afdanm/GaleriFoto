<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Galeri Foto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #ddd;
        }

        p {
            font-size: 18px;
            margin-bottom: 25px;
            color: #ccc;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu a {
            text-decoration: none;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 18px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome to My Photo Gallery</h1>
        <h2>Explore My Collection</h2>
        <p>Choose a category below to explore my works.</p>

        <div class="menu">
            <a href="/galeri-saya">📸 Galeri Foto</a>
            <a href="/seni-saya">🎨 Seni Saya</a>
            <a href="/kontak-saya">📞 Kontak</a>
        </div>
    </div>

</body>
</html>
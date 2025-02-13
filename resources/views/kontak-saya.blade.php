<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Saya</title>
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
            min-height: 100vh;
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

        header {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px 0;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
        }

        header h1 {
            font-size: 32px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            color: #ddd;
        }

        h2 {
            font-size: 28px;
            margin-top: 20px;
            color: #fff;
        }

        p {
            font-size: 18px;
            color: #ddd;
            margin-bottom: 10px;
        }

        .contact-info {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 20px;
            max-width: 400px;
            margin: 20px auto;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .contact-info a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .contact-info a:hover {
            color: #23a6d5;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kontak Saya</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/galeri-saya">Galeri Saya</a></li>
                <li><a href="/seni-saya">Seni Saya</a></li>
                <li><a href="/kontak-saya">Kontak Saya</a></li>
            </ul>
        </nav>
    </header>

    <h2>Hubungi Saya</h2>
    <div class="contact-info">
        <p>Email: <a href="mailto:akunbebasss95@email.com">akunbebasss95@email.com</a></p>
        <p>Instagram: <a href="https://www.instagram.com/danselsai?igsh=azR3dXgzeGpxNzRj" target="_blank">@danselsai</a></p>
    </div>
</body>
</html>
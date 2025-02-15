<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Karya Seni</title>
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

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #fff;
            z-index: 2;
            position: relative;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 400px;
            z-index: 2;
            position: relative;
        }

        .upload-form label {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 5px;
        }

        .upload-form input[type="text"],
        .upload-form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 16px;
            outline: none;
        }

        .upload-form input[type="file"] {
            cursor: pointer;
        }

        .upload-form input[type="file"]::file-selector-button {
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-form input[type="file"]::file-selector-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .upload-form button {
            width: 100%;
            padding: 12px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-form button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .success-message {
            color: #4caf50;
            font-size: 16px;
            margin-bottom: 20px;
            z-index: 2;
            position: relative;
        }

        .home-link {
            margin-top: 20px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 10px;
            transition: 0.3s;
            z-index: 2;
            position: relative;
        }

        .home-link:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
    </style>
</head>
<body>
    <canvas id="backgroundCanvas"></canvas>

    <h2>Upload Karya Seni Baru</h2>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form class="upload-form" action="{{ route('upload-art') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Judul Karya:</label>
        <input type="text" name="title" id="title" required placeholder="Masukkan judul karya">
        
        <label for="art">Pilih Gambar Karya:</label>
        <input type="file" name="art" id="art" required>

        <button type="submit">Upload</button>
    </form>

    <a href="/" class="home-link">Kembali ke Home</a>

    <script>
        const canvas = document.getElementById('backgroundCanvas');
        const ctx = canvas.getContext('2d');

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        const colors = ['#ee7752', '#e73c7e', '#23a6d5', '#23d5ab'];
        const particles = [];

        class Particle {
            constructor(x, y, radius, color, velocity) {
                this.x = x;
                this.y = y;
                this.radius = radius;
                this.color = color;
                this.velocity = velocity;
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                ctx.fillStyle = this.color;
                ctx.fill();
                ctx.closePath();
            }

            update() {
                this.draw();
                this.x += this.velocity.x;
                this.y += this.velocity.y;

                if (this.x + this.radius > canvas.width || this.x - this.radius < 0) {
                    this.velocity.x = -this.velocity.x;
                }

                if (this.y + this.radius > canvas.height || this.y - this.radius < 0) {
                    this.velocity.y = -this.velocity.y;
                }
            }
        }

        function init() {
            particles.length = 0;
            for (let i = 0; i < 100; i++) {
                const radius = Math.random() * 3 + 1;
                const x = Math.random() * (canvas.width - radius * 2) + radius;
                const y = Math.random() * (canvas.height - radius * 2) + radius;
                const color = colors[Math.floor(Math.random() * colors.length)];
                const velocity = {
                    x: (Math.random() - 0.5) * 2,
                    y: (Math.random() - 0.5) * 2
                };
                particles.push(new Particle(x, y, radius, color, velocity));
            }
        }

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            particles.forEach(particle => {
                particle.update();
            });
        }

        init();
        animate();

        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            init();
        });
    </script>
</body>
</html>
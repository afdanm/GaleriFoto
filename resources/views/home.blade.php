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
            animation: fadeIn 2s ease-in-out;
            position: relative;
            z-index: 2;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #ddd;
            animation: slideIn 1.5s ease-in-out;
        }

        p {
            font-size: 18px;
            margin-bottom: 25px;
            color: #ccc;
            animation: slideIn 2s ease-in-out;
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
            animation: fadeIn 2.5s ease-in-out;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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
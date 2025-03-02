<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Saya</title>
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
            z-index: 2;
            position: relative;
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
            z-index: 2;
            position: relative;
        }

        .upload-button {
            display: inline-block;
            width: 200px;
            margin: 20px auto;
            padding: 12px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: 0.3s;
            z-index: 2;
            position: relative;
        }

        .upload-button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
            z-index: 2;
            position: relative;
        }

        .gallery-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
            z-index: 2;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            cursor: pointer;
        }

        .gallery-item p {
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            margin: 0;
            text-align: center;
            font-weight: bold;
            color: #fff;
        }

        .delete-button {
            display: inline-block;
            width: 100%;
            padding: 10px;
            background: linear-gradient(45deg, #e73c7e, #ee7752);
            color: white;
            border: none;
            font-weight: bold;
            text-align: center;
            border-radius: 0 0 15px 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .delete-button:hover {
            background: linear-gradient(45deg, #ee7752, #e73c7e);
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .alert-success {
            padding: 12px;
            margin: 20px auto;
            background: rgba(35, 213, 171, 0.8);
            color: white;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
            z-index: 2;
            position: relative;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            max-width: 80%;
            max-height: 80%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* Confirmation Modal */
        .confirmation-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .confirmation-modal-content {
            background: rgba(255, 255, 255, 0.1);
            margin: 20% auto;
            padding: 20px;
            border-radius: 15px;
            max-width: 400px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .confirmation-modal-content h3 {
            margin-bottom: 20px;
            color: #fff;
        }

        .confirmation-modal-content button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .confirmation-modal-content button.confirm {
            background: linear-gradient(45deg, #e73c7e, #ee7752);
            color: white;
        }

        .confirmation-modal-content button.cancel {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .confirmation-modal-content button:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

    </style>
</head>
<body>

    <header>
        <h1>Galeri Foto Saya</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/galeri-saya">Galeri Saya</a></li>
                <li><a href="/seni-saya">Seni Saya</a></li>
                <li><a href="/kontak-saya">Kontak Saya</a></li>
            </ul>
        </nav>
    </header>

    <h2>Galeri Foto</h2>
    <a href="/upload-photo" class="upload-button">Upload Foto Baru</a>
    
    <div class="gallery">
        @foreach ($photos as $photo)
            <div class="gallery-item">
                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" onclick="openModal('{{ asset('storage/' . $photo->image_path) }}')">
                <p>{{ $photo->title }}</p>
                <button class="delete-button" onclick="confirmDelete({{ $photo->id }})">Hapus</button>
            </div>
        @endforeach
    </div>

    @if(session('success'))
        <div class="alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Modal for Image Zoom -->
    <div id="myModal" class="modal" onclick="closeModal(event)">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>
    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="confirmation-modal">
        <div class="confirmation-modal-content">
            <h3>Apakah Anda yakin ingin menghapus foto ini?</h3>
            <button class="confirm" onclick="deletePhoto()">Ya, Hapus</button>
            <button class="cancel" onclick="closeConfirmationModal()">Batal</button>
        </div>
    </div>
    
    <canvas id="backgroundCanvas"></canvas>

    <script>
        // Animasi Partikel
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

        // Fungsi lainnya yang sudah ada sebelumnya

        // Function to open image modal
        function openModal(src) {
            document.getElementById('myModal').style.display = "block";
            document.getElementById('img01').src = src;
        }

        // Function to close image modal
        function closeModal(event) {
            if (event.target === document.getElementById('myModal') || event.target.className === 'close') {
                document.getElementById('myModal').style.display = "none";
            }
        }

        // Function to open confirmation modal
        let photoIdToDelete = null;

        function confirmDelete(id) {
            photoIdToDelete = id;
            document.getElementById('confirmationModal').style.display = "block";
        }

        // Function to close confirmation modal
        function closeConfirmationModal() {
            document.getElementById('confirmationModal').style.display = "none";
        }

        // Function to delete photo
        function deletePhoto() {
            if (photoIdToDelete) {
                window.location.href = `/photos/destroy/${photoIdToDelete}`;
            }
        }

        // Auto-hide success alert after 2 seconds
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 2000);
        }
    </script>
</body>
</html>
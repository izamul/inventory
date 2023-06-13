<!DOCTYPE html>
<html>
<head>
    <title>Gagal Hapus Data</title>
    <style>
        body {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .countdown-container {
            text-align: center;
        }

        .countdown {
            font-size: 48px;
            color: #333;
        }

        .countdown-desc {
            font-size: 24px;
            color: #666;
        }

        .countdown-animation {
            animation: countdown 1s ease-in-out infinite;
        }

        @keyframes countdown {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="countdown-container">
        <div class="countdown countdown-animation">5</div>
        <div class="countdown-desc">Tidak dapat menghapus data yang anda minta, karena terkait dengan data lain</div>
    </div>
    <script>
        $(document).ready(function() {
            var seconds = 5; // Waktu hitung mundur dalam detik
            var countdown = setInterval(function() {
                $(".countdown").text(seconds);
                seconds--;
                if (seconds < 0) {
                    clearInterval(countdown);
                    window.location.href = "{{ route('home') }}"; // Melakukan pengalihan ke halaman home setelah hitung mundur selesai
                }
            }, 1000);
        });
    </script>
</body>
</html>

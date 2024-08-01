<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Progress Bar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #343a40; /* Nền tối */
        }
        .container {
            text-align: center;
            background-color: transparent; /* Nền của phần load trong suốt */
            padding: 30px;
            width: 100%; /* Chiều rộng của phần load bằng 2/3 của trang */
        }
        .progress {
            width: 100%;
        }
        .progress-bar {
            color: #ffffff; /* Màu chữ trắng */
            transition: width 0.5s ease; /* Hiệu ứng chuyển đổi mượt mà */
        }
        #progress-text {
            color: #ffffff; /* Màu chữ trắng */
        }
        .text-white{
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-white">Loading</h2>
        <div class="progress">
            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
        </div>
        <!-- <p id="progress-text" class="mt-3 text-white">0%</p> -->
    </div>

    <script>
        // JavaScript to update the progress bar
        let progress = 0;
        const progressBar = document.getElementById('progress-bar');
        const progressText = document.getElementById('progress-text');
        const loading = document.getElementById('text-white');

        function updateProgress() {
            if (progress < 100) {
                progress++;
                progressBar.style.width = progress + '%';
                progressBar.setAttribute('aria-valuenow', progress);
               
                // progressText.innerText = progress + '%';
            } else {
                clearInterval(interval);
            }
        }

        const interval = setInterval(updateProgress, 10); // Update every 100ms
    </script>
</body>
</html>

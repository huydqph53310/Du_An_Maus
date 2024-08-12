<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles -->
  <style>
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f9fa;
    }
    .error-template {
      text-align: center;
    }
    .error-heading {
      font-size: 10rem;
      font-weight: bold;
      color: #343a40;
    }
    .error-message {
      font-size: 2rem;
      margin-bottom: 30px;
      color: #343a40;
    }
    .btn-back {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }
    .btn-back:hover {
      background-color: #0056b3;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="error-template">
    <h1 class="error-heading">404</h1>
    <p class="error-message">Oops! Trang bạn đang tìm kiếm không tồn tại.</p>
    <a href="?act=admin" class="btn btn-back" >Trở về trang chủ</a>
  </div>
</body>
</html>

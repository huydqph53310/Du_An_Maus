<?php 
session_start();
if(!isset($_SESSION["Email"])){
  header("Location: ?act=trangchu");
}
?>


<!doctype html>
<html lang="en">
  <head>
  <title>Biểu đồ hình tròn nhỏ</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>
  <style>
        #myPieChart {
            max-width: 400px;
            max-height: 400px;
        }
    </style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?act=admin">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_DIR?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=typemanager">Dịch Vụ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=luggagemanager">Hàng hóa ký gửi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=actormanager">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=binhluan">Bình Luận</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=tickets">Vé máy bay</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=uudai">Ưu đãi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=diemden">Điểm đến</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=thongke">Thống kê</a>
        </li>
      </ul>
    </div>
  </nav>
  <h3 class="text-center">Thống kê lượt truy cập vào các trang của hãng</h3>
  <?php
    $LoaiHang = json_encode($list);
    ?>
    <div class="container text-center">
      <br>
    <canvas id="myPieChart" style="align-items: center; justify-content: space-between;"></canvas>
    </div>
    <h3 class="text-center">Thông kê dịch vụ được sử dụng nhiều nhất</h3>
    <script>
        const Loai = <?php echo $LoaiHang;?>;
        let TenLoai = [];
        let Count = [];
        let sumPerent = 0;
        let printC = [];
        for(let i = 0; i< Loai.length; i++){
            TenLoai.push(Loai[i].TenLoaiHang); 
        } 
        for(let i = 0; i< Loai.length; i++){
            Count.push(Loai[i].count);
            sumPerent =  Loai[i].count += sumPerent;
        }
        for(let i = 0; i< Count.length; i++){
          printC.push((Count[i] / sumPerent)*100)
        }
        console.log(Count)
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: TenLoai,
                datasets: [{
                    data: printC, // Phần trăm của từng ý
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56'],
                    hoverBackgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
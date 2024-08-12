<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .modal-dialog {
            max-width: 80%;
            margin: 10rem auto;
        }

        .modal-content {
            border-radius: 0.5rem;
        }

        .modal-backdrop.show {
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="notificationContent"><?= $thongbao ?></p>
                </div>
                <div class="modal-footer">
                    <a href="?act=<?= $link ?>"><button class="btn btn-secondary">Đóng</button></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // Hiển thị modal ngay khi trang được tải
            $('#myModal').modal('show');

            // Thay đổi nội dung thông báo
            const content = "Nội dung thông báo đã được thay đổi!";
            // document.getElementById('notificationContent').innerText = content;
        });
        const Base = "<?php echo BASE_DIR ?>"
        const redirectUrl = "<?php echo $link; ?>";
        setTimeout(() => {
            $('#myModal').modal('hide');
            setTimeout(() => {
                if (redirectUrl != "signin" || redirectUrl != "BuyHanhLy") {
                    window.location.href = '?act=' + redirectUrl;
                }

                window.location.href = Base + '/?act=' + redirectUrl;
            }, 300);
        }, 4000);
    </script>
</body>

</html>
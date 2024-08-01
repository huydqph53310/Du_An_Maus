<?php
class AdminController
{
    // Khai báo thuộc tính
    // Code...


    // Khai báo phương thức 
    public function __construct()
    {
        // Code...
    }

    public function __destruct()
    {
        // Code...
    }

    public function showList()
    {
        // Code...

        include "view/book/list.php";
    }

    public function showCreate()
    {
        // Code...

        include "view/book/create.php";
    }

    public function showDetail($id)
    {
        if ($id !== "") {
            // Code...

            include "view/book/detail.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }

    public function showUpdate($id)
    {
        if ($id !== "") {
            // Code...

            include "view/book/update.php";
        } else {
            echo "Lỗi: Không nhận được thông tin ID. Mời bạn kiểm tra lại. <hr>";
        }
    }
}

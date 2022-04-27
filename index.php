<?php
     require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Crud php</title>
</head>
<body>
    <?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']) {
            case 'danhSachMeVaBe':
                require_once 'sanpham/danhSachMeVaBe.php';
                break;
            case 'danhSachGiaDung':
                require_once 'sanpham/danhSachGiaDung.php';
                break;
            case 'danhSachSucKhoe':
                require_once 'sanpham/danhSachSucKhoe.php';
                break;
            case 'danhSachBachHoa':
                require_once 'sanpham/danhSachBachHoa.php';
                break;

            case 'themMeVaBe':
                require_once 'sanpham/themMeVaBe.php';
                break;
            case 'themGiaDung':
                require_once 'sanpham/themGiaDung.php';
                break;
            case 'themSucKhoe':
                require_once 'sanpham/themSucKhoe.php';
                break;
            case 'themBachHoa':
                require_once 'sanpham/themBachHoa.php';
                break;
            case 'sua':
                require_once 'sanpham/suaDanhSach.php';
                break;
            case 'suaDanhMuc':
                require_once 'sanpham/suaDanhMuc.php';
                break;
            case 'suaLoai':
                require_once 'sanpham/suaLoai.php';
                break;
            case 'xoa':
                require_once 'sanpham/xoa.php';
                break;
            case 'xoaLoai':
                require_once 'sanpham/xoaLoai.php';
                break;
            case 'xoaFeedback':
                require_once 'sanpham/xoaFeedback.php';
                break;

            case 'quanLyUser':
                require_once 'sanpham/quanLyUser.php';
                break;              

            case 'xoaUser':
                require_once 'sanpham/xoaUser.php';
                break;  
            
            case 'danhMuc':
                require_once 'sanpham/danhMuc.php';
                break;

            case 'loaiGiaDung':
                require_once 'sanpham/loaiGiaDung.php';
                break;
            case 'loaiSucKhoe':
                require_once 'sanpham/loaiSucKhoe.php';
                break;
            case 'loaiMeVaBe':
                require_once 'sanpham/loaiMeVaBe.php';
                break;
            case 'loaiBachHoa':
                require_once 'sanpham/loaiBachHoa.php';
                break;
            case 'themLoai':
                require_once 'sanpham/themLoai.php';
                break;

            case 'feedBack':
                require_once 'sanpham/feedBack.php';
                break;
            case 'notications':
                require_once 'sanpham/notications.php';
                break;
            case 'xoaNotication':
                require_once 'sanpham/xoaNotication.php';
                break;
            case 'xoaDanhMuc':
                require_once 'sanpham/xoaDanhMuc.php';
                break;
            case 'traLoi':
                require_once 'sanpham/traLoi.php';
                break;

            
            case 'themDanhMuc':
                require_once 'sanpham/themDanhMuc.php';
                break;
            default:
                require_once 'sanpham/trangChu.php';
                break;
            }
        }else{
                require_once 'sanpham/trangChu.php';
            }
    ?>
</body>
</html>
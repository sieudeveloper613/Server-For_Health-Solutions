<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php    
    $sql = "SELECT * FROM product inner join category on product.idCategory = category.idCategory
    inner join types on product.idType = types.idType WHERE product.idCategory = 4;";                              
    $query = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
    <div class="card" style = "color: #0088FF">
        <div class="card-header" >
            <h2 style = "text-align: center">Danh sách sản phẩm tổng hợp</h2>
         </div>
         <div class="navbar">
         <div class="icon-bar">
          <a href="index.php?page_layout=trangChu"><i class="fa fa-home"></i></a>
          </div>
         <div class="dropdown">
          <button class="dropbtn" >Sản Phẩm
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="index.php?page_layout=danhSachGiaDung">Gia Dụng & Đời Sống</a>
            <a href="index.php?page_layout=danhSachSucKhoe">Sức Khỏe & Làm Đẹp</a>
            <a href="index.php?page_layout=danhSachMeVaBe">Mẹ & Bé </a>
            <a class="active" href="index.php?page_layout=danhSachBachHoa">Bách Hóa Tổng Hợp </a>
          </div>
        </div>
        <a href="index.php?page_layout=quanLyUser">Khách Hàng</a>
        <a href="index.php?page_layout=danhMuc">Danh Mục</a>
        <div class="dropdown">
          <button class="dropbtn" >Loại
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="index.php?page_layout=loaiGiaDung">Gia Dụng & Đời Sống</a>
            <a href="index.php?page_layout=loaiSucKhoe">Sức Khỏe & Làm Đẹp</a>
            <a href="index.php?page_layout=loaiMeVaBe">Mẹ & Bé </a>
            <a href="index.php?page_layout=loaiBachHoa">Bách Hóa Tổng Hợp </a>
          </div>
        </div>
        
        <a href="index.php?page_layout=feedBack">FeedBack Khách Hàng</a>
        <a href="index.php?page_layout=notications">Trả Lời Khách Hàng</a>
        <a href="index.php?page_layout=donHang">Đơn Hàng</a>
        
      </div>
          </div>

         <div class="card-body">
         <table class="table table-striped">
            <thead>
                <tr style = "color: #0088FF">
                    <th>#</th>
                    <th>Tên sản phẩm </th>
                    <th>Ảnh sản phẩm </th>
                    <th>Giá sản phẩm </th>
                    <th> Danh mục </th>
                    <th> Loại </th>
                    <th> Xuất xứ  </th>
                    <th> Thương hiệu  </th>
                    <th> Mô tả  </th>
                </tr>
            </thead> 
            <tbody>
            <?php
            $i = 1;
                while($row = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['nameProduct']; ?></td>

                        <td>
                            <img style="width: 100px;" src="img/<?php echo $row['imageProduct']; ?>">
                        </td>

                        <td><?php echo $row['priceProduct']; ?></td>                      
                        <td><?php echo $row['nameCategory']; ?></td>
                        <td><?php echo $row['nameType']; ?></td>
                        <td><?php echo $row['originProduct']; ?></td>
                        <td><?php echo $row['branchProduct']; ?></td>
                        <td><?php echo $row['contentProduct']; ?></td>
                        <td>
                        <a href="index.php?page_layout=sua&id=<?php echo $row['idProduct']; ?>"><i class="fas fa-wrench"></i></a>
                        </td>
                        <td>
                            <a onclick="return Del('<?php echo $row['nameProduct'];?>')" style = "color: red"  href="index.php?page_layout=xoa&id=<?php echo $row['idProduct']; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                        
                </tr>
                <?php } ?>
            </tbody>
         </table>
         <a class="btn btn-primary" href="index.php?page_layout=themBachHoa">Thêm mới</a>

         </div>
    </div>
</div> 

<script>
   function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + "?");
   }
</script>

<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  background-color: #333;
  font-family: Arial;
}

.navbar a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.dropdown {
  float: left;
}

.navbar a.active {
  background-color: #0088FF;
  color: white;
}


/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}
/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #0088FF;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

.icon-bar {
  width: 50px; /* Set a specific width */
}

.icon-bar a {
  display: block; /* Make the links appear below each other instead of side-by-side */
  text-align: center; /* Center-align text */
  padding: 16px; /* Add some padding */
  transition: all 0.3s ease; /* Add transition for hover effects */
  color: white; /* White text color */
  font-size: 36px; /* Increased font-size */
}

.icon-bar a:hover {
  background-color: #000; /* Add a hover color */
}
</style>

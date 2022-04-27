<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php
    $sql = "SELECT * FROM customer";
    $query = mysqli_query($conn, $sql);

?>

<div class="container-fluid">
    <div class="card" style = "color: #0088FF">
        <div class="card-header" style = "text-align: center">
            <h2>Quản lý người dùng</h2>
         </div>
         <div class="navbar">
         <div class="icon-bar">
          <a  href="index.php?page_layout=trangChu"><i class="fa fa-home"></i></a>
          </div>
         <div class="dropdown">
          <button class="dropbtn">Sản Phẩm
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="index.php?page_layout=danhSachGiaDung">Gia Dụng & Đời Sống</a>
            <a href="index.php?page_layout=danhSachSucKhoe">Sức Khỏe & Làm Đẹp</a>
            <a href="index.php?page_layout=danhSachMeVaBe">Mẹ & Bé </a>
            <a href="index.php?page_layout=danhSachBachHoa">Bách Hóa Tổng Hợp </a>
          </div>
        </div>
        <a class="active" href="index.php?page_layout=quanLyUser">Khách Hàng</a>
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
        
      </div>
          </div>
         <div class="card-body">
         <table class="table table-striped">
            <thead>
                <tr style = "color: #0088FF">
                    <th>#</th>
                    <th>Tên người dùng </th>
                    <th>Tài khoản </th>
                    <th>Mật khẩu </th>
                    <th>Số điện thoại </th>
                    <th> Ngày sinh</th>
                    <th> Email </th>
                    <th> Giới tính </th>
                    <th> Avatar  </th>
                    <th>Địa chỉ</th>
                </tr>
            </thead> 
            <tbody>
            <?php
            $i = 1;
                while($row = mysqli_fetch_assoc($query)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['nameCustomer']; ?></td>
                        <td><?php echo $row['accountCustomer']; ?></td>
                        <td><?php echo $row['passwordCustomer']; ?></td>
                        <td><?php echo $row['phoneCustomer']; ?></td>
                        <td><?php echo $row['dobCustomer']; ?></td>
                        <td><?php echo $row['emailCustomer']; ?></td>
                        <td><?php echo $row['genderCustomer']; ?></td>
                        <td>
                            <img style="width: 100px;" src="img/<?php echo $row['avatarCustomer']; ?>">
                        </td>
                        <td><?php echo $row['mainAddress']; ?></td>
                        <td>
                            <a onclick="return Del('<?php echo $row['nameCustomer'];?>')"  style = "color: red"  href="index.php?page_layout=xoaUser&id=<?php echo $row['idCustomer']; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                        
                </tr>
                <?php } ?>
            </tbody>
         </table>

         </div>
    </div>
</div> 

<script>
   function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa người d: " + name + "?");
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
<?php
    $sql_brand = "SELECT * FROM category";
    $query_brand = mysqli_query($conn, $sql_brand);

    if(isset($_POST['sbm'])){
        $nameCategory = $_POST['nameCategory'];

    
        $sql = "INSERT INTO category (nameCategory)
        VALUES ('$nameCategory')";
            $query = mysqli_query($conn, $sql);
            header ('location: index.php?page_layout=danhMuc');
    }

?>                            I

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Thêm danh mục mới </h2>
         </div>
         <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="nameCategory" class="form-control" required >
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit"> Thêm </button>
             </form>
             
         </div>
    </div>
</>
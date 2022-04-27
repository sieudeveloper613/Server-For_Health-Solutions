<?php
    $id = $_GET['id']; 

    $sql_brand = "SELECT * FROM product";
    $query_brand = mysqli_query($conn, $sql_brand);

    $sql_up = "SELECT * FROM category where idCategory = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['btnSave'])){
        $nameCategory = $_POST['nameCategory'];

        $sql = "UPDATE category SET nameCategory = '$nameCategory' WHERE idCategory = $id";
            $query = mysqli_query($conn, $sql);
            // move_uploaded_file($image_tmp, 'img/'.$image);
            header ('location: index.php?page_layout=danhMuc');
    }

?>                            I

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Sửa danh mục </h2>
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="nameCategory" class="form-control" required value="<?php echo $row_up['nameCategory']; ?> ">
                    </div>
                    <button name="btnSave" class="btn btn-success" type="submit"> Sửa </button>
             </form>
                
         </div>
    </div>
</>
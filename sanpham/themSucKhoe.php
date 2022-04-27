<?php
    $sql_brand = "SELECT * FROM category WHERE  idCategory = 2";
    $query_brand = mysqli_query($conn, $sql_brand);
    $sql_brand1 = "SELECT * FROM types WHERE idCategory = (SELECT idCategory FROM Category WHERE idCategory = 2)";
    $query_brand1 = mysqli_query($conn, $sql_brand1);

    if(isset($_POST['sbm'])){
        $nameProduct = $_POST['nameProduct'];

        $imageProduct = $_FILES['imageProduct']['name'];
        $imageProduct_tmp = $_FILES['imageProduct']['tmp_name'];
               
        $priceProduct = $_POST['priceProduct'];
        $idCategory = $_POST['idCategory'];
        $idType = $_POST['idType'];
        $originProduct = $_POST['originProduct'];
        $branchProduct = $_POST['branchProduct'];
        $contentProduct = $_POST['contentProduct'];

        $sql = "INSERT INTO product (nameProduct, imageProduct, priceProduct, idCategory, idType, originProduct, branchProduct, contentProduct)
        VALUES ('$nameProduct', '$imageProduct', $priceProduct,'$idCategory' ,'$idType', '$originProduct', '$branchProduct', '$contentProduct')";
            $query = mysqli_query($conn, $sql);
            move_uploaded_file($imageProduct_tmp, 'img/'.$imageProduct);
            header ('location: index.php?page_layout=danhSachSucKhoe');
    }

?>                            

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Thêm sản phẩm Sức Khỏe & Làm Đẹp </h2>
         </div>
         <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="nameProduct" class="form-control" required >
                    </div>
                    
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label> <br>
                        <input type="file" name="imageProduct">
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm </label>
                        <input type="number" name="priceProduct" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label for="">Danh Mục</label>
                        <select class="form-control" name="idCategory">
                        <?php
                            while($row_brand = mysqli_fetch_assoc ($query_brand)){?>
                                <option value = "<?php echo $row_brand['idCategory']; ?>"><?php echo $row_brand['nameCategory']; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Loại</label>
                        <select class="form-control" name="idType">
                            
                        <?php
                            while($row_brand1 = mysqli_fetch_assoc ($query_brand1)){?>
                                <option value = "<?php echo $row_brand1['idType']; ?>"><?php echo $row_brand1['nameType']; ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Xuất xứ</label>
                        <input type="text" name="originProduct" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Thương hiệu</label>
                        <input type="text" name="branchProduct" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <input type="text" name="contentProduct" class="form-control" required >
                    </div>

                    
                    <button name="sbm" class="btn btn-success" type="submit"> Thêm </button>
             </form>
             
         </div>
    </div>
</>
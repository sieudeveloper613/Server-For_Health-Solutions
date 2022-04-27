<?php
    $id = $_GET['id']; 

    $sql_brand = "SELECT * FROM category ";
    $query_brand = mysqli_query($conn, $sql_brand);

    $sql_brand1 = "SELECT * FROM types ";
    $query_brand1 = mysqli_query($conn, $sql_brand1);

    $sql_up = "SELECT * FROM product where idProduct = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['btnSave'])){
        $nameProduct = $_POST['nameProduct'];

         if($_FILES['imageProduct']['name']==''){
            $imageProduct = $row_up['imageProduct'];
        }else{
            $imageProduct = $_FILES[ 'imageProduct']['name'];
            $imageProduct_tmp = $_FILES['imageProduct']['tmp_name'];
            move_uploaded_file($imageProduct_tmp, 'img/'.$imageProduct);
        }
        $priceProduct = $_POST['priceProduct'];
        $idCategory = $_POST[ 'idCategory'];
        $idType = $_POST['idType'];
        $originProduct = $_POST['originProduct'];
        $branchProduct = $_POST['branchProduct'];
        $contentProduct = $_POST['contentProduct'];
        

        $sql = "UPDATE product SET nameProduct = '$nameProduct', imageProduct = '$imageProduct', 
        priceProduct = $priceProduct, idType = '$idType',
        originProduct = '$originProduct', branchProduct = '$branchProduct', contentProduct = '$contentProduct', idCategory = $idCategory WHERE idProduct = $id";
            $query = mysqli_query($conn, $sql);
            // move_uploaded_file($imageProduct_tmp, 'img/'.$imageProduct);
            header ('location: index.php?page_layout=trangChu');
    }

?>                            

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Sửa sản phẩm </h2>
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="nameProduct" class="form-control" required value="<?php echo $row_up['nameProduct']; ?> ">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label> <br>
                        <input type="file" name="imageProduct">
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm </label>
                        <input type="number" name="priceProduct" class="form-control" required value="<?php echo $row_up['priceProduct']; ?> ">
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
                        <input type="text" name="originProduct" class="form-control" required value="<?php echo $row_up['originProduct']; ?> " >
                    </div>

                    <div class="form-group">
                        <label for="">Thương hiệu</label>
                        <input type="text" name="branchProduct" class="form-control" required value="<?php echo $row_up['branchProduct']; ?> " >
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <input type="text" name="contentProduct" class="form-control" required value="<?php echo $row_up['contentProduct']; ?> " >
                    </div>

                    
                    <button name="btnSave" class="btn btn-success" type="submit"> Sửa </button>
             </form>
                
         </div>
    </div>
</>
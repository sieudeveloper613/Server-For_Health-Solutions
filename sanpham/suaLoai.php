<?php
    $id = $_GET['id']; 

    $sql_brand = "SELECT * FROM category";
    $query_brand = mysqli_query($conn, $sql_brand);

    $sql_up = "SELECT * FROM types where idType = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['btnSave'])){
        $nameType = $_POST['nameType'];
        $idCategory = $_POST['idCategory'];

        $sql = "UPDATE types SET nameType = '$nameType', idCategory = '$idCategory' WHERE idType = $id";
            $query = mysqli_query($conn, $sql);
            // move_uploaded_file($image_tmp, 'img/'.$image);
            header ('location: index.php?page_layout=loaiBachHoa');
    }

?>                            

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Sửa Loại </h2>
         </div>
         <div class="card-body">
             <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên Loại</label>
                        <input type="text" name="nameType" class="form-control" required value="<?php echo $row_up['nameType']; ?> ">
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
                    <button name="btnSave" class="btn btn-success" type="submit"> Sửa </button>
             </form>
                
         </div>
    </div>
</>
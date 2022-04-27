<?php
    $sql_brand = "SELECT * FROM category";
    $query_brand = mysqli_query($conn, $sql_brand);

    if(isset($_POST['sbm'])){
        $nameType = $_POST['nameType'];
        $idCategory = $_POST['idCategory'];

    
        $sql = "INSERT INTO types (nameType, idCategory)
        VALUES ('$nameType', '$idCategory')";
            $query = mysqli_query($conn, $sql);
            header ('location: index.php?page_layout=loaiBachHoa');
    }

?>                            I

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Thêm loại mới </h2>
         </div>
         <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Tên loại</label>
                        <input type="text" name="nameType" class="form-control" required >
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
                    <button name="sbm" class="btn btn-success" type="submit"> Thêm </button>
             </form>
             
         </div>
    </div>
</>
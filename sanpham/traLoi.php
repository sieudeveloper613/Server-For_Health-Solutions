<?php
     $id = $_GET['id'];


     $sql_brand = "SELECT * FROM customer";
     $query_brand = mysqli_query($conn, $sql_brand);
 
     $sql_up = "SELECT * FROM feedback where idFeedback = $id";
     $query_up = mysqli_query($conn, $sql_up);
     $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $idFeedback = $_POST['idFeedback'];
        $idCustomer = $_POST['idCustomer'];
        $nameCustomer = $_POST['nameCustomer'];
        $titleFeedback = $_POST['titleFeedback'];
        $titleNotification = $_POST['titleNotification'];
        $contentNotification = $_POST['contentNotification'];
        $reg_date = $_POST['reg_date'];

    
        $sql = "INSERT INTO notifications (idFeedback, idCustomer, nameCustomer, titleFeedback, titleNotification, contentNotification, reg_date)
        VALUES ('$idFeedback', '$idCustomer', '$nameCustomer', '$titleFeedback', '$titleNotification', '$contentNotification', '$reg_date')";
            $query = mysqli_query($conn, $sql);
            header ('location: index.php?page_layout=notications');
    }

?>                            I

 <div class="container-fluid">
    <div class="card">
         <div class="card-header">
             <h2>Trả Lời </h2>
         </div>
         <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Mã feedback: </label>
                        <input type="text" name="idFeedback" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Mã khách hàng</label>
                        <input type="text" name="idCustomer" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Gửi đến</label>
                        <input type="text" name="nameCustomer" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề feedback của khách</label>
                        <input type="text" name="titleFeedback" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề gửi</label>
                        <input type="text" name="titleNotification" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <input type="text" name="contentNotification" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Ngày gửi: </label>
                        <input type="date" name="reg_date" class="form-control" required >
                    </div>

                    <button name="sbm" class="btn btn-success" type="submit"> Gửi </button>
             </form>
             
         </div>
    </div>
</>
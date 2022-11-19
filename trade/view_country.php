<?php require_once "inc/header.php";
$getData = new GetData();
?>
<?php 
    // if(isset($_GET['status'])){
    //   $id =  $_GET['status'];
    //   $getData->table_update('tblcountry_bit',array('status'=>0));
    // }
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php if ($_SESSION['admin']['role'] == "admins") :
            
        ?>
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Sno</th>
                        <th>Country </th>
                        <th>Flage </th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $data =  $getData->query("SELECT * FROM tbl_country ORDER BY id DESC");
                    $count=1;
                ?>
                <?php foreach($data as $row):  ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?=  $row['name'] ?></td>
                        <td> <img src="../images/flage/<?= $row['flage'] ?>" alt=""></td>
                        <td> <a href="view-country.php?status=<?= $row['id'] ?>" class="btn <?= ($row['status']==1?'btn-success':'btn-danger')?>"> <?= ($row['status']==1?'Active':'Deacitve')  ?></a></td>
                        <td> 
                         <a href="view-country.php?delete=<?= $row['id'] ?>" class="btn btn-danger" >DELETE</a>
                        </td>
                    </tr>
                    <?php endforeach  ?>
                </tbody>
                
            </table>

        <?php endif ?>




        <!--  ********************User panel Section End*************************** -->
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php require_once "inc/footer.php"; ?>
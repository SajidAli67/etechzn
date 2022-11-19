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
                        <th>Category </th>
                        <th>Country </th>
                        <th>Country 2 </th>
                        <th>Instust Country 1</th>
                        <th>Instust Country 2</th>
                        <th>Starting Time</th>
                        <th>Ending Time</th>
                        <th>Status</th>
                        <td> action </td>
                    </tr>
                </thead>
                <tbody>
                <?php $data =  $getData->query("SELECT b.*, c.cat_name FROM   tbl_bet as b INNER JOIN bet_category as c ON c.id= b.cat_id ORDER BY id DESC");
                    $count=1;
                ?>
                <?php foreach($data as $row):  ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?=  $row['cat_name'] ?></td>
                        <td><?=  $row['country1st_id'] ?></td>
                        <td><?=  $row['country2nd_id'] ?></td>
                        <td><?=  $row['interest_1st'] ?></td>
                        <td><?=  $row['interest_2nd'] ?></td>
                        <td><?=  $row['start_time']; ?></td>
                        <td><?=  $row['end_time']; ?></td>
                        <td><?=  $row['win_status']; ?></td>
                        <td> <a href="view-bit.php?status=<?= $row['id'] ?>" class="btn <?= ($row['status']==1?'btn-success':'btn-danger')?>"> <?= ($row['status']==1?'Active':'Deacitve')  ?></a>
                         <a href="view-bit.php?delete=<?= $row['id'] ?>" class="btn btn-danger" >DELETE</as> </td>
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
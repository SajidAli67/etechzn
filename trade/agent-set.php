<?php require_once "inc/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php if ($_SESSION['admin']['role'] == "admins") :
            $getData = new GetData();
        ?>
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Sno</th>
                        <th>agent name </th>
                        <th>agent name </th>
                        <th> Approve Status </th>
                        <td> action </td>
                    </tr>
                </thead>
                <tbody>
                <?php $data =  $getData->query("SELECT g.*,a.aId as user_id,a.approved FROM tbl_agent as g INNER JOIN  tbl_admin as a ON g.id=a.agent_id ORDER BY id DESC");
                    $count=1;
                ?>
                <?php foreach($data as $row):  ?>
                    <tr>
                        <td><?= $count++; ?></td>
                        <td><?=  $row['name'] ?></td>
                        <td><?=  $row['country']; ?></td>
                        <td> <a href="../action/changeing.php?approve=<?= $row['user_id'] ?>" class="btn <?= ($row['approved']==1?'btn-success':'btn-danger')?>"> <?= ($row['approved']==1?'approved':'not approved')  ?></a></td>
                        <td> <a href="../action/changeing.php?delete=<?= $row['user_id'] ?>" class="btn btn-danger" >DELETE</as> </td>
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
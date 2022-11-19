<?php require_once "inc/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php if ($_SESSION['admin']['role'] == "admins") :
        $msg = '';
            $getData = new GetData();
            if(isset($_POST['submit'])){
                $img = $getData->flage($_FILES['flage'],'../images/flage/',$_POST['country']);
                $data = array(
                    'name'=>$_POST['country'],
                    'flage'=>$img,
                    'status'=>1
                );
                $insert = $getData->insert_data('tbl_country',$data);
                if($insert){
                   echo $msg .= "<div class='text-success'> <strong>Succcess</strong>: Country Adding  Successful</div>";
                }
                else{
                    echo $msg .= "<div class='text-danger'> <strong>Error</strong>: Country Adding  is not successful.. </div>";
                }
            }
        ?>
            <form action="add_country.php" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="country" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country</span>
                            </div>
                            <input type="file" class="form-control" placeholder="" name="flage" required>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                    </div>
                </div>

            </form>

        <?php endif ?>




        <!--  ********************User panel Section End*************************** -->
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php require_once "inc/footer.php"; ?>
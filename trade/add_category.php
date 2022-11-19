<?php require_once "inc/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php if ($_SESSION['admin']['role'] == "admins") :
        $msg = '';
            $getData = new GetData();
            if(isset($_POST['submit'])){
                $data = array(
                    'cat_name'=>$_POST['category'],
                    'status'=>1
                );
                $insert = $getData->insert_data('bet_category',$data);
                if($insert){
                   echo $msg .= "<div class='text-success'> <strong>Succcess</strong>: Country Adding  Successful</div>";
                }
                else{
                    echo $msg .= "<div class='text-danger'> <strong>Error</strong>: Country Adding  is not successful.. </div>";
                }
            }
        ?>
            <form action="add_category.php" method="Post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cateogy</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="category" required>
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
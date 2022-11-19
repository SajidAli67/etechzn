<?php require_once "inc/header.php"; ?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <?php if ($_SESSION['admin']['role'] == "admins") :
        $msg = '';
            $getData = new GetData();
            if(isset($_POST['submit'])){
                $data = array(
                    'cat_id' =>$_POST['category'],
                    'country1st_id'=>$_POST['country1'],
                    'country2nd_id'=>$_POST['country2'],
                    'interest_1st'=>$_POST['country1_intr'],
                    'interest_2nd'=>$_POST['country2_intr'],
                    'start_time'=>$_POST['starting_time'],
                    'end_time'=>$_POST['ending_time'],
                    'win_status'=>'padding',
                    'status'=>1
                );
               
                $insert = $getData->insert_data('tbl_bet',$data);
                if($insert){
                   echo $msg .= "<div class='text-success'> <strong>Succcess</strong>: Country Bit Adding  Successful</div>";
                }
                else{
                    echo $msg .= "<div class='text-danger'> <strong>Error</strong>: Country Bit is not successful.. </div>";
                }

            }
        ?>
            <form action="set-bit.php" method="Post">
                <div class="row">
                <div class="col-md-12">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cateogry</span>
                            </div>
                            <?php $category =  $getData->listOfItem('bet_category');
                                ?>
                                <select class="form-control" name="category">
                                    <option value="">Select Category</option>
                                    <?php foreach($category as $cat){?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['cat_name'] ?></option>
                                    <?php } ?>
                                </select>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country</span>
                            </div>
                            <?php $country =  $getData->listOfItem('tbl_country');
                                ?>
                                <select class="form-control" name="country1">
                                    <option value="">Select Country</option>
                                    <?php foreach($country as $cou){?>
                                    <option value="<?= $cou['id'] ?>"><?= $cou['name'] ?></option>
                                    <?php } ?>
                                </select>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country</span>
                            </div>
                            <?php $country =  $getData->listOfItem('tbl_country');
                                ?>
                                <select class="form-control" name="country2">
                                    <option value="">Select Country</option>
                                    <?php foreach($country as $cou){?>
                                    <option value="<?= $cou['id'] ?>"><?= $cou['name'] ?></option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country Interest</span>
                            </div>
                            <input type="number" class="form-control" placeholder="" name="country1_intr" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Country Interest</span>
                            </div>
                            <input type="number" class="form-control" placeholder="" name="country2_intr" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Starting Time</span>
                            </div>
                            <input type="date" class="form-control" placeholder="" name="starting_time" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Ending Time</span>
                            </div>
                            <input type="date" class="form-control" placeholder="" name="ending_time" required>
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
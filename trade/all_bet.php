<?php require_once "inc/header.php";
if ($_SESSION['admin']['role'] == "user") :
    $getData = new GetData();

?>
    <style>
        .flage-img {
            width: 80px;
            height: 50px;
            text-align: center;
        }
    </style>
    <div class="main-panel">
        <img src="../images/bet_banner.jpg" alt="" class="img-fluid">
        <div class="content-wrapper">
            <div class="text-right m-3">
                <a href="all_bet_history.php" class="btn btn-success"> View Betting History </a>
            </div>
            <?php $bet_all =  $getData->query('SELECT * FROM tbl_bet where status = 1 ORDER BY id DESC');
            foreach ($bet_all as $bet) :
            ?>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-4 ">
                                <?php $country1 = $getData->getCountry($bet['country1st_id']);
                                $country2 = $getData->getCountry($bet['country2nd_id']);
                                $get_id = $getData->specificItem('bet_user_history','bet_id',$bet['id']);
                                ?>
                                <img src="../images/flage/<?= $country1['flage'] ?>" alt="" class="flage-img rounded mx-auto d-block">
                                <button class="btn btn-success mt-3" id="btn1" bet="<?= $bet['id'] ?>" country="<?= $country1['id'] ?>"><?= $country1['name'] ?></button>
                            </div>
                            <div class="col-4 ">
                                    <?php if(empty($get_id)){?>
                                        <h4 id="select_country<?= $bet['id'] ?>">No Select</h4>
                                    <?php  } else{ ?>
                                        <h4><?= $getData->getCountry($get_id[0]['country_select_id'],'name')['name'] ?></h4>

                                    <?php } ?>
                               
                                <!--  -->
                                <form action="ajax-action/set_bet.php" method="post" id="formData<?= $bet['id'] ?>">
                                    <div class="form-group" style="width:300px;margin:auto ;">
                                        <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['admin']['user_id'] ?>">
                                        <input type="hidden" name="bet_id" id="bet_id" value="<?= $bet['id'] ?>">
                                        <input type="hidden" name="country" id="country_select_id<?= $bet['id'] ?>" value="0">
                                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <?php if(empty($get_id)){?>
                                        <button class="btn btn-primary mt-4" type="submit" bet_id="<?= $bet['id'] ?>" id="submit">Submit</button>
                                        <p id="message<?= $bet['id'] ?>" class="text-success mt-1" style="font-size: 14px;" > </p>
                                    <?php  } else{ ?>
                                        <p class="text-success mt-1" style="font-size: 14px;" > You bet On this your select Country is <?= $getData->getCountry($get_id[0]['country_select_id'],'name')['name'] ?> </p>
                                        <?php  } ?>
                                    
                                    
                                </form>
                            </div>
                            <div class="col-4">
                                <img src="../images/flage/<?= $country2['flage'] ?>" alt="" class="flage-img rounded mx-auto d-block">
                                <button class="btn btn-success mt-3" bet="<?= $bet['id'] ?>" country="<?= $country2['id'] ?>"><?= $country2['name'] ?></button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach  ?>
        </div>
    </div>
<?php endif ?>
<?php require_once "inc/footer.php"; ?>

<script>
    $(document).on('click', '.btn', function() {
        const val = $(this).attr('country');
        const countryName = $(this).text();
        const bet = $(this).attr('bet')
        $('#country_select_id' + bet).val(val)
        $('#select_country' + bet).html(countryName)
    })

$(document).on('click','#submit',function(e){
        e.preventDefault()
        const bet_id  = $(this).attr('bet_id');
        const data = $('#formData'+bet_id).serializeArray()
        const action = $('#formData'+bet_id).attr('action')
        console.log(data[3]['value'])
        if(data[3]['value']==0 || data[3]['value']==''){
            $('#message' + bet_id).html('Enter Amount');
        }
        else if(data[2]['value']==0){
            $('#message' + bet_id).html('Select Contry');
        }
        else{
            $.ajax({
            url: action,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(data) {
                console.log(data)
                if (data.status) {
                    $('#message' + bet_id).html(data.message);
                    $('#formData'+bet_id)[0].reset()
                } else {
                    $('#message' + bet_id).html(data.message);
                }
            }
            })
        }
        
    })
</script>
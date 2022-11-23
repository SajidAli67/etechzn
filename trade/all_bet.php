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
            
            <?php $bet_all =  $getData->query('SELECT * FROM tbl_bet where status = 1 ORDER BY id DESC');
            foreach ($bet_all as $bet) :
            ?>



                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-4 ">
                                <?php $country1 = $getData->getCountry($bet['country1st_id']);
                                      $country2 = $getData->getCountry($bet['country2nd_id']);
                                ?>
                                <img src="../images/flage/<?= $country1['flage'] ?>" alt="" class="flage-img rounded mx-auto d-block">
                                <button class="btn btn-success mt-3" id="btn1" country="<?= $country1['id'] ?>"><?= $country1['name'] ?></button>
                            </div>
                            <div class="col-4 ">
                                    <h4 id="select_country">No Select</h4>
                                <form action="ajax-action/set_bet.php" method="post" id="formData">
                                    <div class="form-group" style="width:300px;margin:auto ;">
                                         <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['admin']['user_id'] ?>">
                                         <input type="hidden" name="bet_id" id="bet_id" value="<?= $bet['id'] ?>">
                                         <input type="hidden" name="country" id="country_select_id" value="0">
                                        <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                                    </div>
                                    <button class="btn btn-primary mt-4" type="submit" id="submit">Submit</button>
                                    <p id="message" class="text-success mt-1"></p>
                                </form>
                            </div>
                            <div class="col-4">
                                <img src="../images/flage/<?= $country2['flage'] ?>" alt="" class="flage-img rounded mx-auto d-block">
                                <button class="btn btn-success mt-3"  country="<?= $country2['id'] ?>"><?= $country2['name'] ?></button>
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
    $(document).on('click','.btn',function(){
        var val = $(this).attr('country');
        var countryName = $(this).text();
        $('#country_select_id').val(val)
        $('#select_country').html(countryName)

    })
    $(document).ready(function(){
        $('#submit').click(function(e){
            e.preventDefault()
            var data = $('#formData').serialize();
            var action = $('#formData').attr('action')
            console.log(action)
            $.ajax({
                    url: action,
                    type: 'post',
                    dataType: 'json',
                    data: data, 
                    success: function(data) {
                        console.log(data.status)
                     if(data.status){
                        $('#message').html(data.message);
                     }
                     else{
                        $('#message').html(data.message);
                     }

                    }
                })
        })
    })
</script>
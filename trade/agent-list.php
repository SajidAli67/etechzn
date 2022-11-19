
<?php require_once "inc/header.php";
if ($_SESSION['admin']['role'] == "user") :
  $getAgents = $getData->listOfItem('tbl_agent');
?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div id="msg" class="text-success"></div>
        <?php
        foreach ($getAgents as $data) {
          $id = $data["id"];
          $name = $data["name"];
          $country = $data['country'];
          $pay_method1   = $data['pay_method1'];
          $pay_method2 = $data['pay_method2'];
          $pay_method3 = $data['pay_method3'];
        ?>
          <div class="col-xl-4 col-sm-6 grid-margin stretch-card" id="agent-list">
            <div class="card" align="center">
              <div class="card-body">
                <h4 class="pricing-modern-title"> Agent : <?php echo  $name ?></h4>
                <table class="table" cellspacing="center">
                  <tr>
                    <td>Country</td>
                    <td><?php echo $country; ?></td>
                  </tr>
                  <tr>
                    <td>Pyment Method 1</td>
                    <td><?php echo  $pay_method1; ?> </td>

                  </tr>
                  <tr>
                    <td>Pyment Method 2</td>
                    <td><?php echo  $pay_method2; ?></td>

                  </tr>
                  <tr>
                    <td>Pyment Method 3</td>
                    <td><?php echo  $pay_method3 ?></td>

                  </tr>
                </table>
              </div>
              <div class="btn-group">
                <button type="button" id="shortTrade" data-attr="<?php echo $id; ?>" class="btn btn-danger">Buy Coin</button>
                <a href="messanger.php?user_id=<?= $data['id'] ?>" type="button" id="longTrade" class="btn btn-success" target="_blank">Send Massage</a>
                <button type="button" id="longTrade" class="btn btn-info">Long</button>
              </div>
            </div>
            <!-- Information card end -->


          </div>


        <?php
        }

        ?>
      </div>

    <?php endif; ?>
    <?php require_once "inc/footer.php"; ?>
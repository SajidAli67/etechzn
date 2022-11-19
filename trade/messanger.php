<?php require_once "inc/header.php";?>
<?php require_once "../class/core.php"; ?>
<?php require_once "../class/getSetClass.php"; ?>
<?php
$id = $_SESSION['aId'];
$getData = new GetData();
$agent_id = $_GET['user_id'];
if ($_SESSION['admin']['role'] == "user" && $agent_id != 0) {

    $getAgents = $getData->specificItem('tbl_agent', 'id', $agent_id);
    $name = $getAgents[0]['name'];
    $sender_id = $_SESSION['admin']['aId'];
    $reciver_id = $agent_id;
    $allAgents = $getData->listOfItem('tbl_agent');
} elseif ($_SESSION['admin']['role'] == "agent" && $agent_id != 0) {
    $getAgents = $getData->query("SELECT m.* FROM `tbl_member` as m INNER JOIN tbl_admin as a on a.user_id = m.mId WHERE a.aId = '$agent_id'");
    $name =  $getAgents[0]['member_name'];
    $sender_id = $_SESSION['admin']['agent_id'];
    $reciver_id = $agent_id;
    $allAgents = $getData->listOfItem('tbl_agent');
} elseif ($agent_id == 0) {
    $getAgents = $getData->query('SELECT * FROM tbl_admin where user_id = 0 AND agent_id = 0');
    $name =  $getAgents[0]['username'];
    $allAgents = $getData->query('SELECT * FROM tbl_admin where user_id = 0 AND agent_id = 0');
    $reciver_id = 0;
    $sender_id = ($_SESSION['admin']['agent_id'] != 0 ? $_SESSION['admin']['agent_id'] : $_SESSION['admin']['aId']);
} elseif ($_SESSION['admin']['role'] == "admins") {
    $getAgents = $getData->query("SELECT m.* FROM `tbl_member` as m INNER JOIN tbl_admin as a on a.user_id = m.mId WHERE a.aId = '$agent_id'");
    $name =  $getAgents[0]['member_name'];
    $sender_id = 0;
    $reciver_id = $agent_id;
    $allAgents =  $getData->query("SELECT m.member_name as name , a.aId as id FROM `tbl_member` as m INNER JOIN tbl_admin as a on a.user_id = m.mId");
}
?>
<style>
    .dropdown-menu{
        background-color: #191C24 !important;
    }
</style>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" href="assets/images/favicon.png" />


<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">

        <!-- Page header start -->
        <div class="page-title mt-5">
            <div class="row gutters">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h5 class="title"><?= $name ?></h5>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-right">
                    <?php
                    if ($_SESSION['admin']['role'] == "admins") {
                    } else {
                        if ($agent_id == 0) { ?>

                            <a href="messanger.php?user_id=1" class="btn btn-primary m-3"> Chat with Agent</a>

                        <?php
                        } else { ?>
                            <a href="messanger.php?user_id=0" class="btn btn-primary m-3"> Chat with Admin</a>

                    <?php

                        }
                    }  ?>
                </div>
            </div>
        </div>
        <!-- Page header end -->

        <!-- Content wrapper start -->
        <div class="content-wrapper">

            <!-- Row start -->
            <div class="row gutters">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                    <div class="card m-0">

                        <!-- Row start -->
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                                <div class="users-container">
                                    <div class="chat-search-box">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="Search">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-info">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="users">
                                        <?php
                                        foreach ($allAgents as $data) :

                                        ?>
                                            <a href="messanger.php?user_id=<?= $data['id'] ?>">

                                                <li class="person <?= ($data['id'] == $agent_id ? 'active-user' : '')  ?>" data-chat="person1">
                                                    <div class="user">
                                                        <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                                                        <span class="status busy"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name"><?= ($agent_id == 0 ? $data['username'] : $data['name']) ?></span>
                                                        
                                                    </p>
                                                </li>
                                            </a>
                                        <?php endforeach  ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                <div class="selected-user">
                                    <span>To: <span class="name"><?= $name ?></span></span>
                                </div>
                                <div class="chat-container">
                                    <ul class="chat-box chatContainerScroll" id="data">
                                        
                                    </ul>
                                </div>
                                <div class="p-3">
                                    <form id="submit_form" method="POST">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group mt-3 mb-0">
                                                    <textarea class="form-control" rows="2" placeholder="Type your message here..." name="message" id="message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                            
                                                <input type="hidden" value="<?= $sender_id ?>" name="sender" id="sender_id" readonly>
                                                <input type="hidden" value="<?= $reciver_id ?>" name="reciver" id="reciver_id" readonly>
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <div class="file btn btn-lg btn-primary mt-4 ">
                                                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                        <input type="file" name="file" id="file" class="btn-upload" />
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mt-4 mb-0" id="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                </div>
                                                
                                                
                                                

                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                </div>

            </div>
            <!-- Row end -->

        </div>
        <!-- Content wrapper end -->
        <div style="display: none">
        <?php require_once "inc/footer.php"; ?>
        </div>
        
    </div>
    <link rel="stylesheet" href="inc/chat-css.css">
    <script type="text/javascript">
        $(document).ready(function() {
            function view() {
                var sender = $('#sender_id').val()
                var reciver = $('#reciver_id').val()
                $.ajax({
                    url: 'ajax-action/chat-all.php',
                    type: 'post',
                    data: {
                        sender: sender,
                        reciver: reciver
                    },
                    success: function(data) {
                        $('#data').html(data)
                    }
                })
            }
            view()
            $('#submit_form').on("submit", function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'ajax-action/chat.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        $('#message').val('');
                        $('#file').val('');
                        view()

                    }
                })
            })
        })
    </script>
</body>

</html>
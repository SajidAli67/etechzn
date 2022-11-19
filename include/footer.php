<!-- Footer -->
<style> footer {
    margin: auto;
    position: fixed;
    height: 100px;
    bottom: 0;
    width: 100%;
    background: #12151e;
    text-align: center;
    font-size: 10;
}
.btn {
    display: inline-block;
    font-weight: 100;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 10px;
    line-height: 1.5;
    border-radius: 6px;
    transition: all 0.15s ease-in-out;
}
p{
  font-size: 10px;
  color: #fff;
}
a{
  font-size: 10px;
}
</style>
<footer class="bg-dark text-center ">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-primary btn-floating m-1" id="footer-home" href="index.php" role="button"><p><i class="fa-sharp fa-solid fa-house"></i></p>Home</a>
      &nbsp;&nbsp;&nbsp;
      <!-- Google -->
     <a class="btn btn-primary btn-floating m-1" href="login.php" role="button"><p><i class="fa-solid fa-globe"></i></p>Trade</a>
&nbsp;&nbsp;&nbsp;
      <!-- Google -->
     <a class="btn btn-primary btn-floating m-1" href="login.php" role="button"><p><i class="fa-solid fa-user"></i></p>User</a>
      <!-- Linkedin -->&nbsp;&nbsp;&nbsp;
      <a class="btn btn-primary btn-floating m-1" href="#!" role="button"><p><i class="fa-solid fa-comments"></i></p>Chat</a>
      <!-- Github -->
    </section>
    <!-- Section: Social media -->


  </div>
  <!-- Grid container -->

</footer>

  </div>
    <div class="preloader"> 
      <div class="preloader-logo"><h3>Crypto Trade</h3></div>
      <div class="preloader-body">
        <div id="loadingProgressG">
          <div class="loadingProgressG" id="loadingProgressG_1"></div>
        </div>
      </div>
    </div>

  
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        function view() {
            //
            var sender = $('#sender_id').val()
            var reciver = $('#reciver_id').val()
           
           console.log('ok')
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
        $('#send').click(function() {
          var formData = new FormData();
            var message = $('#message').val()
            var sender = $('#sender_id').val()
            var reciver = $('#reciver_id').val()
            //var file =  formData.append('file', $('#file')[0].files[0]);
            $.ajax({
                url: 'ajax-action/chat.php',
                type: 'post',
                data: {
                    message: message,
                    sender: sender,
                    reciver: reciver
                },
                success: function(data) {
                    view()
                }
            })
        })
    })
</script>
  </body>
</html>
$(document).ready(function() {
$(".activePackage").click(function(){
    var id = $(this).data("attr");
    $("#packId").val(id);
})
$("#confirmPakage").click(function(e){
    e.preventDefault();
    var packId = $("#packId").val();
    $.ajax({
        url : 'ajax-action/activate-pack.php',
        type:'POST',
        data: $("#packageConfirmForm").serialize(),
        success:function(response){
            $("#msg").html(response);
        }

    })
})
  })
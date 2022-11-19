$(document).ready(function(){
	// alert('test');

$("#shortTrade").click(function(){
	$("#tradeType").val(1);
})
$("#longTrade").click(function(){
	$("#tradeType").val(2);
});

$('#shortTrade').click(function(){
	$('#trade_type').val('short')
})

// if ($("#tradeType").val()=="") {
// 	$("#msg").text("Select a Trade Type");
// 	return false;
// }
// else{
// 	return true;
// }
$("#confirmTrade").click(function(){
	$.ajax({
		url: 'ajax-action/binaryTradeVmin.php',
		type:'POST',
		data:$("#binaryitradeVminForm").serialize(),
		success:function(response){
			console.log(response)
			$("#msg").html(response);
			$("#trade_amount").val(0);
		}
	})
});
});
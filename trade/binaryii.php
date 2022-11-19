<!DOCTYPE html>
<html>
<head>
<title>jQuery Candlestick Chart</title>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script> 
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> 
<script type="text/javascript">
window.onload = function() {
$(".chartContainer").CanvasJSChart({
  title: {
    text: "Tata Motors Stock Prices Sep - 2014"
  },
  axisY: {
    includeZero: false,
    title: "Price (INR)"
  },
  axisX: {
    intervalType: "day",
    interval: 2,
    valueFormatString: "DD"
  },
  toolTip: { 
  content: "{x} Sep 2014 <br/> <strong>Prices (INR):</strong> <br/>Open: {y[0]}, Close: {y[3]} <br/> Low: {y[2]}, High: {y[1]}"
  },
  data: [
  {
    type: "candlestick",
    dataPoints: [
      {x:new Date(2014,08,01), y:[526.00, 529.45, 517.10, 519.85]},
      {x:new Date(2014,08,02), y:[518.00, 520.50, 512.00, 516.40]},
      {x:new Date(2014,08,03), y:[526.00, 530.50, 521.35, 522.65]},
      {x:new Date(2014,08,04), y:[522.65, 522.65, 509.00, 512.85]},
      {x:new Date(2014,08,05), y:[513.00, 516.50, 503.10, 506.35]},
      {x:new Date(2014,08,08), y:[510.00, 512.00, 503.00, 510.50]},
      {x:new Date(2014,08,09), y:[512.00, 518.15, 507.90, 517.25]},
      {x:new Date(2014,08,10), y:[514.90, 520.35, 512.50, 516.30]},
      {x:new Date(2014,08,11), y:[518.10, 519.95, 510.90, 514.10]},
      {x:new Date(2014,08,12), y:[514.50, 519.20, 514.00, 516.50]},
      {x:new Date(2014,08,15), y:[514.00, 515.50, 510.25, 512.25]},
      {x:new Date(2014,08,16), y:[510.00, 510.00, 495.00, 499.60]},
      {x:new Date(2014,08,17), y:[502.00, 509.00, 491.05, 506.85]},
      {x:new Date(2014,08,18), y:[508.00, 527.50, 500.95, 525.60]},
      {x:new Date(2014,08,19), y:[526.00, 528.95, 516.25, 519.00]},
      {x:new Date(2014,08,22), y:[514.00, 542.00, 514.00, 539.40]},
      {x:new Date(2014,08,23), y:[544.00, 544.50, 516.30, 517.80]},
      {x:new Date(2014,08,24), y:[519.00, 519.00, 506.25, 512.95]},
      {x:new Date(2014,08,25), y:[515.00, 515.00, 500.20, 503.55]},
      {x:new Date(2014,08,26), y:[501.00, 513.00, 492.75, 511.45]},
      {x:new Date(2014,08,29), y:[510.80, 515.40, 508.00, 510.75]}, 
      {x:new Date(2014,08,30), y:[511.50, 514.40, 501.25, 502.75]}  
    ]
  }
  ]
});
}
</script>
</head>
<body>
<div class="chartContainer" style="width: 100%; height: 300px"></div>
</body>
</html>
var _candlestickStream;

function CandlestickStream( symbol , interval )
{
    this.symbol = symbol;
    this.interval = interval;
    this.candlestickChart = new pingpoliCandlestickChart( "canvas" );
    this.webSocketConnected = false;
    this.webSocketHost = "wss://stream.binance.com:9443/ws/"+this.symbol+"@kline_"+this.interval;
    _candlestickStream = this;
}

CandlestickStream.prototype.start = function()
{
    // get a few recent candlesticks before starting the stream
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open( "GET" , "https://api.binance.com/api/v3/klines?symbol="+this.symbol.toUpperCase()+"&interval="+this.interval+"&limit=500" );
    xmlhttp.onreadystatechange = function()
    {
        if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) 
        {
            var json = JSON.parse( xmlhttp.responseText );

            for ( var i = 0 ; i < json.length ; ++i )
            {
                _candlestickStream.candlestickChart.addCandlestick( new pingpoliCandlestick( json[i][0] , json[i][1] , json[i][4] , json[i][2] , json[i][3] ) );
            }
            _candlestickStream.candlestickChart.addTechnicalIndicator( new MovingAverage( 5 , "#ffff00" , 2 ) );
            _candlestickStream.candlestickChart.draw();

            // start the websocket stream
            if ( !_candlestickStream.webSocketConnected )
            {
                _candlestickStream.webSocket = new pingpoliWebSocket( _candlestickStream.webSocketHost , _candlestickStream.onOpen , _candlestickStream.onMessage , _candlestickStream.onClose );
                _candlestickStream.webSocket.setOnErrorCallback( _candlestickStream.onWebSocketError );
            }
        }
    }
    xmlhttp.setRequestHeader( 'Content-Type' , 'application/x-www-form-urlencoded' );
    xmlhttp.send();
}

CandlestickStream.prototype.close = function()
{
    this.webSocket.close();
}

CandlestickStream.prototype.onOpen = function()
{
    this.webSocketConnected = true;
    console.log( "websocket connected" );
}

CandlestickStream.prototype.onMessage = function( msg )
{
    var json = JSON.parse( msg.data );
    var candlestick = json.k;
    var lastChartCandlestick = _candlestickStream.candlestickChart.candlesticks[_candlestickStream.candlestickChart.candlesticks.length-1];
    // check if the candlestick already exists in the chart
    if ( lastChartCandlestick.timestamp == candlestick.t )
    {
        // update the candlestick
        _candlestickStream.candlestickChart.updateCandlestick( _candlestickStream.candlestickChart.candlesticks.length-1 , candlestick.o , candlestick.c , candlestick.h , candlestick.l );
    }
    else
    {
        // if the candlestick does not exist in the chart, add a new one
        _candlestickStream.candlestickChart.addCandlestick( new pingpoliCandlestick( candlestick.t , candlestick.o , candlestick.c , candlestick.h , candlestick.l ) );
    }
    // update the chart
    _candlestickStream.candlestickChart.draw();
}

CandlestickStream.prototype.onClose = function()
{
    if ( this.webSocketConnected )
    {
        this.webSocketConnected = false;
        console.log( "websocket closed" );
    }
}

CandlestickStream.prototype.onWebSocketError = function( event )
{
    this.webSocketConnected = false;
    console.log( "custom websocket error function:" );
    console.log( event );
}
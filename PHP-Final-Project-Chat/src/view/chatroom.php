<?php
require_once "../controller/global_actions.php";
require_once "../controller/message_service.php";
?>
<!DOCTYPE html>
<html><head>
  <title>InstaChat!</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="script\stomp.js"></script>
  <link rel="stylesheet" href="http://<?php echo $GLOBALS['path'];?>/\src\view\style\style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <style>
      .box {
			width: 540px;
			margin: auto;
			}

			.box div, .box input {
			border: 2px solid #1498d5;
			-moz-border-radius: 4px;
			border-radius: 4px;
			width: 100%;
			padding: 5px;
			margin: 3px 0 10px 0;
			margin-left:0;
			}

			code{
			padding:3px;
			font-family:"Arial";
			max-width:380px;
			}

			.box>div {
			border: 2px solid #11aaff;
			height: 300px;
			overflow: auto;
			}

			div p {
			display: inline-block;
			}

			#first div p {
			-moz-border-radius: 2px;
			border-radius: 2px;
			border: 4px solid white;
			font-family: 'Ubuntu', sans-serif;
			word-break: break-all;
			max-width:400px;
			}

			#second div {
			font-size: 0.8em;
			display:none;
			}
			h1{
			text-align:center;
			}
			h1 a{
			text-decoration:none;
			}

			.userMsg{
			    height:initial;
			}

			.userMsg span{
				padding:10px;
				margin:0 5px;
				border-radius:5px;
				font-family: 'Ubuntu', sans-serif;
			}

			.receiver span{
				background-color:tomato;
			}

			.receiver p{
			 border: 4px solid #eee !important;
			}

			.sender span{
				background-color:lightblue;
			}

			.receiver{
				display:flex;
				justify-content:flex-end;
				align-items:center;
				background-color:#eee;
			}
			.userInput{
			 margin-left:0;
			}
  </style>
<head>
  <title>Instachat with <?php echo $_GET['friend']?> </title>
  <link href="main.css" rel="stylesheet" type="text/css"/>
</head>
<body lang="en">
    <?php
      getWebsiteBanner();
      //getWelcome();
      getSiteMenu();
      ?>
    <h1><a href="../../index.php">Instachat Room!</a></h1>

    <div id="first" class="box">
      <div></div>
      <form class="userInput"><input autocomplete="off" placeholder="Type here..."></input></form>
    </div>

    <div id="second" class="box">
      <div></div>
    </div>

    <script>
    function print_start() {
      var div  = $('#first' + ' div');
      var number = lastMessages.length;
      if (number >= 5)
        number = 5;
      else
        number = lastMessages.length -1;

      for (var i = number; i >= 0; i-- ){
        var lastMessage = lastMessages[i];

          //p = (p === undefined) ? '' : JSON.stringify(p);
          div.append($('<div class="userMsg">').append($('<p class="userTag">').text(lastMessage.message)));
          if (lastMessage.authorUname == sender){
            $("#first .userMsg").last().addClass("sender").prepend($('<span>').text(sender));
          }
          else{
            $("#first .userMsg").last().addClass("receiver").append($('<span>').text(receiver));
          }
          div.scrollTop(div.scrollTop() + 10000);

      }

    };
    var lastMessages = <?php $messages = readLastMessages($_GET['user'], $_GET['friend']);
    echo $messages; ?>;
    console.log(lastMessages);
        var has_had_focus = false;
        var pipe = function(el_name, send) {
            var div  = $(el_name + ' div');
            var inp  = $(el_name + ' input');
            var form = $(el_name + ' form');
            var userMsgs = $(el_name + ' div div');

            // MAYBE foreach ret values for last messages in print and BOOM
            var print = function(m, p) {
                p = (p === undefined) ? '' : JSON.stringify(p);
                div.append($('<div class="userMsg">').append($('<p class="userTag">').text(m + ' ' + p)));
                div.scrollTop(div.scrollTop() + 10000);

            };

            if (send) {
                form.submit(function() {
                    send(inp.val());
                    inp.val('');
                    return false;
                });
            }
            return print;
        };

      // Stomp.js boilerplate
       //var client = Stomp.client('ws://' + window.location.hostname + ':15674/ws');
      var client = Stomp.client('ws://' + window.location.hostname + ':8085/ws');
      client.debug = pipe('#second');

      var sender = <?php echo '"'.$_GET['user'].'"'; ?>;
      var receiver = <?php echo '"'.$_GET['friend'].'"'; ?>;

      var queueSend = <?php echo '"'.$_GET['friend'].$_GET['user'].'";'; ?>
      var queueReceive = <?php echo '"'.$_GET['user'].$_GET['friend'].'";'; ?>

      var printTag= function(tag){
        console.log(tag);
        console.log($(".userMsg").last());

      };

      var print_first = pipe('#first', function(msg) {

      $.ajax({
        type: "POST",
        url: '../controller/request_handler.php',
        data: {
          'request':'saveMessage',
          'data':msg,
          'author':<?php echo '"'.$_GET['user'].'"'; ?>,
          'recipient':<?php echo '"'.$_GET['friend'].'"'; ?>
        },
        success: function(msg){
          console.log('successfully sent data to script ' + msg);
        }
      });

          client.send('/queue/'+queueSend, {"content-type":"text/plain", "sender":sender}, msg);
          client.send('/queue/'+queueReceive, {"content-type":"text/plain", "sender":sender}, msg);
      });

      var on_connect = function(x) {

          id = client.subscribe("/queue/"+queueReceive, function(d) {
              console.log(d.headers.sender+ " "+ sender);
              print_first(d.body);
              if (d.headers.sender == sender){
            	  $("#first .userMsg").last().addClass("sender").prepend($('<span>').text(sender));
              }
              else{
  				$("#first .userMsg").last().addClass("receiver").append($('<span>').text(receiver));
               }
          }), {"id":"test"};

          print_start();
      };
      var on_error =  function() {
        console.log('error');
      };

      //client.connect('guest', 'guest', on_connect, on_error, '/');
      client.connect('yevoli', 'yevoli', on_connect, on_error, '/');

      $('#first input').focus(function() {
          if (!has_had_focus) {
              has_had_focus = true;
              $(this).val("");
          }
      },{"queue":"test"});
    </script>
</body>
<footer>
    <?php getFooter();?>
</footer>
</html>

<!DOCTYPE html>
<html><head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="script\stomp.js"></script>
  <style>
      .box {
          width: 440px;
          float: left;
          margin: 0 20px 0 20px;
      }

      .box div, .box input {
          border: 1px solid;
          -moz-border-radius: 4px;
          border-radius: 4px;
          width: 100%;
          padding: 5px;
          margin: 3px 0 10px 0;
      }

      .box div {
          border-color: grey;
          height: 300px;
          overflow: auto;
      }

      div code {
          display: block;
      }

      #first div code {
          -moz-border-radius: 2px;
          border-radius: 2px;
          border: 1px solid #eee;
          margin-bottom: 5px;
      }

      #second div {
          font-size: 0.8em;
      }
  </style>
  <title>RabbitMQ Web STOMP Examples : Echo Server</title>
  <link href="main.css" rel="stylesheet" type="text/css"/>
</head><body lang="en">
    <h1><a href="index.html">RabbitMQ Web STOMP Examples</a> > Echo Server</h1>

    <div id="first" class="box">
      <h2>Received</h2>
      <div></div>
      <form><input autocomplete="off" value="Type here..."></input></form>
    </div>

    <div id="second" class="box">
      <h2>Logs</h2>
      <div></div>
    </div>

    <script>
        var has_had_focus = false;
        var pipe = function(el_name, send) {
            var div  = $(el_name + ' div');
            var inp  = $(el_name + ' input');
            var form = $(el_name + ' form');

            var print = function(m, p) {
                p = (p === undefined) ? '' : JSON.stringify(p);
                div.append($("<code>").text(m + ' ' + p));
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
      var client = Stomp.client('ws://' + window.location.hostname + ':15674/ws');
      client.debug = pipe('#second');

      var queueSend = <?php echo '"'.$_GET['friend'].$_GET['user'].'";'; ?>
      var queueReceive = <?php echo '"'.$_GET['user'].$_GET['friend'].'";'; ?>

      var print_first = pipe('#first', function(data) {
          client.send('/queue/'+queueSend, {"content-type":"text/plain"}, data);
          client.send('/queue/'+queueReceive, {"content-type":"text/plain"}, data);
      });
      var on_connect = function(x) {
          id = client.subscribe("/queue/"+queueReceive, function(d) {
               print_first(d.body);
          }), {"id":"test"};
      };
      var on_error =  function() {
        console.log('error');
      };
      client.connect('guest', 'guest', on_connect, on_error, '/');

      $('#first input').focus(function() {
          if (!has_had_focus) {
              has_had_focus = true;
              $(this).val("");
          }
      },{"queue":"test"});
    </script>
</body>
</html>
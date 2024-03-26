<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5a9316be1d87935533eb', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('admin');
    channel.bind('record-added', function(data) {
      var ele = document.getElementById('message');
      ele.innerHTML = 'Product ' + data.name + ' is added';
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p id="message"></p>
</body>
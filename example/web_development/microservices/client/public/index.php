<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Work Queue Client</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "http://microservices.lab.service",
        dataType: "json",
        success: function(data) {
          $("#content").html("<h3>" + data.title + "</h3><p>" + data.body + "</p>");
        }
      });
    });
  </script>
</head>
<body>
    <h1>Hi, there! ✨🌙</h2>
    <?php echo('<h2>This is the lab page.</h2>'); ?>
    <div id="content"></div>
</body>
</html>

<html>
  <head>
       <title>Image Similarity Measure </title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
       <style>
            .container {
              width:500px;
              margin: 0 auto;
            }
      </style>
  </head>
  <body>
      <div class="container">
            <h1>Image Similarity Measure </h1>
            <form name="comapare" method="post" action="compare.php">
                  <input type="text" class="form-control" name="a" placeholder="Path to first Image (*.png)" required autofocus>
                  <br>
                  <input type="text" class="form-control" name="b" placeholder="Path to second Image (*.png)" required><br>
                  <input type="submit" value="Compare" class="btn btn-lg btn-primary btn-block">
                </form>
          </div>
  </body>
</html>
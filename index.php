<?php
error_reporting(E_ALL);
include 'config.php';


 function get_count($value)
{
 $stmt = $pdo->query('SELECT count(*)  FROM venue where venue = $value');
 $total = 0;
$row = $stmt->fetchAll();
return $row;
}
        ?>
<div class="container">





?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Venue Selector</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/soon.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>

.jumbotron{
background-color: #A2DED0;
}

#venue{
   font-size: 25px;
}

#thank
{
  display: none;
}
#error
{
  display: none;
}
#progress
{
  display: none;
  position: absolute;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 1000;
    background-color: #000000;
    opacity: 0.7;
    filter: alpha(opacity=70);
    
}

</style>
<script type="text/javascript">


function get(p) {
  $(incCounter(p));
}
function incCounter(p) {
    var id = '#venue_'+p;
    var file_name = 'venue_'+p+'.txt';
    var currCount = parseInt($(id).html());
    var counter = currCount+1
    $(id).text(counter);
    var dataString = 'venue='+ p + '&count=' + counter;     
      $.ajax({
            type: "POST",
            url: "save.php",
            data: dataString,
              
              success: function(data) {
                if(data.status == "success"){
                 $('#progress').show(); 
                 $('#progress').delay(2000).fadeOut();                
                 $('#thank').delay(2000).fadeIn();
                 }              
                 else{
                 $('#progress').show(); 
                 $('#progress').delay(2000).fadeOut();  
                 $('#error').delay(2000).fadeIn();  
               
                 }
                }

      });  

}

</script>
</head>
<body>
<div id="progress"></div>
<div class="container">
  <div class="jumbotron">
    <h1>Freshers Party Venue Selector </h1>
    
  </div>


<div id="main" class="row">

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<button id="venue" onclick="get(1)" class="btn btn-info btn-block venue">Venue 1</button>
<div id="venue_1" class="counter"><?php echo get_count(1);?></div>
</div>


<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<button id="venue" onclick="get(2)" class="btn btn-info btn-block venue">Venue 2</button>
<div id="venue_2" class="counter"><?php echo get_count(2);?></div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<button id="venue" onclick="get(3)" class="btn btn-info btn-block venue">Venue 3</button>
<div id="venue_3" class="counter"><?php echo get_count(3);?></div>
</div>  
</div>


<div id="thank" class="row">

<div class="alert alert-success">
  <strong>Thank You!</strong> Your Selection is saved !
</div>


</div>


  <div id="data"></div>

<div  id="error" class="row">

<div class="alert alert-warning">
  <strong>Oops!</strong>It Seems That You have Done Voting!!
</div>


</div>
 

</div>

 
</body>
</html>


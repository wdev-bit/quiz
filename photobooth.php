<?php 
	require_once __DIR__."/config/app.php";
    $settings = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM settings"));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Photo Booth</title>
    <link rel="stylesheet" href="home.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <!-- Memberstack --> 
    <script src="https://api.memberstack.io/static/memberstack.js?custom" data-memberstack-id="af84ef7fdd139fcaac2c4dd7136c5b27"> </script> 
    <script>
        MemberStack.onReady.then(function(member) { 
            if(!member["id"]){
                window.location.href = "<?php echo base_url()?>login.php";     
            }
        })
    </script>
    <style>
        html,body{
            width: 100%;
            height: 100vh;
            background: url("<?php echo base_url()?>assets/images/bgg.jpg") no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }
        .second-i-frame{
            width: 640px;
            height: 360px;
        }
    </style>
  </head>
  <body>
      
      
    <div class="container-fluid mx-0 px-0 ">
      <div class="row mx-0 px-0">
        <div class="col-12 mx-0 px-0">
          <nav class="navbar navbar-expand-sm   m-0 p-0">
            <a class="home-logo two-home-logo-css" href="<?php echo base_url() ?>">
              <img
                src="<?php echo base_url()?>assets/images/home.jpg"
                height="60px"
                width="60px"
                alt="Italian Trulli"
              />
            </a>
            <a
              class=""
              type="button"
              id="dropdownMenuButton"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="<?php echo base_url()?>assets/images/menu.jpg"
                height="60px"
                width="60px"
                alt="Italian Trulli"
              />
            </a>
            <div class="dropdown">
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo base_url()?>">Home</a>
                <a class="dropdown-item" href="<?php echo base_url()?>mosaic.php">Mosaic</a>
                <a class="dropdown-item" href="<?php echo base_url()?>photobooth.php">Photo Booth</a>
              </div>
              </div>
            </div>
   

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto">
                <a class="home-logo two-home-logo-css" href="#">
                  <img
                  class="logo-company img-responsive"
                    src="<?php echo base_url().$settings['logo'] ?>"
                 
                    alt="Italian Trulli"
                  />
                </a>
                </li>
            
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <!-- -------------------------code after 1200px----------------------------------- -->
    <div class="container-fluid mx-0 px-0 display-after-1200">
      <div class="row bg-body mr-0 pr-0 ">
        <div class="col-8 mx-0 px-0 display-after-1200">
          <div class="row mr-0 pr-0">
            <div class="col-12 mx-0 px-0">
                <div class="first-i-frame">
                    <iframe class="mosaic-iframe" src="https://virtualmosaic.com/tdevents/photobooth" style="border: 0; width:100%; height: 100%;" allow="autoplay;camera *;encrypted-media" allowusermedia allowfullscreen></iframe>
                </div>
            </div>
          </div>
        </div>
        <div class="col-4 col-4-padding display-after-1200">
          <div class="row ">
            <div class="col-12 mx-0 px-0">
                <iframe src="https://video.ibm.com/embed/24009918?autoplay=true" class="second-i-frame try" id="strem" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="1152" height="648"></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <!-- ------------------------------------code before 1200px-------------------------- -->


    <div class="container-fluid bg-body-2 pl-0 display-before-1200 ">
      <div class="row">
        <div class="col-12 mx-0 px-2 pt-5 pb-3">
            <iframe src="https://virtualmosaic.com/tdevents/photobooth" style="border: 0;" class="i-frame-width" allow="autoplay;camera *;encrypted-media" allowusermedia allowfullscreen></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mx-0 px-2 pb-3">
            <iframe src="https://video.ibm.com/embed/24009918?autoplay=true" class="i-frame-width" id="strem" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="880" height="232"></iframe>
        </div>
      </div>
    </div>  
      
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>
</html>

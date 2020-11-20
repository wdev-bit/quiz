<?php require "config/app.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/elegant-font/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/styles/main.css" />
    <!-- Memberstack --> 
    <script src="https://api.memberstack.io/static/memberstack.js?custom" data-memberstack-id="af84ef7fdd139fcaac2c4dd7136c5b27"> </script> 
    <script>
        MemberStack.onReady.then(function(member) {   
          if(member['id']){
            window.location.href = "<?php echo base_url()?>";  
          }
        })
    </script>
    <style>
        body{
            width: 100%;
            height: 100vh;
            background: url("<?php echo base_url()?>assets/images/bgg.jpg");
        }
        .bt{
            padding: 10px 40px 10px 40px;
            color: #fff;
            background: #3895D3;
        }
        .ct{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
        }
        .ct h4{
            color: #fff;
            margin-bottom: 20px;
        }
    </style>
  </head>
  <body>

    <div class="ct">
        <h4>Login to access website</h4>
        <a href="/#/ms/login" class="bt w-100">Login</a>
    </div>

    <!-- Scripts -->
    <script src="<?php echo base_url() ?>assets/scripts/vendors/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/jquery.hoverIntent.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/wow.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/parallax.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/isotope.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/packery-mode.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/owl-carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/jquery.appear.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/vendors/jquery.countTo.js"></script>
    <script src="<?php echo base_url() ?>assets/scripts/main.js"></script>
  </body>
</html>


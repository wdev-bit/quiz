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
            if(!member["id"]){
                window.location.href = "<?php echo base_url()?>login.php";     
            }
        })
    </script>

    <style>
        #home{
            width: 100%;
            height: 100vh;
            background: url("<?php echo base_url()?>assets/images/bg.jpg");
        }
        #home nav.container-fluid{
            width: 100%;
            height: 80px;
            background-color: #fff;
        }
        #home nav.container-fluid .row .col-md-4{
            padding: 0;
        }
        #home nav.container-fluid .row .col-md-4 a.menu-icon img{
            width: 80px;
            height: 80px;
            padding: 10px 0px;
            margin-left: 40px;
        }
        #home nav.container-fluid .row .col-md-4 a.logo img{
            height: 80px;
            padding: 10px;
        }
        #home #left{
            width: 1150px;
            padding: 40px 0px 35px 40px;
            float: left;
        }
        #home #left .row .col-md-12{
            padding: 0px;
        }
        #home #left .row .col-md-12 #chat{
            float: left;
            margin-top: 35px;
            width: 868px;
            float: left;
        }
        #home #left .row .col-md-12 img{
            width: 232px;
            height: 232px;
            margin-top: 35px;
            margin-left: 40px;
        }
        #home #right .row .col-md-12 .photo-carousel-container{
            margin: 120px 0px 0px 40px;
            float: left;
            width: 300px;
            height: 480px;
            background-color: #fff;
        }
        #home #right .row .col-md-12 .trivia-quiz{
            margin: 120px 0px 0px 40px;
            float: left;
            width: 300px;
            height: 480px;
            background-color: #fff;
        }
        .mosaic-container {
            width: 640;
            height: 360px;
            position: relative;
            overflow: hidden; 
        }
        @media screen and (orientation:portrait) {
            .mosaic-container {
                width: 640;
                height: 360px;
                padding-top: 133.33%;
            }
        }
        @media screen and (orientation:landscape) {
            .mosaic-container {
                width: 640;
                height: 360px;
            }
        }
        .mosaic-iframe {
            padding: 40px 0px 0px 40px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            max-height: 95vh;
            border: 0;
            width: 640;
                height: 360px;
        }
    </style>
  </head>
  <body>

    <section id="home">
        <nav class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="menu-icon"><img src="<?php echo base_url()?>assets/images/home.jpg" alt=""></a>
                    <a href="#" class="menu-icon"><img src="<?php echo base_url()?>assets/images/menu.jpg" alt=""></a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="logo"><img src="<?php echo base_url()?>assets/images/logo.png" alt=""></a>
                </div>
            </div>
        </nav>
        <div class="container-fluid" id="left">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://video.ibm.com/embed/24009918?autoplay=true" id="strem" style="border: 0;"
                        webkitallowfullscreen allowfullscreen frameborder="no" width="1152" height="648">
                    </iframe> 
                    <iframe src="https://video.ibm.com/socialstream/24009918?videos=0" id="chat" style="border: 0;"
                        allowfullscreen frameborder="no" width="880" height="232">
                    </iframe> 
                    <img src="<?php echo base_url()?>assets/images/qrcode.png" alt="">
                </div>
            </div>
        </div>
        <div class="container-fluid" id="right">
            <div class="row">
                <div class="col-md-12">
                    <div class="mosaic-container">
                        <iframe class="mosaic-iframe"
                            src="https://virtualmosaic.com/spectrumreach" gesture="media"
                            allow="encrypted-media" allowfullscreen>
                        </iframe>
                    </div> 
                    <div class="photo-carousel-container"></div>
                    <div class="trivia-quiz"></div>
                </div>
            </div>
        </div>
    </section>

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
    <script>
        MemberStack.onReady.then(function(member) {  
          if(member["id"] != ""){
            $.ajax({
                url: "<?php echo base_url()?>ajax/set_session.php",
                type: "POST",
                data: {
                    name: member["name"],
                    email: member["email"],
                    id: member["id"]
                },
                success: function(response){
                    alert('gg');
                }
            });
          }
        })
        
    </script>
  </body>
</html>


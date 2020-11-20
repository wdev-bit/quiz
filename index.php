<?php 
	require_once __DIR__."/config/app.php";
    $settings = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM settings"));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
                <?php echo $settings['livestream_iframe'] ?>
            </div>
          </div>
          <div class="row">
            <div class="col-8 mx-0 px-0 third-frame-padding">
                <?php echo $settings['chat_iframe'] ?>
            </div>
            <div class="col-4 qr-qode-padding">
              <a>
              <img
              class="qr-qode"
                src="<?php echo base_url().$settings['qrcode_image'] ?>"
            
                alt="Italian Trulli"
              />
            </a>
            </div>

          </div>
        </div>
        <div class="col-4 col-4-padding display-after-1200">
          <div class="row ">
            <div class="col-12 mx-0 px-0">
                <style>
                </style>
                <div class="second-i-frame try">
                    <iframe class="mosaic-iframe" src="https://virtualmosaic.com/tdevents/jumbotron" style="border: 0; width:100%; height: 100%;" allow="autoplay;camera *;encrypted-media" allowusermedia allowfullscreen ></iframe>
                </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 mx-0 px-0">
              <a href="<?php echo base_url()?>photobooth.php"><img src="<?php echo base_url()?>assets/images/button.jpg" class="virtual-photo-both"></a>
            </div>
          </div>
          <div class="row ">
            <div class="col-12 mx-0 px-0">
                <style>
                    .trivia-quiz .heading{
                        width: 100%;
                        text-align: center;
                        padding: 7px 0px;
                    }
                    .trivia-quiz .question{
                        width: 100%;
                        text-align: left;
                        padding: 10px 20px;
                    }
                    .trivia-quiz .answer{
                        width: 100%;
                        text-align: left;
                        padding: 7px 20px;
                    }
                </style>
                <a>
                  <div class="trivia-quiz" style="position: relative; background: #fff !important;">trivia quiz </div>
                </a>
              
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <!-- ------------------------------------code before 1200px-------------------------- -->


    <div class="container-fluid bg-body-2 pl-0 display-before-1200 ">
      <div class="row">
        <div class="col-12 mx-0 px-2 pt-5 pb-3">
          <iframe src="https://video.ibm.com/embed/24009918?autoplay=true" class="i-frame-width" id="strem" style="border: 0;" webkitallowfullscreen allowfullscreen frameborder="no" width="1152" height="648">
            </iframe> 
        </div>
      </div>
      <div class="row">
        <div class="col-12 mx-0 px-2 pb-3">
            <iframe src="https://video.ibm.com/socialstream/24009918?videos=0" class="i-frame-width" style="border: 0;" allowfullscreen frameborder="no" width="880" height="232">
            </iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mx-0 px-2 pb-3">
            <iframe       
            src="https://virtualmosaic.com/spectrumreach" gesture="media" allow="encrypted-media" class="i-frame-width" allowfullscreen>
            </iframe>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center py-5">
          <a>
            <img
            class=""
              src="<?php echo base_url().$settings['qrcode_image'] ?>"
              alt="Italian Trulli"
            />
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center pb-4">
          <a href="#"><img src="<?php echo base_url()?>assets/images/button.jpg" class="virtual-photo-both"></a>

        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center pb-5">
          <a><div class="trivia-quiz "></div></a>

        </div>
      </div>
    </div>  
      
      
      
      
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    if(response == "success"){
                        fetch_quiz();
                        setInterval(function(){
                            fetch_quiz();
                        },60000);
                    }
                }
            });
          }
        })
        function fetch_quiz(){
            $.ajax({
                url: "<?php echo base_url()?>ajax/fetch_quiz.php",
                type: "POST",
                dataType: "JSON",
                success: function(response){
                    var quiz = "";
                    if(response.data == ""){
                        $('.trivia-quiz').html("<div class='w-100 text-center py-2'><h1>Sorry there is no actie session of quiz</h1></div>");
                    }
                    else
                    {
                        if(response.data.attempted == 0){
                        var ans = JSON.parse(response.data.question.answers);
                        quiz = `    
                          <div class="heading">
                            <h1>${response.data.quiz_title}</h1>
                          </div>
                          <div class="question">
                              <h4>Q: ${response.data.question.title}</h4>
                          </div>
                          <div class="answer">
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="radio" name="answer" id="ans-1" data-qid="${response.data.quiz_id}" data-qsid="${response.data.question.id}" data-rid="${response.data.round.id}" value="1">
                                      <label for="ans-1">${ans[0]}</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="radio" name="answer" id="ans-2" data-qid="${response.data.quiz_id}" data-qsid="${response.data.question.id}" data-rid="${response.data.round.id}" value="2">
                                      <label for="ans-2">${ans[1]}</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="radio" name="answer" id="ans-3" data-qid="${response.data.quiz_id}" data-qsid="${response.data.question.id}" data-rid="${response.data.round.id}" value="3">
                                      <label for="ans-3">${ans[2]}</label>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <input type="radio" name="answer" id="ans-4" data-qid="${response.data.quiz_id}" data-qsid="${response.data.question.id}" data-rid="${response.data.round.id}" value="4">
                                      <label for="ans-4">${ans[3]}</label>
                                  </div>
                              </div>
                          </div>`;
                          $('.trivia-quiz').html(quiz);
                        }
                        else
                        {
                            $('.trivia-quiz').html("<div class='w-100 text-center py-2'><h1>Please wait for next question</h1></div>");
                        }
                    }
                }
            });   
        }
        $(document).on('change','input[type="radio"]',function(){
            var ans = $(this).val();
            var qid = $(this).attr('data-qid');
            var qsid = $(this).attr('data-qsid');
            var rid = $(this).attr('data-rid');
            $('.question').fadeOut();
            $('.answer').fadeOut();
            $('.trivia-quiz').append('<img src="<?php echo base_url()?>assets/images/loader.gif" width="50px" height="50px" style="position: absolute; left: 50%; top:50%; transform:translate(-50%,-50%);">');
            $.ajax({
                url: "<?php echo base_url()?>ajax/save_attempt.php",
                type: "POST",
                data: {
                    ans:ans,
                    qid:qid,
                    qsid:qsid,
                    rid:rid
                },
                success: function(response){
                    if(response == 'success'){
                        $('.trivia-quiz').find('img').remove();
                        fetch_quiz();
                    }
                }
            });
        });
    </script>
  </body>
</html>

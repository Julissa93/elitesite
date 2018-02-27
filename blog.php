<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.3/jquery-ui.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
</head>

<?php
    include('fcns.php');
?>

<body style = "padding-top: 10%; ">
<!-- NAV BAR -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class = "row">
        <div id = "elite" class = "col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <a href="index.html" class="nav navbar-left" id="navbarBrand" style = "font-size: 23px; ">
            <img src="images/elitelogo.png" height = "60px" width = "55px" id="navbarLogo">ELiTe
          </a>
        </div>
        <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html#p1">Home</a></li>
            <li><a href = "index.html#p2">About</a></li>
            <li><a href="index.html#p3">Officers</a></li>
            <li><a href="index.html#p4">Events</a></li>
            <li><a href="blog.php">Blog</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
<!-- END NAVBAR-->

<!--BEGIN BLOG-->

  <div class = "panel-blog">
    <div class = "container-fluid" >
      <div class = "row">
        <div class = "col-sm-3 col-md-3 col-lg-3">
          <a class="twitter-timeline" data-width="250" data-height="400" href="https://twitter.com/ELiTe_CSI?ref_src=twsrc%5Etfw">Tweets by ELiTe_CSI</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class = "col-xs-12 col-sm-6 col-md-6 col-lg-6 ">

          <?php
            //show blog posts
            if(!isset($_GET['page'])){
              $page = 1;
            }
            else{
              $page = $_GET['page'];
            }
            getBlogPosts($page);
          ?>

        </div>
      </div>
    </div>

    <div class = "row">
        <nav class = "col-sm-6 col-md-6 col-lg-6 col-sm-offset-5 col-md-offset-5 col-lg-offset-5" aria-label="Page navigation">
          <ul class="pagination">
            <?php

              if($page == 1){
                echo"
                  <li class = 'disabled'>
                    <a href='' aria-label='Previous'>
                      <span aria-hidden='true'>&laquo;</span>
                    </a>
                  </li>";
                }
              else {
                echo"
                  <li>
                    <a href='blog.php?page=". ($page - 1) ."' aria-label='Previous'>
                      <span aria-hidden='true'>&laquo;</span>
                    </a>
                  </li>";
              }

               //show page links
                for($i = 1; $i <= getNumberOfPages(); $i++)
                {
                  echo "<li><a href='blog.php?page=". $i ."'>". $i ."</a></li>";
                }
/*
              if($page == getNumberOfPages())
              {
                echo"
                  <li class = 'disabled'>
                    <a href='' aria-label='Next'>
                      <span aria-hidden='true'>&raquo;</span>
                    </a>
                  </li>";
              }
              else {
                echo"
                  <li>
                    <a href='blog.php?page=". ($page + 1) ."' aria-label='Next'>
                      <span aria-hidden='true'>&raquo;</span>
                    </a>
                  </li>";
              }*/

            ?>
          </ul>
        </nav>
    </div>
  </div>

  <!--FOOTER-->
  <div class = "footer">
    <div class = "container-fluid">
      <div class = "row">

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
          <h3> Made with &#9829; at: </h3><br>
          <img src = "images/csi.png" class = "img-responsive" height = "80" width = "300">
          <br><br>
          <p style = "color: #ffffff; ">&#169; ELiTe 2017</p>
        </div>

        <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
          <h3 class>Find us on: </h3>
          <div class = "social-media">
            <a href = "https://www.facebook.com/EmpoweringLadiesInTech/" target = "_blank"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a>
            <a href = "https://twitter.com/ELiTe_CSI" target = "_blank"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
            <br>
            <a href = "https://orgsync.com/166094/chapter" target = "_blank"><img src = "images/csiconnect.png" class = "img-responsive" height = "80" width = "200"></a>
          </div>
        </div>

        <!-- FORM FOR MAILING LIST -->
        <div class = "col-xs4 col-sm-4 col-md-4 col-lg-4">

          <form class = "form-inline subscribe " action="https://orgsync.us17.list-manage.com/subscribe/post?u=1b9aa85843835c7cf768b30b4&amp;id=fabaf9e337" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

            <h3>Subscribe to our mailing list</h3>
            <div class = "input-group" >
                <input type="email" value="" name="EMAIL" class="form-control required email " id="mce-EMAIL" placeholder = "Email" required = "required">
                <span class = "input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fa fa-send"></i>&nbsp;</button>
                </span>
            </div>
            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1b9aa85843835c7cf768b30b4_fabaf9e337" tabindex="-1" value=""></div>

          </form>
        </div>

        <!--End mc_embed_signup-->
      </div>
    </div>
  </div>
<!-- END BLOG -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>
</html>

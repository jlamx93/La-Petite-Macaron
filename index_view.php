<?php include('includes/header.php'); ?>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/macarons1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/Macarons.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/macaron_lesson-2.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box"> <hr>
                    <h2 class="intro-text text-center"><strong>Specials!</strong>
                    </h2>
                    <hr>
                <div class="col-lg-6">
                   
                    <img class="img-responsive img-border img-left" src="img/special.jpg" alt="">
                    <hr class="visible-xs">
            
                </div>
                 <div class="col-md-5">
                  
                    <p><img class="img-responsive img-border img-left" src="img/about1.jpg" alt=""></p>
                    <p>&nbsp;</p>
                    <p>
                      
                      <img class="img-responsive img-border img-left" src="img/about2.jpg" alt="">
                    </p>
                    <hr class="visible-xs">
              </div>
            </div>
            
        </div>

      

    </div>
    <!-- /.container -->

    <?php include('includes/footer.php'); ?>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
    // Activates the Carousel
    $('.carousel').carousel({
        interval: 5000
    })
    </script>

</body>

</html>

<?php

use frontend\models\Shoes;
use frontend\models\Images;
use yii\bootstrap4\Modal;
use frontend\models\Cart;
use yii\helpers\Url;


$shoes = Shoes::find()->JoinWith('images')->all();

?>


<!-- <Homepage> -->
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 text-center">
        <div class="wrapper text-center">
          <img class="search-icon text-center"
            src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDU2Ljk2NiA1Ni45NjYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDU2Ljk2NiA1Ni45NjY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPHBhdGggZD0iTTU1LjE0Niw1MS44ODdMNDEuNTg4LDM3Ljc4NmMzLjQ4Ni00LjE0NCw1LjM5Ni05LjM1OCw1LjM5Ni0xNC43ODZjMC0xMi42ODItMTAuMzE4LTIzLTIzLTIzcy0yMywxMC4zMTgtMjMsMjMgIHMxMC4zMTgsMjMsMjMsMjNjNC43NjEsMCw5LjI5OC0xLjQzNiwxMy4xNzctNC4xNjJsMTMuNjYxLDE0LjIwOGMwLjU3MSwwLjU5MywxLjMzOSwwLjkyLDIuMTYyLDAuOTIgIGMwLjc3OSwwLDEuNTE4LTAuMjk3LDIuMDc5LTAuODM3QzU2LjI1NSw1NC45ODIsNTYuMjkzLDUzLjA4LDU1LjE0Niw1MS44ODd6IE0yMy45ODQsNmM5LjM3NCwwLDE3LDcuNjI2LDE3LDE3cy03LjYyNiwxNy0xNywxNyAgcy0xNy03LjYyNi0xNy0xN1MxNC42MSw2LDIzLjk4NCw2eiIgZmlsbD0iIzAwMDAwMCIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
          <input class="search text-center" placeholder="Search" type="text">
          <!-- <img class="clear-icon" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxLjk3NiA1MS45NzYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxLjk3NiA1MS45NzY7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8cGF0aCBkPSJNNDQuMzczLDcuNjAzYy0xMC4xMzctMTAuMTM3LTI2LjYzMi0xMC4xMzgtMzYuNzcsMGMtMTAuMTM4LDEwLjEzOC0xMC4xMzcsMjYuNjMyLDAsMzYuNzdzMjYuNjMyLDEwLjEzOCwzNi43NywwICAgQzU0LjUxLDM0LjIzNSw1NC41MSwxNy43NCw0NC4zNzMsNy42MDN6IE0zNi4yNDEsMzYuMjQxYy0wLjc4MSwwLjc4MS0yLjA0NywwLjc4MS0yLjgyOCwwbC03LjQyNS03LjQyNWwtNy43NzgsNy43NzggICBjLTAuNzgxLDAuNzgxLTIuMDQ3LDAuNzgxLTIuODI4LDBjLTAuNzgxLTAuNzgxLTAuNzgxLTIuMDQ3LDAtMi44MjhsNy43NzgtNy43NzhsLTcuNDI1LTcuNDI1Yy0wLjc4MS0wLjc4MS0wLjc4MS0yLjA0OCwwLTIuODI4ICAgYzAuNzgxLTAuNzgxLDIuMDQ3LTAuNzgxLDIuODI4LDBsNy40MjUsNy40MjVsNy4wNzEtNy4wNzFjMC43ODEtMC43ODEsMi4wNDctMC43ODEsMi44MjgsMGMwLjc4MSwwLjc4MSwwLjc4MSwyLjA0NywwLDIuODI4ICAgbC03LjA3MSw3LjA3MWw3LjQyNSw3LjQyNUMzNy4wMjIsMzQuMTk0LDM3LjAyMiwzNS40NiwzNi4yNDEsMzYuMjQxeiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> -->
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 col-sm-12 shop">
        <div class="title">
          For the cool kids
          <br>
          <div class="title2">
            The only way to be cool is to rock the Ndula
          </div>
          <div class="col-md-6 text-center shop">
            <a href="<?= Url::to(['site/items']) ?>" class="btn btn-secondary btn-lg btn-block">Shop</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <img src="../images/backg.jpg" class="img-fluid">
      </div>
    </div>
  </div>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5 col-sm-6">
        <div class="card text-white bg-dark mb-3 w-120">
          <div class="card-body img-overlay">
            <h5>Men's</h5>
            <img src="../images/men5.jpg" class="img-fluid" alt="">
          </div>
          <div class="text-center">
            <a href="<?= Url::to(['site/items']) ?>" class="btn btn-primary text-center btn-lg">View Items</a>
          </div>
          <br>
        </div>
      </div>

      <div class="col-md-5 col-sm-6  margin-right">
        <div class="card text-white bg-dark mb-3 w-120">
          <div class="card-body">
            <h5 class="card-title">Women's</h5>
            <img src="../images/men2.jpg" class="img-fluid" alt="">
          </div>
          <div class="text-center">
            <a href="<?= Url::to(['site/women']) ?>" class="btn btn-primary text-center btn-lg">View Items</a>
          </div>
          <br>
        </div>
      </div>
      <div class="col-md-1"></div>

    </div>
  </div>
  </div>
  <br>

  <br>

  <div class="container-fluid text-center text-md-left mail">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>New Releases</h3>
        <!--Carousel Wrapper-->
        <div id="multi-item-example1" class="carousel slide carousel-multi-item" data-ride="carousel">

          <!--Controls-->
          <div class="controls-top text-center">
            <a class="btn-floating" href="#multi-item-example1" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
            <a class="btn-floating" href="#multi-item-example1" data-slide="next"><i class="fa fa-arrow-right"></i></a>
          </div>
          <!--/.Controls-->

          <!--Indicators-->
          <ol class="carousel-indicators">
            <li data-target="#multi-item-example1" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example1" data-slide-to="1"></li>

          </ol>
          <!--/.Indicators-->

          <!--Slides-->
          <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">

            <?php foreach ($shoes as $shoe){?>

              <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                  <img class="card-img-top" src="<?= Yii::$app->request->baseUrl.'/'.$shoe->images[0]->img_path ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $shoe['shoe_name'] ?></h4>
                    <p class="card-text">Kshs. <?= $shoe['price'] ?></p>
                    <button type="button" val="<?=$shoe->shoe_id?>" class="btn btn-block btn-success addtocart ">Add to cart</button>
                    <!-- <a href="<?= Url::to(['site/addtocart', 'shoe_id'=>$shoe->shoe_id, 'price'=>$shoe->price])?>">Add to cart</a> -->

                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
            <!--/.First slide-->

            
            <!--Second slide-->
            <div class="carousel-item">

            <?php foreach ($shoes as $shoe){?>

              <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                  <img class="card-img-top" src="<?= Yii::$app->request->baseUrl.'/'.$shoe->images[0]->img_path ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $shoe['shoe_name'] ?></h4>
                    <p class="card-text">Kshs. <?= $shoe['price'] ?></p>
                    <button type="button" class="btn btn-block btn-success addtocart">Add to cart</button>
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
<!--/.Second slide-->


          </div>
          <!--/.Slides-->

        </div>
      </div>
    </div>
  </div>
  <!--/.Carousel Wrapper-->
  <br>

  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h3>Top Features</h3>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

          <!--Controls-->
          <div class="controls-top text-center">
            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-arrow-left"
                aria-hidden="true"></i>
            </a>
            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-arrow-right"
                aria-hidden="true"></i>
            </a>
          </div>
          <!--/.Controls-->

          <!--Indicators-->
          <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            <li data-target="#multi-item-example" data-slide-to="1"></li>

          </ol>
          <!--/.Indicators-->

          <!--Slides-->
          <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
            <?php foreach ($shoes as $shoe){?>
              <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                  <img class="card-img-top" src="<?= Yii::$app->request->baseUrl.'/'.$shoe->images[0]->img_path ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $shoe['shoe_name'] ?></h4>
                    <p class="card-text">Kshs. <?= $shoe['price'] ?></p>
                    <button type="button" class="btn btn-block btn-success addtocart">Add to cart</button>
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
            <!--/.First slide-->

            <!--Second slide-->
            <div class="carousel-item">
            <?php foreach ($shoes as $shoe){?>
              <div class="col-md-3" style="float:left">
                <div class="card mb-2">
                  <img class="card-img-top" src="<?= Yii::$app->request->baseUrl.'/'.$shoe->images[0]->img_path ?>" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $shoe['shoe_name'] ?></h4>
                    <p class="card-text">Kshs. <?= $shoe['price'] ?></p>
                    <button type="button" class="btn btn-block btn-success addtocart">Add to cart</button>
                  </div>
                </div>
              </div>

              <?php } ?>
            </div>
            <!--/.Second slide-->



          </div>
          <!--/.Slides-->

        </div>
      </div>
    </div>
  </div>
  <!--/.Carousel Wrapper-->

  <div class="container-fluid text-center text-md-left mail"><br>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-12 col-sm-8 text-center">
        <h4>Up your shoe game</h4></a>
      </div>
      <br>
      <div class="col-md-12 col-sm-8 text-center">
        <h4>Get notified immediately there is a new drop</h4></a>
      </div>
      <br><br>
      <div class="col-md-12 col-sm-8 text-center">
        <a href="#" class="btn btn-secondary text-centre">
          <h3>Join our mailing list</h3>
        </a>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
  </div>

  <?php
        Modal::begin([
            'title'=>'<h4>My Cart</h4>',
            'id'=>'addtocart',
            'size'=>'modal-lg'
            ]);
        echo "<div id='addtocartContent'></div>";
        Modal::end();
      ?> 
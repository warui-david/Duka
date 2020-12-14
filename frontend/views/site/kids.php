<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\models\Shoes;
use frontend\models\Images;
use frontend\models\ShoeCategory;


$shoe_kids = Shoes::find()->where(['cat_id' => 3])->joinWith('images')->all();


?>

<!-- main body -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="margin-top: 100px;">
            Filter by:
            <hr>
            <div class="row">
                <div class="col-md-8">
                    Size
                </div>
                <div class=" col-md-4 pull-right">
                    <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    Brand </div>
                <div class=" col-md-4 pull-right">
                    <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    Price
                </div>
                <div class=" col-md-4 pull-right">
                    <i class="fa fa-plus plus-grey" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-10" style="margin-top: 40px;">
            <h4>Kids shoes</h4>
            <div class="row">

                <div class="col-md-10" style="margin-top: 30px;">
                    <div class="row" style="margin-top:30px; margin-bottom:30px;">
                        
                    <?php foreach ($shoe_kids as $kids) { ?>
                        <div class="col-md-4">
                            <!-- Card -->
                                <div class="card promoting-card" style="width: 18rem;">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img class="card-img-top rounded-0" src="<?= Yii::$app->request->baseUrl.'/'.$kids->images[0]->img_path?>" alt="">
                                        <a href="#!">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!-- Card content -->
                                    <div class="card-body">

                                        <div class="collapse-content">
                                        <?=$kids->shoe_name ?>
                                        <p class="lead text-center">Ksh: <?=$kids->price ?></p>
                                            <div class="text-center">
                                                <a href="#" class="btn btn-primary text-center">Add to cart</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- Card -->
                        </div>
                        
                    <?php } ?>
                    
                    </div>
                    



                </div>
                <br>
            </div>
        </div>
    </div>
</div>
</div>


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
<?php

use frontend\models\Shoes;
use frontend\models\Images;
use yii\bootstrap4\Modal;
use frontend\models\Cart;
use yii\helpers\Url;


$total_shoes = Cart::find()->JoinWith('shoe')->all();
$total_cart = Cart::find()->JoinWith('shoe')->sum('price');
$shoes = Shoes::find()->JoinWith('images')->all();
// $images = Cart::find()->joinwith('images')->joinWith('shoe')->all();
// $images = Cart::find()->joinWith(['shoe', 'shoe.images'])->all();


?>

<div class="container-fluid" style="margin-top:60px">
        <div class="row">
            <!-- <div class="col-md-12 col-sm-12"> -->
            <div class="col-md-8 col-sm-12">
                <h4>Shopping bag</h4>
                <hr style="color:gray;background-color:gray">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <h6 class="text-center">Item</h6>
                        </div>

                        <div class="col-md-2">
                            <h6>Total price</h6>
                        </div>
                        
                    </div>
                </div>
                <hr style="color:gray;background-color:gray">

                <?php foreach ($total_shoes as $shoe){?>
                <div class="col-md-12 col-sm-12">
                    <div class="row">

                        <div class="col-md-6 col-sm-6">
                            <div class="row">

                                <!-- <div class="col-md-6">
                                    <div class="card">
                                        <img class="card-img-top" src="images/vans.jpg" alt="Card image cap">
                                    </div>
                                </div> -->

                                <div class="col-md-6" style="margin-top: 30px;">
                                    <h7 style="font-weight: bold;"><?=$shoe->shoe->shoe_name ?></h7>

                                </div>

                            </div>
                            

                        </div>
                        
                        
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-2" style="margin-top: 30px;">
                                    Kshs. <?=$shoe->shoe->price ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <br>
                
                <br>
                






            </div>

            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Order summary</span>
                    <span class="badge badge-secondary badge-pill">Kshs.</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Subtotal</h6>
                            <!-- <small class="text-muted">Brief description</small> -->
                        </div>
                        <span class="text-muted"><?=$total_cart ?></span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Estimated tax</span>
                        <strong>0.00</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Kshs.)</span>
                        <strong><?=$total_cart ?></strong>
                    </li>
                </ul>
                <a href="<?= Url::to(['order/create']) ?>" class="btn btn-secondary btn-lg btn-block">Proceed to checkout</a>
                <br>
                <a href="<?= Url::to(['site/index']) ?>" class="btn btn-primary btn-lg btn-block">Continue shopping</a>
            </div>

            <!-- </div> -->
        </div>
    </div>

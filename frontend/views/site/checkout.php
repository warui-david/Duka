<?php

use frontend\models\Shoes;
use frontend\models\Images;
use yii\bootstrap4\Modal;
use frontend\models\Cart;
use yii\helpers\Url;


// $total_shoes = Cart::find()->JoinWith('shoes')->all();
// $total_cart = Cart::find()->JoinWith('shoes')->sum('price');
$total_shoes = Cart::find()->JoinWith('shoe')->all();
$total_cart = Cart::find()->JoinWith('shoe')->sum('price');
$shoes = Shoes::find()->JoinWith('images')->all();
?>


<div class="container-fluid" style="margin-left:40px;margin-top: 50px;">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3>CHECKOUT</h3>
            </div>
            <div class="col-md-7" style="margin-left: 60px;margin-top: 30px;">
                <h4>1. Shipping info</h4>
                <hr>
<!--                 
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4> -->
                <form class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid first name is required. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback"> Valid last name is required. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback"> Please select a valid country. </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback"> Please provide a valid state. </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback"> Zip code required. </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my
                            billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    <h4 class="mb-3">2. Payment</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                required="">
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback"> Name on card is required </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback"> Credit card number is required </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback"> Expiration date required </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback"> Security code required </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </form>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">My Cart</span>
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
                <a href="<?= Url::to(['site/checkout']) ?>" class="btn btn-secondary btn-lg btn-block">Proceed to checkout</a>
                <br>
                <a href="<?= Url::to(['site/index']) ?>" class="btn btn-primary btn-lg btn-block">Continue shopping</a>
            </div>
        </div>
    </div>

    </div>
    </div>
    <br>
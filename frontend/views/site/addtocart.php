<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Shoes;
use common\models\user;
use yii\helpers\ArrayHelper;
use\yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */
/* @var $form yii\widgets\ActiveForm */
$shoes = Shoes::find()->JoinWith('images')->all();
$shoe = ArrayHelper::map(Shoes::find()->all(), 'shoe_id', 'price');
$user_id = user::find()->where(['id'=>Yii::$app->user->id])->one();
?>
<div class="addtocart">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shoe_id')->hiddenInput(['value' => $shoe_id, 'readonly'=> true])->label(false) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>$user_id->id, 'readonly'=> true])->label(false) ?>
    
        <div class="row">
        <div class="form-group col-md-9">
            <?= Html::submitButton('Save to cart', ['class' => 'btn btn-primary']) ?>
        </div>

        <div class="form-group col-md-3 pull-right">
        <a href="<?= Url::to(['order/create']) ?>" class="btn btn-secondary">Proceed to checkout</a>
        </div>

        </div>
    <?php ActiveForm::end(); ?>

</div><!-- addtocart -->

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cart */

$this->title = 'Update Cart: ' . $model->cart_id;
$this->params['breadcrumbs'][] = ['label' => 'Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cart_id, 'url' => ['view', 'id' => $model->cart_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Shoes */

$this->title = 'Update Shoes: ' . $model->shoe_id;
$this->params['breadcrumbs'][] = ['label' => 'Shoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shoe_id, 'url' => ['view', 'id' => $model->shoe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

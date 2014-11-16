<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRental */

$this->title = 'Update User Rental: ' . ' ' . $model->rental_id;
$this->params['breadcrumbs'][] = ['label' => 'User Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rental_id, 'url' => ['view', 'id' => $model->rental_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-rental-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

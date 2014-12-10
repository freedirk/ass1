<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserRental */

$this->title = $model->rental_id;
$this->params['breadcrumbs'][] = ['label' => 'User Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rental-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'car_id',
            'rental_id',
            'startDate',
            'endDate',
        ],
    ]) ?>

</div>

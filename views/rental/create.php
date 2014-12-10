<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserRental */

$this->title = 'Create User Rental';
$this->params['breadcrumbs'][] = ['label' => 'User Rentals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rental-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

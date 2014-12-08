<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserRentalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Rentals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-rental-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Rental', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
            
            
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'user_id',
            [
                'label'=>'Car',
                'attribute' => 'car_id',
                'value' => 'car.fullName'
            ],
      
            'rental_id',
            
            'startDate',
            'endDate',
           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>

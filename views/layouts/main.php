<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
    </head>
    <body>
        <?php
        $user = \dektrium\user\models\User::find()->where(['id' => Yii::$app->user->id])->one();
        if ($user && $user->role == 'admin') {
            $isAdmin = true;
        } else {
            $isAdmin = false;
        }
//$user = dektriuUser::find(Yii::$app->user->id)->where(['user_id'=>Yii::$app->user->id]); //var_dump(Yii::$app->user) ;
        ?>
        <?php $this->beginBody();
        ?>
        <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Rent-a-Lemon',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
//                    ['label' => 'About', 'url' => ['/site/about']],
                //                   ['label' => 'Contact', 'url' => ['/site/contact']],
                  $isAdmin ? ['label' => 'Cars', 'url' => ['/car/index']] : "",
                  $isAdmin ? ['label' => 'Rentals', 'url' => ['/app/index']] : "",
                  $isAdmin ? ['label' => 'Users', 'url' => ['/user/admin']] : "",
                //$isAdmin ? ['label' => 'Rentals', 'url' => ['/app/index']] : "",
                !Yii::$app->user->isGuest && !$isAdmin ? ['label' => 'Rent a car', 'url' => ['/userrental/create']] : "",
                Yii::$app->user->isGuest ? ['label' => 'Sign up', 'url' => ['/user/registration/register']] : "",
                Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/user/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            ],
        ]);
        NavBar::end();
        ?>

            <div class="container">
<?=
//var_dump($user->role);

Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])
?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Rent-a-Lemon<?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

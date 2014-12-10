<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Rent A Lemon!</h1>

        <p class="lead">The most unreliable cars on the planet</p>

      <?php if (Yii::$app->user->isGuest) {
            echo '<p><a class="btn btn-lg btn-success" href="index.php/user/register">Get started</a></p>';
        }else{
            echo '<p><a class="btn btn-lg btn-success" href="index.php/rental/create">Rent a car</a></p>';
        } 
        
        
        ?>
      
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <img style="width: 100%"  src="<?php echo \Yii::getAlias('@web');?>/img/american-rust-meitle-1.jpg">
            </div>
            <div class="col-lg-4">
                <img style="width: 100%" src="<?php echo \Yii::getAlias('@web');?>/img/old-banger.jpg">
            </div>
            <div class="col-lg-4">
                  <img style="width: 100%"  src="<?php echo \Yii::getAlias('@web');?>/img/images.jpg">
            </div>
        </div>

    </div>
</div>

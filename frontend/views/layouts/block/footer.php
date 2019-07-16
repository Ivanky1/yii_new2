<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </div>
</footer>
<?php
    if (Yii::$app->user->isGuest) {
       echo  \frontend\widgets\Login::widget();
    }

?>

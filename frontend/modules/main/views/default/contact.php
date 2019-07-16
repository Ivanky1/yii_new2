<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact
                <strong>business casual</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-8">
            <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
        </div>
        <div class="col-md-4">
            <p>Phone:
                <strong>123.456.7890</strong>
            </p>
            <p>Email:
                <strong><a href="mailto:name@example.com">name@example.com</a></strong>
            </p>
            <p>Address:
                <strong>3481 Melrose Place
                    <br>Beverly Hills, CA 90210</strong>
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact
                <strong>form</strong>
            </h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p>
            <?php $form = \yii\bootstrap\ActiveForm::begin() ?>

            <div class="row">
                <div class="form-group col-lg-4">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="form-group col-lg-4">
                    <?= $form->field($model, 'email') ?>
                </div>
                <div class="form-group col-lg-4">
                    <?= $form->field($model, 'subject') ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                </div>
                <div class="form-group col-lg-4">
                    <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                        'template' => '<div>{image}{input}</div>',
                        'captchaAction' => ['main/captcha']
                    ]) ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= \yii\helpers\Html::submitButton('Отправить', ['class' => 'btn btn-default']) ?>
                </div>
            </div>

            <?php \yii\bootstrap\ActiveForm::end() ?>

        </div>
    </div>
</div>
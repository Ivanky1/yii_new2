<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">User Register
                <strong>form</strong>
            </h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p>
            <?php $form = \yii\bootstrap\ActiveForm::begin([
                'options' => [
                    'class' => 'RegisterForm',
                ],
                'enableClientValidation' => true,
              //  'enableAjaxValidation' => true,

            ]) ?>

                <div class="row">
                    <div class="form-group col-lg-6">
                        <?= $form->field($model, 'username') ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <?= $form->field($model, 'email') ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <?= $form->field($model, 're_password')->passwordInput() ?>
                    </div>
                    <div class="form-group col-lg-4">

                    </div>
                    <div class="form-group col-lg-12">
                        <?= \yii\helpers\Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-default']) ?>
                    </div>
                </div>

            <?php \yii\bootstrap\ActiveForm::end() ?>
        </div>
    </div>
</div>


<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\widgets\CKEditor;


/* @var $this yii\web\View */
/* @var $model frontend\models\mongo\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'created')->widget(\yii\jui\DatePicker::className(), [ 'language' => 'ru','dateFormat' => 'dd-MM-yyyy',]) ?>

    <?= $form->field($model, 'summary_text')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'full_text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
    ]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

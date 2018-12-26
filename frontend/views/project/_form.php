<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'project_name', [ 'options' => ['style' => 'width: 35%']])->textInput(['maxlength' => true]) ?>

     <!--$form->field($model, 'id_user')->textInput() -->

     <!--  $form->field($model, 'id_project_status')->textInput() -->

    <?= $form->field($model, 'project_status', [ 'options' => ['style' => 'width: 35%']])->dropDownList([
            'start' => 'start',
            'medium' => 'medium',
            'finish' => 'finish'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use moonland\tinymce\TinyMCE;
use \bootui\datetimepicker\DateTimepicker;


/* @var $this yii\web\View */
/* @var $model common\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">


    <?php $form = ActiveForm::begin();
    // get all info from status table
    $statuses = \common\models\Status::find()->all();
    // use map ArrayHelper
    $items = ArrayHelper::map($statuses,'id','status_name');
    ?>

    <?= $form->field($model, 'task_name', [ 'options' => ['style' => 'width: 35%']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_name', [ 'options' => ['style' => 'width: 35%']])->dropDownList($items); ?>

    <?= $form->field($model, 'description', [ 'options' => ['style' => 'width: 65%']])->widget(TinyMCE::className(), [
        'showAdvancedImageTab' => false,
        'plugins' => ['template paste textcolor'],
         'height' => '30%'
    ]); ?>

    <?= $form->field($model, 'finish_date', [ 'options' => ['style' => 'width: 35%']])->widget(DateTimepicker::className(),[
        'options' => ['class' => 'form-control'],
       // 'addon' => ['prepend' => ''],
        'format' => 'YYYY-MM-DD HH:mm',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

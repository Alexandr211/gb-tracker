<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            return ['data-id' => $model->id]; },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'project_name',
           // 'id_user',
           // 'id_project_status',

            [
                'attribute' => 'project_status',
                'contentOptions'=> ['style'=>'width: 15%;']
            ],

            [
                'attribute' => 'project_creator',
                'contentOptions'=> ['style'=>'width: 25%;']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php //  console.log(id);
$this->registerJs("
    $('td').click(function (e) {
            var id = $(this).closest('tr').data('id');
            if (e.target == this && id)
            location.href = '" . Yii::$app->urlManager->createUrl('task/index') . "&p_id=' + id;
    });
");


?>
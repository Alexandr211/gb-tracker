<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create', 'p_id' => $_GET['p_id']], ['class' => 'btn btn-success']) ?>
    </p>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'   => function ($model, $key, $index, $grid) {
            return ['data-id' => $model->id];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],

            ],
            'task_name',
            [
                'attribute' => 'status',
                'filter' => \common\models\Status::find()->indexBy('id')->select('status_name')->column(),
                'value' => function($model) {
                        return (\common\models\Status::findOne(['id' => $model->status])->status_name);
                },

                'format' => 'html',

                'headerOptions' => ['style' => 'width:15%'],

            ],
            [
                'attribute' => 'plan_id',
                'filter' => \common\models\Plan::find()->indexBy('id')->select('status_plan')->column(),
                'headerOptions' => ['style' => 'width:15%'],
                'value' => function($model) {
                    /** @var $model \common\models\task */
                    $date = date('Y-m-d H:i:s');
                    $finish_date = $model->finish_date;
                    // var_dump($date);
                    if ($finish_date > $date) {
                        /** @var $model \common\models\plan */
                        return (\common\models\Plan::findOne(['id' => 1])->status_plan);
                    }
                    else {
                        return (\common\models\Plan::findOne(['id' => 2])->status_plan);

                    }
                },
                'format' => 'html'
            ],
            //'status',
            //'description',
            //'date_creation',
            //'date_update',
            [
                'attribute' => 'finish_date',
                'format' => 'datetime',
                'headerOptions' => ['style' => 'width:15%'],
            ],

            [
                 'attribute' => 'implementer',
                'filter' => \common\models\User::find()->indexBy('id')->select('username')->column(),
                'value' => function($model) {
                    return (\common\models\User::findOne(['id' => $model->implementer])->username);
                },

                'format' => 'html',
            ],


            //'creator',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}{delete}', 'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'update') {
                    $url = Yii::$app->urlManager->createUrl(['task/update', 'p_id' => $_GET['p_id'], 'id' => $model->id]);
                    return $url;
                }
                if ($action === 'view') {
                    $url = Yii::$app->urlManager->createUrl(['task/view', 'p_id' => $_GET['p_id'], 'id' => $model->id]);
                    return $url;
                }
                if ($action === 'delete') {
                    $url = Yii::$app->urlManager->createUrl(['task/delete', 'p_id' => $_GET['p_id'], 'id' => $model->id]);
                    return $url;
                }

            }
            ],
        ],
    ]); ?>
</div>
<?php
 $this->registerJs("
    $('td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if (e.target == this && id)
            location.href = '" . Yii::$app->urlManager->createUrl(['task/view', 'p_id' => $_GET['p_id']]) . "&id='+ id;
    });
");

    
?>

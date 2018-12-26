<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model common\models\Task */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index', 'p_id' => $_GET['p_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'p_id' => $_GET['p_id']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'task_name',
            'status_name',
         [
                 'attribute' => 'plan_status',
                 'value' => function($model) {
                   /** @var $model \common\models\task */
                   $date = date('Y-m-d H:i:s');
                   $finish_date = $model->finish_date;
                   // var_dump($date);
                   if ($finish_date > $date) {
                       /** @var $model \common\models\plan */
                       return \common\models\Plan::findOne(['id' => 1])->status_plan;
                   }
                   else {
                       return \common\models\Plan::findOne(['id' => 2])->status_plan;
                   }


                },
                'format' => 'html'
          ],
          [
                'attribute' => 'description',
                 'format' => 'html'
          ],

            'date_creation',
            'date_update',
            'finish_date',
         [
                 'attribute' => 'implementer',
                 'value' => function ($model) {
                 $id = $model->implementer;
                        return \common\models\User::findOne($id)->username;
                 },

         ],

         [
                 'attribute' => 'creator',
             'value' => function ($model) {
                 $id = $model->creator;
                 return \common\models\User::findOne($id)->username;
             }
         ],



        ],
    ]) ?>

</div>

    <!-- websocket  -->
    <div>
        <form action="#" name="chat_form" id="chat_form">
            <label>
                Input the message
                <input type="text" name="message"/>
                <input type="submit" value="Send"/>
            </label>
        </form>
        <hr>
        <div id="root_chat"></div>
        <hr>
    </div>

<?php
//use Yii;
$username = \Yii::$app->user->identity->username;
?>
<script>
  var username = '<?php echo $username?>';
</script>

<?php
$this->registerJsFile ("@web/js/client.js");

//echo 'Привет, ' . htmlspecialchars($_GET["id"]) . '!';
//$taskID = $_GET["id"];
//echo 'Привет, ' . $taskID . '!';

?>
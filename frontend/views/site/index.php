<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
    /* @var $this yii\web\View */


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>The simple Task Tracker!</h1>

        <p class="lead">You are welcome to track your project and it's tasks here!</p>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Laconic</h2>

                <p>Nothing should distract from project implementation. This is the basis for focused work on tasks.</p>


            </div>
            <div class="col-lg-4">
                <h2>Functional</h2>

                <p>The necessary functions to control the development of projects and their tasks are ready out of the box.</p>


            </div>

            <div class="col-lg-4">
                <h2>Free</h2>

                <p>Use of this service is completely free. All the time.</p>

                <!-- Pjax simple example here -->
                <?php   Pjax::begin(); ?>
                <?= $response; ?>

                <?= Html::a("", ['site/index'], ['class' => 'refresh-btn'])?>
                <!-- hidden buttons here, class btn btn-success or btn-alert -->
                <?= Html::a("", ['site/date'], ['class' => ''])?>
                <?php Pjax::end(); ?>

            </div>


</div>

</div>
</div>


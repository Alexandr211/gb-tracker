<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <h4>Hello! My name is Alexander Bashtanov</h4>
    <br>
    <p>During the development of this application, the following features of Yii2 advanced template were used.
        <br>
        <br> 1. The current time at the main page renders with PJAX.
       <br> 2. RBAC and ACF access filters is applied.
       <br> 3. PHP Unit test controls code algorithm.
       <br> 4. The Chat based on websocket technology is implemented on the Task page. Each Task has it's own Chat with unique history saved in data base.
       <br>  5. Each project has it's own tasks.
       <br>  6. Restful API functionality is implemented to obtain information about Tasks and to manage only user's tasks (by login and password).
       <br>  7. Helpers are also applied in the code.

    </p>
    <br>
    <p>You can get the code of the Task Tracker <?=Html::a('here', 'https://github.com/Alexandr211/gb-tracker.git')?> and use it for free. </p>

</div>

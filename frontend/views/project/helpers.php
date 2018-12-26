<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.12.18
 * Time: 12:36
 */

use common\helpers\ExampleHelper;
use common\helpers\Html;
use \common\models\Project;

?>

<?= Html::encode("Content > sub content"); ?>
<?= Html::alert("Content"); ?>
<?= ExampleHelper::dosomething("content"); ?>

<?php

    $project = new Project();
    $project->project_name = 'My project';
    $array = [
        'wrong key' => 'wrong value',
    'projects' => [
        'project0' => $project,
    ],
];

    $projectName = isset($array['projects']['project0']) ? $array['projects']['project0']->project_name : null;
    $projectNames = \yii\helpers\ArrayHelper::getValue($array, 'projects.project0.project_name', 'Default value');
//My project
    \yii\helpers\ArrayHelper::remove($array, 'wrong key');
    \yii\helpers\ArrayHelper::keyExists('wrong key', $array);
    array_key_exists('wrong key', $array);

    $list = [
        ['id' => 'id1', 'name' => 'first'],
        ['id' => 'id2', 'name' => 'second'],
        ['id' => 'id3', 'name' => 'third'],
    ];
    \yii\helpers\ArrayHelper::getColumn($list, 'id');
    //['id1', 'id2', 'id3']

    echo Html::tag('p', 'My content', ['class' => 'my class']);


?>
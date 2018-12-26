<?php
namespace common\helpers;



class Html extends \yii\helpers\Html
{
    public static function alert ($content)
    {
        return Html::tag("Div", $content, ["class" => "alert alert-info"]);
    }
}
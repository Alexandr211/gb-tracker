<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.12.18
 * Time: 18:04
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\Exception;
use SonkoDmitry\Yii\TelegramBot\Component;

/**
 * Class TelegramBotController
 * @package frontend\controllers
 */
class TelegramBotController extends Controller
{


    public function actionIndex()
    {
        $data = "";
        $bot = Yii::$app->bot;

       /** @var Component $bot */

       // var_dump($bot);
        try {
         //   $bot->sendMessage(778396141, 'Hello, World!');
              $updates = $bot->getUpdates();
              var_dump($updates); die();
         //   foreach($updates as $update){
         //       $user_id = $update->getMessage()->getFrom()->getID();
          //      Yii::$app->bot->sendMessage($user_id, 'Index action was requested!');
          //  }

          //  $data = print_r($bot->getUpdates(), 1);
        }
        catch (Exception $e){
            $data = $e->getMessage();
        }
      //  return $this->render('index', ['data' => $data]);
    }

}
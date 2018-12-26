<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.12.18
 * Time: 21:59
 */

namespace console\controllers;
use Yii;
use yii\console\Controller;


class ServerController extends Controller
{
    function actionInit()
    {
        $server = \Ratchet\Server\IoServer::factory(
            new \Ratchet\Http\HttpServer(
                new \Ratchet\WebSocket\WsServer(
                    new \console\models\Chat()
                )
            ),
            8080
        );
        $server->run();
    }
}
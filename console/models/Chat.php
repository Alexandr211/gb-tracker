<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.12.18
 * Time: 22:24
 */

namespace console\models;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use common\models\Chatws;
use yii\helpers\Json;

class Chat implements MessageComponentInterface
{
    protected $clients;
 //   private $tasks;

    /**
     * Chat constructor.
     * @param $clients
     */
    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
     //   $this->tasks = [];

    }


    function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
        $this->clients->attach($conn);
        echo "\nNew connection: {$conn->resourceId}\n";
      //  $model = Chatws::find()->all();
       // $send = Json::encode($model);

       $msg = null;
       $this->onMessage($conn, $msg);

    }


    function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
        $this->clients->detach($conn);
        echo "\nUser {$conn->resourceId} disconnected!\n";

    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
        $conn->close();
        echo "\nConnection {$conn->resourceId} closed with errors!\n";
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
        echo "\nMessage {$msg} from {$from->resourceId}\n";

      // $msg = json_decode($msg);
     //  echo($test->id);
        if($msg === null) {
           $model = Chatws::find()->all();
           $msg = Json::encode($model);
           $from->send($msg);
        }
        else {
    foreach ($this->clients as $client) {
        $client->send($msg);
    }
               $chatMsg = json_decode($msg);
               $model = new Chatws();
               $model->msg = $chatMsg->msg;
               $model->taskId = $chatMsg->taskId;
               $model->username = $chatMsg->username;
               $model->save();
    }


    }
}
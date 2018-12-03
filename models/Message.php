<?php
use MongoDb\BSON\ObjectID;
require_once '../init.php';

/**
* @property  is_me
*/
class Message
{
    var $data;

    public static function find_by_id($id)
    {
        $r = db()->Messages->findOne(['_id' => new ObjectID($id)]);
        return new Message($r);
    }

    public function __construct($data)
    {
        $this->data = $data;
    }

//name isusername
    public function __get($name)
    {
        return $this->data->$name;
    }

    public function __set($name, $value)
    {
        $this->data->$name = $value;
    }

    public function isMe($msg) {
        if($msg->from ==(User::find_by_id($_SESSION['_id'])->_id.'')){
            return true;
        }else {
            return false;
        }
}
    public function convertToArray(){
        return @[
            '_id' => $this->_id . '',
            'from' =>$this->from,
            'to' => $this->to,
            'text'=> $this->text,
            'isMe'=> $this->isMe($this)
        ];
    }
}
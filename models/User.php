<?php

use MongoDb\BSON\ObjectID;

/**
 * @property  friends,id,username,name,email
 */
class User
{
    var $data;

    public static function find_by_id($id) {
        $r = db()->users->findOne(['_id'=>new ObjectID($id)]);
        return new User($r);
    }

    public static function find_by_key($key,$value) {
        $user = db()->users->findOne([$key=>$value]);
        return new User($user);
    }

    public function __construct($data)
    {
        $this->data=$data;
    }

    //name isusername
    public function __get($name)
    {
        return $this->data->$name;
    }
    public function __set($name,$value) {
        $this->data->$name = $value;
    }

    public function isFriend($id) {

        if($this->friends==null)
            return false;

        return in_array($id,$this->friends->getArrayCopy());
    }
    public function getAvatar()
    {
        return '../img/farehe.jpg';
    }

    public function isReported($id) {
        if($this->reporteds==null) {
            return false;
        }
        return in_array($id,$this->reporteds->getArrayCopy());
    }

    public static function  currentArrayForm() {
        $current = User::find_by_id($_SESSION['_id']);
        return $current->convertToArray(true,false);
    }

    public static function  currentRaw() {
        $current = User::find_by_id($_SESSION['_id']);
        return $current;
    }

    public function update ($data,$options=[]) {
       $this->data = db()->users->findOneAndUpdate(['_id'=>$this->_id],$data,$options);
    }

    public function convertToArray($isFriend,$isReported) {
        //if the user has reported contacts
        if($this->reporteds!=null) {
            $reporteds=$this->reporteds->getArrayCopy();
        }else {
            $reporteds=[];
        }
        //if user has any friend
        if($this->friends!=null) {
            $friends=$this->friends->getArrayCopy();
        }else {
            $friends=[];
        }

        if($this->reporters!=null) {
            $reporters=$this->reporters->getArrayCopy();
        }else {
            $reporters=[];
        }


        return @[
            '_id'=>$this->_id.'',
            'username'=>$this->username,
            'name'=>$this->name,
            'avatar'=>$this->getAvatar(),
            'email'=>$this->email,
            'birthday'=>$this->birthday,
            'biography'=>$this->biography,
            'phone'=>$this->phone,
            'type'=>$this->type,
            'isFriend'=>$isFriend,
            'isReported'=>$isReported,
            'reporteds'=>$reporteds,
            'reporters'=>$reporters,
            'friends'=>$friends,
            'admin'=>$this->admin
        ];

    }

}
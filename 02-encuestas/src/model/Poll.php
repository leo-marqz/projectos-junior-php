<?php

namespace Leomarqz\Encuestas\Model;

use PDO;
use PDOException;

class Poll extends Database
{

    private int $id;
    private string $uuid;
    private string $title;
    private array $options;

    public function __construct(string $title, bool $createUUID = true)
    {
        parent::__construct();
        $this->title = $title;
        if($createUUID)
        {
            $this->uuid = uniqid();
        }
        $this->options = [];
    }

    public function save():bool
    {
        $query = $this->connect()->prepare("INSERT INTO polls(uuid, title) VALUES(:uuid, :title)");
        $params = array(':uuid'=>$this->uuid, ':title'=>$this->title);
        $rs1 = $query->execute($params);

        $query = $this->connect()->prepare("SELECT * FROM polls WHERE uuid = :uuid");
        $params = array(':uuid'=>$this->uuid);
        $rs2 = $query->execute($params);
        
        $this->id = $query->fetchColumn();

        if ($rs1 == true && $rs2 == true) return true;
        return false;
    }

    public function insertOptions(array $options)
    {
        foreach ($options as $option) {
            $query = $this->connect()->prepare("INSERT INTO options(poll_id, title, votes) VALUES(:poll_id, :title, 0)");
            $params = array(':poll_id'=>$this->id, ':title'=>$option);
            $query->execute($params);
        }
    }

    public static function getPolls()
    {
        $polls = [];
        $db = new Database();
        $query = $db->connect()->query("SELECT * FROM polls");
        while($rs = $query->fetch(PDO::FETCH_ASSOC))
        {
            $poll = Poll::createFromArray($rs);
            array_push($polls, $poll);
        }
        return $polls;
    }

    public static function createFromArray(array $arr):Poll
    {
        $poll = new Poll($arr['title'], false);
        $poll->setId($arr['id']);
        $poll->setUUID($arr['uuid']);
        return $poll;
    }

    public static function find(string $uuid)
    {
        $db = new Database();
        $query = $db->connect()->prepare("SELECT * FROM polls WHERE uuid = :uuid");
        $params = ['uuid'=>$uuid];
        $query->execute($params);
        $rs = $query->fetch();
        $poll = Poll::createFromArray($rs);
        
        $query = $db->connect()->prepare("SELECT * FROM polls INNER JOIN options ON polls.id = options.poll_id WHERE polls.uuid = :uuid");
        $query->execute(['uuid'=>$uuid]);

        while($rs = $query->fetch(PDO::FETCH_ASSOC))
        {
            $poll->includeOption($rs);
        }
        return $poll;
    }

    public function vote(int $optionId):Poll
    {
        $query = $this->connect()->prepare("UPDATE options SET votes = votes + 1 WHERE id = :id");
        $params = ['id'=>$optionId];
        $query->execute($params);

        $poll = Poll::find($this->uuid);
        return $poll;
    }

    public function getTotalVotes()
    {
        $total = 0;
        foreach($this->options as $option)
        {
            $total = $total + $option['votes'];
        }
        return $total;
    }

    public function includeOption(array $arrOption)
    {
        array_push($this->options, $arrOption);
    }

    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }
    public function setUUID(string $uuid):void
    {
        $this->uuid = $uuid;
    }

    public function getUUID():string
    {
        return $this->uuid;
    }

    public function setTitle(string $title):void
    {
        $this->title = $title;
    }

    public function getTitle():string
    {
        return $this->title;
    }

    public function getOptions():array
    {
        return $this->options;
    }
}






?>
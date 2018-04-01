<?php
/**
 * Created by PhpStorm.
 * User: EChoual
 * Date: 30/03/2018
 * Time: 11:00
 */

namespace Chat\Repository;

use Chat\Entities\Model;
class CrudRepository
{
    private static $instance = NULL;
    private $tableName;
    private $className;


    public function __construct($className,$tableName) {
        \Database::getInstance();
        $this->className=$className;
        $this->tableName=$tableName;
    }


    public function add(Model $model)
    {
        $query = "INSERT INTO {$this->tableName}(";
        $queryName = [];
        $queryArg = [];
        $fieldVal = [];

        foreach ($model->toArray() as $keyName => $keyVal) {
            $queryName[] = $keyName;
            $queryArg[] = "?";
            $fieldVal[] = $keyVal;
        }

        $query .= implode(',', $queryName).') VALUES('.implode(',', $queryArg).')';
        $req = \Database::getInstance()->prepare($query);
       // // var_dump($req);
        $res = $req->execute($fieldVal);

        if ($res) {
            $id = \Database::getInstance()->lastInsertId();
            $model->setId($id);

            return $id;
        } else {
            // var_dump( $query->errorInfo());
        }

    }
    public function delete(Model $model)
    {
        $query = "DELETE FROM {$this->tableName} WHERE id = ?";
        $req = \Database::getInstance()->prepare($query);
        $req->execute($model->getId());
    }

    public function updateConnect(Model $model)
    {

        $query = "UPDATE {$this->tableName} SET connected_at = ?, connected = ? where id = ?";
        $fieldVal = [];
        $fieldVal[]=$model->getConnectedAt();
        $fieldVal[]=$model->getConnected();
        $fieldVal[]=$model->getId();
        $req = \Database::getInstance()->prepare($query);
        $res = $req->execute($fieldVal);

    }
    public function getObject(array $fields = [],$sort=['id'=>'desc'])
    {
        $query = $this->getObjectBy($fields,$sort);
        $result = $query->fetch();
        // var_dump($result);
        if($result){
            $entity="Chat\Entities\\".ucfirst($this->className);
            $entity = new $entity();
            $entity->hydrate($result);
            // var_dump($entity);
            return $entity;
        }
        return null;

    }
    protected function getObjectBy(array $fields = [],$sort=['id'=>'desc'])
    {
        $searchValues = [];

        $statement = "SELECT * FROM {$this->tableName}";

        if (!empty($fields)) {
            $statement .= ' where 1=1 ';
            foreach ($fields as $fieldName => $fieldValue) {
                $statement .= "AND $fieldName = ? ";
                $searchValues[] = $fieldValue;
            }
        }
        if(!empty($sort)){
            $statement .= ' order by  ';
            foreach ($sort as $key=>$value){

                $statement.="$key $value";
            }
        }

        $query = \Database::getInstance()->prepare($statement);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        $result=$query->execute($searchValues);

        if ($result) {
            return $query;
        } else {
        }

    }
    public function getAll(array $fields = [],$sort=['id'=>'desc'])
    {
        $arrayResult = [];

        $result = $this->getObjectBy($fields,$sort);
        foreach ($result as $element) {
            $entity="Chat\Entities\\".ucfirst($this->className);

            $ent = new $entity();
            $ent->hydrate($element);
            $arrayResult[] = $ent;
        }
        $result=$arrayResult;
        //// var_dump($result);

        return $result;
    }
}
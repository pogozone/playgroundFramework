<?php

namespace App\Controllers;

class MongodbController {

    public $app = '';

    public function __construct($app) {
        $this->app = $app;
    }

    public function connect() {
        $this->app['mongodb']['client'] = new \MongoDB\Driver\Manager($this->app['mongodb']['MONGODB_URL']);
    }

    public function findBy($filter = []) {
        $result = [];
        $this->connect();
        $query = new \MongoDB\Driver\Query($filter);
        $cursor = $this->app['mongodb']['client']->executeQuery($this->app['mongodb']['MONGODB_COLLECTION'], $query);
        foreach ($cursor->toArray() as $obj) {
            $id = (string)$obj->_id;
            $item = [];
            foreach ($obj as $type => $value) {
                if ($type == "_id")
                    $item['id'] = $id;
                else
                    $item[$type] = $value;

            }
            $result[] = $item;
        }
        return $result;
    }

    public function findByID($id) {
        $id = new \MongoDB\BSON\ObjectID($id);
        $filter = ['_id' => $id];
        $result = $this->findBy($filter);
        return $result[0];
    }

    public function findAll() {
        return $this->findBy();
    }

    public function update($id, $obj) {
        $id = new \MongoDB\BSON\ObjectID($id);
        $bulk = new \MongoDB\Driver\BulkWrite;
        $bulk->update(
            ['_id' => $id],
            ['$set' => $obj],
            ['multi' => false, 'upsert' => true]
        );
        $writeConcern = new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY, 100);
        $result = $this->app['mongodb']['client']->executeBulkWrite('db.Plant', $bulk, $writeConcern);
    }

}

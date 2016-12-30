<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$mongo = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
        $query = new MongoDB\Driver\Query(['name' => 'pong']);
        $rows = $mongo->executeQuery('yann.yuntao', $query);
        foreach($rows as $r){
           echo $r->name;
        }
        die;
    	//echo 'pong';die;
    }

}


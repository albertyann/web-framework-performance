<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        echo 'index';
        exit;
    }

    public function pong()
    {
        $mongo = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
        $query = new MongoDB\Driver\Query(['name' => 'pong']);
        $rows = $mongo->executeQuery('yann.yuntao', $query);
        foreach($rows as $r){
           echo $r->name;
        }
        // echo 'pong';
    }
}

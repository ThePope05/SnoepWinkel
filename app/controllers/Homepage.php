<?php

class Homepage extends BaseController
{
    private $model;

    public function __construct()
    {
        #
    }

    public function index()
    {
        $data = [
            'title' => 'Homepage'
        ];

        $this->view('Homepage/index', $data);
    }
}

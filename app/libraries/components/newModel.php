<?php

class MODEL_NAME extends BaseModel
{
    //This is required for every Model
    public function __construct()
    {
        //Here you can call the parent constructor, no need to change this
        parent::__construct();

        //Here you can set the table and the fillable fields

        //This is the name of the table, this is only used for the default CRUD methods
        //For custom queries you will have to write the query yourself
        $this->table = 'TABLE_NAME';

        //This is an array of the fields that can be filled and updated
        //This is only used for the default CRUD methods
        //The Read and Delete methods do not use this
        $this->fillable = [
            'COLUMN_NAME',
            'COLUMN_NAME'
        ];
    }

    //Example of a query
    public function index(int $id)
    {
        //Here you can write your query
        $this->db->query("SELECT * FROM TABLE_NAME WHERE id = :id");

        //Here you can bind your parameters
        $this->db->bind(':id', $id);

        //Here you can execute your query and return the result if you want
        return $this->db->execute(true);
    }
}

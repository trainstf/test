<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 07.11.17
 * Time: 13:50
 */

class DbConnection
{

    public $dbconn;

    public function __construct($type, $connection_string)
    {
        if ($type == NULL) {
            //error
        } elseif ($type == 1) {
            $this->dbconn = pg_pconnect($connection_string);
        }
    }
    /*
    public function __destruct($type)
    {
        if ($type == NULL) {
            //error
        } elseif ($type == 1) {
            pg_close($this->dbconn);
        }

        // TODO: Implement __destruct() method.
    }
    */
    public function Query($tables,$inner,$where){
        //check variable
        $query = "SELECT * FROM '".$tables."' INNER JOIN '".$inner."' WHERE '".$where."'";
        $result = pg_query($query) or die ('Ошибка запроса: ' . pg_last_error());
        return $result;
    }
}
//example create
$db = new DbConnection(1,"host=localhost port=5432 dbname=mary");
echo $db->Query("users","","");
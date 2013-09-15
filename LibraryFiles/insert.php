<?php
    class db_insert {
        //Objects of this class type require an object to be used of the class type db_connect for composition purposes.
        //main Class variable members

        public $inserting;
        public $tablename;
        public $dbValues;
        public $query;

        //There is no constructor function, instead users should decide to have a query generated for them or to use the query function to input their own
        public function gen_query($valuesToInsert, $DataBaseValues, $tablename){
            //Generate the query to the database with the simple inputted information
            $this->inserting = $valuesToInsert;
            $this->dbValues = $DataBaseValues;
            $this->tablename = $tablename;
            //Create the queryresult Variable
            $queryResult = "INSERT INTO {$this->tablename} ({$this->dbValues}) VALUES ({$this->inserting});";
            //return the result as a handle for the function - function can be used as a handle and re-used to develop more queries
            return $queryResult;
        }

        public function insert_query($insertedQuery, $handleorNot){
            //Escaoe the string to prevent any SQL injection or security issues
            $this->query = mysqli_real_escape_string($insertedQuery);
            //test for handle use
            if($handleorNot == TRUE){
                //return the query as the function handle (RECOMMENDED)
                return $this->query;
            }elseif($handleorNot == FALSE){
                //Echo out the query (NOT-RECOMMENDED)
                echo "The Query you generated, after escaped, was : {$this->query}";
            }else{
                //there is a problem and an error message will be returned as the handle instead
                $errorMsg = "You cannot set a non-bool as the handle conditional, please re-create this query";
                //Return Message
                return $errorMsg;
            }
        }

    }

    echo "<h1>No Errors Mate!</h1>";

?>

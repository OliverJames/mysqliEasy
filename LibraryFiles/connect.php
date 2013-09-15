<?php
    class mysqli_connection {
        //Define the starter variable members (public) for the later connection classes' __construct and methods
        public $db_name;
        public $db_host;
        public $db_user;
        public $db_password;
        public $db_charset;

        public function __construct($db_name, $db_host, $db_user, $db_password, $db_charset = 'UTF-8'){
            //Assign the construct variables to the public member variables of this class for access during the preceding connection classes' methods
            $this->db_name = $db_name;
            $this->db_host = $db_host;
            $this->db_user = $db_user;
            $this->db_password = $db_password;
            $this->db_charset = $db_charset;
        }

        public function createConnection(){
            //Create the constants for security during the connection period, based on the inputted variables in __construct
            $_host = $this->db_host;
            $_user = $this->db_user;
            $_password = $this->db_password;
            $_name = $this->db_name;
            //Create the connection to the mysqli database with the inputted data (the constants for security only when this connection is defined
            $dbc = @mysqli_connect($_host, $_user, $_password, $_name) or die("There was an error causing the dataBase Connection to fail, please check that you have inserted all the necessary, corresponding data required:<br/><br/>" . mysqli_connect_error() );
            //The use can now use the connection variable $dbc within this class or the variable $objectName->dbc outside.
            //Creation of database charset based on the optional constructor input (default = 'UTF-8')
            mysqli_set_charset($dbc, $this->db_charset);
        }

        //The following code could be included from a trait should it be used a lot...

        public function editHost($newHost){
            //Check for the variable's existance:
            if(!isset($_host)){
                //Echo the necessary notice if there is no variable to change
                echo "Please Define a Connection before changing the host.";
            }else{
                //Set the class variable to the new value:
                $_host = $newHost;
                //Implement the new variable in the database connection: 
                $this->createConnection();
            }
        }

        public function edituser($newUser){
            //Check for the variable's existance:
            if(!isset($_user)){
                //Echo the necessary notice if there is no variable to change
                echo "Please Define a Connection before changing the User.";
            }else{
                //Set the class variable to the new value:
                $_user = $newUser;
                //Implement the new variable in the database connection: 
                $this->createConnection();
            }
        }

        public function editpassword($newPassword){
            //Check for the variable's existance:
            if(!isset($_password)){
                //Echo the necessary notice if there is no variable to change
                echo "Please Define a Connection before changing the Password.";
            }else{
                //Set the class variable to the new value:
                $_password = $newPassword;
                //Implement the new variable in the database connection: 
                $this->createConnection();
            }
        }

        public function editname($newName){
            //Check for the variable's existance:
            if(!isset($_name)){
                //Echo the necessary notice if there is no variable to change
                echo "Please Define a Connection before changing the Name.";
            }else{
                //Set the class variable to the new value:
                $_name = $newName;
                //Implement the new variable in the database connection: 
                $this->createConnection();
            }
        }
    }
?>

<?php
require_once __DIR__.'/Controller.php';

class AuthController extends Controller
{
    public function renderView()
    {
        $this->view('auth/login.php');
    }

    public function login()
    {
        $userName = $_POST['username'];
        $password = $_POST['password'];

        try {
            $result = $this->sql(
                "SELECT * FROM road_app.users WHERE `username` = '$userName' AND `password` = '$password'"
            )->execute();
            
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
            } 

            if($count > 0){
                $data = true;
                echo $_SESSION["verified"] = "admin";
            }else{
                $data = false;
            }
          
            $code = 200;
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }
    }

    public function logout()
    {
        session_destroy();
    }
}

?>
<?php

require_once __DIR__.'/Controller.php';

class WebController extends Controller
{
    public function renderView()
    {
        $this->view('components/web/main-view.php');
    }

    public function getLocations()
    {
        return $this->sql('SELECT a.*,b.name as signage_name FROM road_app.locations a LEFT JOIN road_app.signages b ON a.signage_id = b.id')->execute();
    }

    public function getSignages()
    {
        return $this->sql('SELECT * FROM road_app.signages')->execute();
    }

    //location
    public function createLocation()
    {
        $name = $_POST['name'];
        $signage_id = $_POST['signage_id'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $code = 200;
        try {
            $data = $this->sql(
                "INSERT INTO road_app.locations (name,signage_id,latitude,longitude) 
                VALUES ('$name',$signage_id,'$latitude','$longitude')"
             )->execute();
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function deleteLocation()
    {
        $id = $_POST['id'];
        $code = 200;
        try {
            $data = $this->sql("DELETE FROM road_app.locations WHERE id = $id")->execute();
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function editLocation()
    {
        $id = $_POST['id'];
        $code = 200;
        try {
            $result =  $this->sql("SELECT * FROM road_app.locations WHERE id = $id")->execute();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }        
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function updateLocation()
    {
        $id = $_POST['id'];
        echo $name = $_POST['name'];
        $signage_id = $_POST['signage_id'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $code = 200;
        try {
            $data = $this->sql(
                "UPDATE road_app.locations SET `name` = '$name', signage_id = $signage_id, latitude = $latitude, longitude = $longitude WHERE id = $id"
            )->execute();
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
        
    }

    //signage
    public function createSignage()
    {
        $name = $_POST['name'];
        $image = null;
        $alert_distance = $_POST['alert_distance'];
        $alert_sound = $_POST['alert_sound'];
        $active = $_POST['active'];
        $code = 200;

        if(!empty($_FILES["signage-image"]["name"])) { 
            $fileName = basename($_FILES["signage-image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $format = $_FILES['signage-image']['tmp_name']; 
            $image = addslashes(file_get_contents($format));
        }

        try {
            $data = $this->sql(
                "INSERT INTO road_app.signages (name,image,alert_distance,alert_sound,active) 
                VALUES ('$name','$image','$alert_distance','$alert_sound','$active')"
             )->execute();
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function deleteSignage()
    {
        $id = $_POST['id'];
        $code = 200;
        try {
            $data = $this->sql("DELETE FROM road_app.signages WHERE id = $id")->execute();
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function editSignage()
    {
        $id = $_POST['id'];
        $code = 200;

        try {
            $result =  $this->sql("SELECT * FROM road_app.signages WHERE id = $id")->execute();
            while ($row = mysqli_fetch_assoc($result)) {
                $data = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'image' => 'data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']),
                    'alert_distance' => $row['alert_distance'],
                    'alert_sound' => $row['alert_sound'],
                    'active' => $row['active']
                ];
            }        
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
    }

    public function updateSignage()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $image = null;
        $alert_distance = $_POST['alert_distance'];
        $alert_sound = $_POST['signage-alert_sound'];
        $active = $_POST['active'];
        $code = 200;

        if(!empty($_FILES["signage-image"]["name"])) { 
            $fileName = basename($_FILES["signage-image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $format = $_FILES['signage-image']['tmp_name']; 
            $image = addslashes(file_get_contents($format));
        }

        try {
            if($image){
                $data = $this->sql(
                    "UPDATE road_app.signages SET `name` = '$name', image = '$image', alert_distance = '$alert_distance', alert_sound = '$alert_sound', active = $active WHERE id = $id"
                )->execute();
            }else{
                $data = $this->sql(
                    "UPDATE road_app.signages SET `name` = '$name', alert_distance = '$alert_distance', alert_sound = '$alert_sound', active = $active WHERE id = $id"
                )->execute();
            }
        } catch(Exception $e) {
            $data = $e->getMessage();
            $code = 500;
        }

        $response = array(
            'status' => $code,
            'data'   => $data
        );
        
        echo(json_encode($response));
        
    }
}

?>
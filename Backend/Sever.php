<?php
require_once './class/Vehicle.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $price = $_POST['price'];

    
    // check if the variables are set
    if (isset($name) && isset($model) && isset($year) && isset($color) && isset($price)) {

        //  check if everything is empty 
        if (empty($name) || empty($model) || empty($year) || empty($color) || empty($price)) {
     echo json_encode([
              'status' => 'error',
              'message' => 'Please fill in all fields'
         ]);    
        } else {
            $vehicle = new Vehicle();

            // Get form data that has been inputed and assign it to the create vehicle 
            $vehicle->createVehicle($_POST['name'], $_POST['model'], $_POST['year'], $_POST['color'], $_POST['price']);
            echo json_encode([
                'status'=>'success',
                'message'=>'Vehicle added successfully',
                'data'=>[
                    'name'=>$vehicle->getVehicleName(),
                    'model'=>$vehicle->getVehicleModel(),
                    'year'=>$vehicle->getVehicleYear(),
                    'color'=>$vehicle->getVehicleColor(),
                    'price'=>$vehicle->getVehiclePrice()
                ]
                ]);
            
        }
    } else {
       echo json_encode([
              'status' => 'error',
              'message' => 'Please fill in all fields'
         ]);
   
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Method not allowed'
    ]);
}
?>
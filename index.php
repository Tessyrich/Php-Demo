<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Form</title>
    <style>
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
        }
        .container form div {
            margin-bottom: 15px;
        }
        .container form label {
            display: block;
            margin-bottom: 5px;
        }
        .container form input, .container form button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        .vehicle-details {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>

<?php
class Vehicle {
    // Vehicle Properties
    public $vehicleName;
    public $vehicleModel;
    public $vehicleYear;
    public $vehicleColor;
    public $vehiclePrice;

    // Method for creating the vehicle properties
    public function createVehicle($vehicleName, $vehicleModel, $vehicleYear, $vehicleColor, $vehiclePrice){
        $this->vehicleName = $vehicleName;
        $this->vehicleModel = $vehicleModel;
        $this->vehicleYear = $vehicleYear;
        $this->vehicleColor = $vehicleColor;
        $this->vehiclePrice = $vehiclePrice;
    }

    // Method to display vehicle details
    public function showDetails() {
        echo "<div class='vehicle-details'>";
        echo "<h2>Vehicle Details</h2>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($this->vehicleName) . "</p>";
        echo "<p><strong>Model:</strong> " . htmlspecialchars($this->vehicleModel) . "</p>";
        echo "<p><strong>Year:</strong> " . htmlspecialchars($this->vehicleYear) . "</p>";
        echo "<p><strong>Color:</strong> " . htmlspecialchars($this->vehicleColor) . "</p>";
        echo "<p><strong>Price:</strong> $" . htmlspecialchars($this->vehiclePrice) . "</p>";
        echo "</div>";
    }
}
?>

<div class="container">
    <h2>Add Vehicle</h2>
    <form method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" required>
        </div>
        <div>
            <label for="year">Year:</label>
            <input type="number" id="year" name="year" required>
        </div>
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <button type="submit">Add Vehicle</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (isset($_POST['name'], $_POST['model'], $_POST['year'], $_POST['color'], $_POST['price'])) {
            $vehicle = new Vehicle();

            // Get form data that has been inputed and assign it to the create vehicle 
            $vehicle->createVehicle($_POST['name'], $_POST['model'], $_POST['year'], $_POST['color'], $_POST['price']);
            $vehicle->showDetails();
        } else {
            echo "<div class='vehicle-details'>";
            echo "<p style='color: red;'>Please fill in all fields.</p>";
            echo "</div>";
        }
    }
    ?>
</div>

</body>
</html>

<?php
class Vehicle
{
    // Vehicle Properties
    private $vehicleName;
    private $vehicleModel;
    private $vehicleYear;
    private $vehicleColor;
    private $vehiclePrice;

    // Method for creating the vehicle properties
    public function createVehicle($vehicleName, $vehicleModel, $vehicleYear, $vehicleColor, $vehiclePrice)
    {
       $this->vehicleName = $vehicleName;
        $this->vehicleModel = $vehicleModel;
        $this->vehicleYear = $vehicleYear;
        $this->vehicleColor = $vehicleColor;
        $this->vehiclePrice = $vehiclePrice;
    }

    // create setters and getters
    public function setVehicleName($vehicleName)
    {
        $this->vehicleName = $vehicleName;
    }
    // set
    public function setVehicleModel($vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
    }
    // set
    public function setVehicleYear($vehicleYear)
    {
        $this->vehicleYear = $vehicleYear;
    }
    // set
    public function setVehicleColor($vehicleColor)
    {
        $this->vehicleColor = $vehicleColor;
    }
    // set
    public function setVehiclePrice($vehiclePrice)
    {
        $this->vehiclePrice = $vehiclePrice;
    }


    public function getVehicleName()
    {
        return $this->vehicleName;
    }
    // get 
    public function getVehicleModel()
    {
        return $this->vehicleModel;

    }
    // get
    public function getVehicleYear()
    {
        return $this->vehicleYear;
    }

    public function getVehicleColor()
    {
        return $this->vehicleColor;
    }

    // get
    public function getVehiclePrice()
    {
        return $this->vehiclePrice;
    }

}
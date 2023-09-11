<?php
    require_once("CalculDistance.php");
    class CalculDistanceImpl implements CalculDistance{
        const R = 6378.137;
        public function __construct(){
            
        }
        public function calculDistance2PointsGPS(float $lat1, float $long1,float $lat2, float $long2) : float {
            $lat1_r = deg2rad($lat1);
            $long1_r = deg2rad($long1); 
            $lat2_r = deg2rad($lat2); 
            $long2_r = deg2rad($long2); 
            
            $result = self::R*acos(sin($lat2_r)*sin($lat1_r)+cos($lat2_r)*cos($lat1_r)*cos($long2_r-$long1_r));
            return $result;
        }
     
        public function calculDistanceTrajet(Array $parcours): float {
            $i = 1;
            $distance = 0;
            while($i < count($parcours)){
                $a = $this->calculDistance2PointsGPS($parcours[$i -1]["latitude"],
                $parcours[$i -1]["longitude"],$parcours[$i]["latitude"],
                $parcours[$i]["longitude"]);
                $distance = $distance + $a;
                $i = $i+1;
                }
                return $distance;
         }
    }
?>
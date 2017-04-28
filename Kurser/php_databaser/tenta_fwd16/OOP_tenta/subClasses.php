<?php

require_once ("aircraft.php");
require_once ("interface.php");
require_once ("trait.php");
error_reporting(-1);

//skapa klass som  implimentera interfacet
                                
class theInterceptor extends aircraft implements i_texaco{
    //use trait
    use tr_texaco;
    
    public $numberOfMissiles;
    
    public function __construct($numberOfMissiles, $aircraftDesignation, $speed, $range, $payload) {
        $this->numberOfMissiles = $numberOfMissiles;
        parent::__construct($aircraftDesignation, $speed, $range, $payload);
    }
}  
                                 /* interface */
class theBomber extends aircraft implements i_texaco{
    //use trait
    use tr_texaco;
    
    public $numberOfBombs;
    
    public function __construct($numberOfBombs, $aircraftDesignation, $speed, $range, $payload) {
        
        $this->numberOfBombs = $numberOfBombs;
        // kommunikation med klasser 
        parent::__construct($aircraftDesignation, $speed, $range, $payload);  
} 
}
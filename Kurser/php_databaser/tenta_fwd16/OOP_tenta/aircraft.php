<?php 
error_reporting(-1);

	abstract class aircraft {
		
            /*Konstanter och statiska  egenskaper, Konstanter måste sättas ett värde,
             som sen inte går att ändra på.*/ 
                const INFO = "WARNING!!! Boogie 9 oclock, Angels 5<br><br>";
                
             /* Statiska egenskaper går att ända men delas av alla instanser medans
             en variabel är unik för alla instanser av klassen*/
                static public $stat = "Go Juice, thanks Texaco<br><br>";


                /* Properties  */  
                
                //protected: enbart dem ärvda klasserna kan ärva den variabel och komma åt den
		protected $speed;
                protected $range;
                protected $payload;
                protected $aircraftDesignation;
                
                //här lägger vi in alla atributen från aircraft
                public function __construct($aircraftDesignation, $speed, $range, $payload ) {
        
                $this->aircraftDesignation = $aircraftDesignation;
                $this->speed = $speed;
                $this->range = $range;
                $this->payload = $payload;

                 }


                /* Methods */
                

    static public function stat() {

/* $this-> används enbart för instans variabler eller metoder*/ 

        echo self::INFO;
        echo self::$stat;
                    
                }

	}
<?php 
    //app/Config.php

    class Config {
        protected $parameters;

        public function __construct(){
            require __DIR__ . '/Config/parameters.php';
            $this -> parameters = $parameters;
            // A l'instanciation de Config, on récup les parameters déclarés  dans parameters.php et on les stocke dans notre propriété $parameters. 
        }
    }
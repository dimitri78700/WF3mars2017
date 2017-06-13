<?php

namespace Entity;

class Category {
    
    /*
     * @var int
     */
    private $id;
    
     /*
     * @var string
     */
    private $name;
    
  
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

     /*
     * @param int $id
     * @return this 
     */
    
    function setId($id) {
        $this->id = $id;
        
        return $this;
    }
    
     /*
     * @param string $name
     * @return this 
     */

    function setName($name) {
        $this->name = $name;
        
        return $this;
    }

}

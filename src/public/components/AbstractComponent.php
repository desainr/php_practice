<?php 
    abstract class AbstractComponent {  
        abstract function __construct();
        abstract function toComponent();
        abstract function getVars();
    }

?>
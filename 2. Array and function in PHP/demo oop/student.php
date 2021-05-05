<?php


class student{

    public $name;
    private $address;
    private $email;

    public function setName($value){
        $this->name=$value;
    }
    public  function getName(){
        return $this->name;
    }

    public function setAddress($value){
        $this->address=$value;
    }
    public function getAddress(){
        return $this->address;
    }

    public function setEmail($value){
        $this->email=$value;
    }
    public function getEmail(){
        return $this->email;
    }

}
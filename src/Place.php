<?php
  class Place
  {
    private $country_name;
      private $city_name;
      private $city_year;

      function __construct($country_name, $city_name, $city_year){
          $this->country_name = $country_name;
          $this->city_name = $city_name;
          $this->city_year = $city_year;
      }

      function setCountryName($new_country_name){
          $this->country_name = $new_country_name;
      }

      function getCountryName(){
          return $this->country_name;
      }

      function setCityName($new_city_name){
          $this->city_name = $new_city_name;
      }

      function getCityName(){
          return $this->city_name;
      }
      function setCityYear($new_city_year){
          $this->city_year = $new_city_year;
      }

      function getCityYear(){
          return $this->city_year;
      }


      function save()
      {
          array_push($_SESSION['cities'], $this);
      }

      static function getAll()
      {
          return $_SESSION['cities'];
      }

      static function clearAll()
      {
          $_SESSION['cities'] = array();
      }
  }

?>

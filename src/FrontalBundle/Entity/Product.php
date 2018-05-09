<?php
namespace FrontalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//src/FrontalBundle/Entity/Product.php

/**
* 
*
* @ORM\Table=(name="product")
* @ORM\Entity 
 */
class Product{
	/**
         * @ORM\Id 
         * @ORM\Column(type="integer") 
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;
        /**
         * @ORM\Column(type="string",length=50) 
         */
	private $code;
        /**
         * @ORM\Column(type="string",length=50) 
         */
	private $name;
        /**
         * @ORM\Column(type="string",length=255) 
         */
	private $detail;
        /**
         * @ORM\Column(type="string",length=50) 
         */
	private $brand; 
        /**
         * @ORM\Column(type="string",length=50) 
         */
	private $category;
        /**
         * @ORM\Column(type="integer") 
         */
	private $price;
	
	
        public function getId() {
            return $this->id;
        }

        public function getCode() {
            return $this->code;
        }

        public function getName() {
            return $this->name;
        }

        public function getDetail() {
            return $this->detail;
        }

        public function getBrand() {
            return $this->brand;
        }

        public function getCategory() {
            return $this->category;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setCode($code) {
            $this->code = $code;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setDetail($detail) {
            $this->detail = $detail;
        }

        public function setBrand($brand) {
            $this->brand = $brand;
        }

        public function setCategory($category) {
            $this->category = $category;
        }

        public function setPrice($price) {
            $this->price = $price;
        }

	
	
	
}

?>
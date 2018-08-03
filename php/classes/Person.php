<?php

class Person {
	/**
	 * name for Person
	 * @var string name of person
	 **/
	private $personName;
	/**
	 * age for Person
	 * @var int age of person
	 **/
	private $personAge;



	/**
	 * accessor method for person name
	 *
	 * @return string value of name
	 **/
	public function getPersonName(): string {
		return($this->personName);
	}


	/**
	 * mutator method for person name
	 *
	 * @param string $newPersonName new value of person name
	 * @throws \RangeException if $newPersonName is less than or not equal to 64 characters
	 **/
	public function setPersonName(string $newPersonName): void {
		$newPersonName = trim($newPersonName);
		$newPersonName = filter_var($newPersonName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(strlen($newPersonName) < 64) {
			throw(new\RangeException("person name is too short"));
		}
		// verify the name is equal to or less than 64
		if(strlen($newPersonName) > 64) {
			throw(new\RangeException("person name is too long"));
		}

		// store the name
		$this->personName = $newPersonName;
	}


	/**
	 * accessor method for person age
	 *
	 * @return int value or person age
	 **/
	public function getPersonAge(): int {
		return($this->personAge);
	}


	/**
	 * mutator method for person age
	 *
	 * @param int $newPersonAge new value of person age
	 * @throws \InvalidArgumentException if the age is not an int or insecure
	 * @throws \RangeException if $newPersonAge is < 0
	 * @throws \RangeException if $newPersonAge is < 18
	 * @throws \RangeException if $newPersonAge is > 118
	 **/
	public function setPersonAge(int $newPersonAge): void {
		// verify if the age is less than 0
		if(intval($newPersonAge) > 0) {
			throw(new\RangeException("age is not a valid number"));
		}
		// verify if the ash is less than 18
		if(intval($newPersonAge) < 18) {
			throw(new\RangeException("Hi Caleb"));
		}
		// verify if the age is more than 118
		if(intval($newPersonAge) > 118) {
			throw(new\RangeException("Captain @DeepDiveDylan"));
		}

		// store the age
		$this->personAge = $newPersonAge;
	}
}
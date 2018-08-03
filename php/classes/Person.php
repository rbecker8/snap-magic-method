<?php

class Person {
	/**
	 * age for Person
	 * @var int age of person
	 **/
	private $personAge;
	/**
	 * name for Person
	 * @var string name of person
	 **/
	private $personName;


	/**
	 * Person Constructor
	 * @param string $newPersonName
	 * @param int $newPersonAge
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g. strings to long, negative integers)
	 * @throws \TypeError if data type violates a data hint
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(string $newPersonName, int $newPersonAge) {
		try {
			$this->setPersonName($newPersonName);
			$this->setPersonAge($newPersonAge);
		} catch(\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			// determine what exception was thrown
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}


	/**
	 * Person Magic Method
	 * @param string $newPersonName
	 * @param int $newPersonAge
	 * @return string $newPersonName
	 * @return int $newPersonAge
	 *
	 **/
	public function __toString(string $newPersonName, int $newPersonAge) {
		return $this->personName . "(" . $this->personAge . ")\n";
	}

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

$toby = new Person('toby', 14);
echo $toby;
<?php

class ant {
	protected $health;
	
	public function __construct($value=100.00){
		$this->health = $value;
	}
	
	public function getHealthStatus(){
		$info = $this->health." (".$this->deadOrAlive().")";
		return $info;
	}
	public function getHealth(){
		return $this->health;
	}	
	
	public function damage($val){
		if ($this->health >= $this->minHealth){
			$this->health -= $val;
		}
	}
	
	public function deadOrAlive(){
		if ($this->health < $this->minHealth) 
			return "dead";
		else
			return "alive";
	}
}

class queenAnt extends ant {
	protected $minHealth = 20.000;
}
class soldierAnt extends ant {
	protected $minHealth = 66.000;
}
class workerAnt extends ant {
	protected $minHealth = 50.000;
}

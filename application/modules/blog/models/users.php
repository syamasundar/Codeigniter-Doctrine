<?php

namespace blog\models;

/**
 * @Entity
 * @Table(name="posts")
 */
class User {
	
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $name;
		
	/**
     * @Column(type="integer", length=2)
     */
    private $empid;
	
				
		public function id($value = NULL) 
		{ 
			if (is_null($value))
				return $this->id;
			else
				//$this->title = $value;
				return false;
		}
		
		public function name($value = NULL) 
		{ 
			if (is_null($value))
				return $this->name;
			else
				$this->name = $value;
		}
		
		public function empid($value = NULL) 
		{ 
			if (is_null($value))
				return $this->empid;
			else
				$this->empid= $value;
		}
		
		//public function addVisit() { $this->visits++; }
		
}

/* End of file Post.php */
/* Location: ./application/modules/blog/modules/Post.php */
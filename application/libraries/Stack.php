<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stack {

  private $a = [];

  /*
  Insert an object into the stack.
  */
  public function push($val)
  {
    array_push($this->a,$val);
    return TRUE;
  }

  /*
  Remove and return the top object.
  */
  public function pop()
  {
    return array_pop($this->a);
  }

  /*
  Checks if passed in value is in stack
  */
  public function contains_str($val)
  {
    foreach ($this->a as $key => $v) {
      if (strcmp($val,$v) == 0) return TRUE;
    }
    return FALSE;
  }

  /*
  Returns the stack
  */
  public function get_values()
  {
    return $this->a;
  }
}
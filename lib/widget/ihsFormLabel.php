<?php 

class ihsFormLabel
{

  protected $label = '';
  protected $name;

  public function __construct($label, $name = null) {
    $this->label = $label;
    $this->name = $name;
  }

  public function __toString() {
    return $this->getLabel();
  }

  public function getLabel() {
    return $this->label;
  }

  public function getName() {
    return $this->name;
  }

}
?>
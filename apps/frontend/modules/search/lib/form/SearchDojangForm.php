<?php
class SearchDojangForm extends sfForm {
  public function configure() {
    $this->setWidget('byName', new sfWidgetFormInputText(array(
        'label' => 'Search by Name',
    )));
    $this->setValidator('byName', new sfValidatorString());

    $this->setWidget('byInstructor', new sfWidgetFormInputText(array(
        'label' => 'Search by Instructor',
    )));
    $this->setValidator('byInstructor', new sfValidatorString());
    
    $this->setWidget('byCity', new sfWidgetFormInputText(array(
        'label' => 'Search by City',
    )));
    $this->setValidator('byCity', new sfValidatorString());

    $this->setWidget('byCountry', new sfWidgetFormSelect(array(
        'label' => 'Search by Country',
        'choices' => $this->getCountries(),
    )));
    $this->setValidator('byCountry', new sfValidatorChoice(array(
        'choices' => $this->getCountries(),
        'empty_value' => true,
    )));

    $this->getWidgetSchema()->setNameFormat('search_dojang[%s]');
  }

  protected function getCountries($combine = true) {
    $countries = array(
        '','Australia', 'Finnland', 'USA', 'Sri Lanka', 'The Netherlands'
    );

    return $combine ? array_combine($countries, $countries) : $countries;
  }
}
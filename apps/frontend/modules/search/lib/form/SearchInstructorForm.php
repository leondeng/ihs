<?php
class SearchInstructorForm extends sfForm {
  public function configure() {
    $this->setWidget('byName', new sfWidgetFormInputText(array(
        'label' => 'Search by Name',
    )));
    $this->setValidator('byName', new sfValidatorString());

    $this->setWidget('byDojang', new sfWidgetFormDoctrineChoice(array(
        'label' => 'Search by Dojang',
        'model' => 'School',
    )));
    $this->setValidator('byDojang', new sfValidatorDoctrineChoice(array(
        'model' => 'School',
        'empty_value' => true,
    )));

    $this->setWidget('byBeltGrade', new sfWidgetFormSelect(array(
        'label' => 'Search by Belt Grade',
        'choices' => $this->getBeltGrades(),
    )));
    $this->setValidator('byBeltGrade', new sfValidatorChoice(array(
        'choices' => $this->getBeltGrades(),
        'empty_value' => true,
    )));

    $this->setWidget('byCountry', new sfWidgetFormSelect(array(
        'label' => 'Search by Country',
        'choices' => $this->getCountries(),
    )));
    $this->setValidator('byCountry', new sfValidatorChoice(array(
        'choices' => $this->getCountries(),
        'empty_value' => true,
    )));

    $this->setWidget('instructorOnly', new sfWidgetFormInputCheckbox(array(
        'label' => 'Limit search to Instructor only',

    )));
    $this->setValidator('instructorOnly', new sfValidatorBoolean());

    $this->getWidgetSchema()->setNameFormat('search_instructor[%s]');
  }

  protected function getBeltGrades($combine = true) {
    $grades = array(
        '', 'Kup1', 'Kup2', 'Kup3', 'Kup4', 'Kup5', 'Kup6', 'Kup7', 'Kup8', 'Kup9'
    );

    return $combine ? array_combine($grades, $grades) : $grades;
  }

  protected function getCountries($combine = true) {
    $countries = array(
        '','Australia', 'Finnland', 'USA', 'Sri Lanka', 'The Netherlands'
    );

    return $combine ? array_combine($countries, $countries) : $countries;
  }
}
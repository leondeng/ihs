<?php

/**
 * School form.
 *
 * @package    ihs
 * @subpackage form
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SchoolForm extends BaseSchoolForm
{
  protected static $showFields = array(
      'name',
      'country',
      'city',
      'suburb',
      'addr1',
      'addr2',
      'phone',
      'email_address',
      'website',
      'leading_instructor',
      'class_time'
  );

  public function configure() {
    $this->setWidget('name', new sfWidgetFormInputText(array('label' => 'Dojang Name', 'default' => $this->getObject()->getName())));
    $this->setValidator('name', new sfValidatorString(array('required' => true)));

    $this->setWidget('country', new sfWidgetFormSelect(array('label' => 'Country', 'choices' => $this->getCountries(), 'default' => $this->getObject()->getCity())));
    $this->setValidator('country', new sfValidatorChoice(array('choices' => $this->getCountries(false))));

    $this->setWidget('city', new sfWidgetFormInputText(array('label' => 'City', 'default' => $this->getObject()->getCity())));
    $this->setValidator('city', new sfValidatorString(array('required' => true)));

    $this->setWidget('suburb', new sfWidgetFormInputText(array('label' => 'Suburb', 'default' => $this->getObject()->getSuburb())));
    $this->setValidator('suburb', new sfValidatorString(array('required' => true)));

    $this->setWidget('addr1', new sfWidgetFormInputText(array('label' => 'Address', 'default' => $this->getObject()->getAddr1())));
    $this->setValidator('addr1', new sfValidatorString(array('required' => true)));

    $this->setWidget('addr2', new sfWidgetFormInputText(array('label' => false, 'default' => $this->getObject()->getAddr2())));
    $this->setValidator('addr2', new sfValidatorString(array('required' => true)));

    $this->setWidget('phone', new sfWidgetFormInputText(array('label' => 'Phone', 'default' => $this->getObject()->getPhone())));
    $this->setValidator('phone', new sfValidatorString(array('required' => true)));

    $this->setWidget('email_address', new sfWidgetFormInputText(array('label' => 'Email', 'default' => $this->getObject()->getEmailAddress())));
    $this->setValidator('email_address', new sfValidatorEmail(array('required' => true)));

    $this->setWidget('website', new sfWidgetFormInputText(array('label' => 'Website', 'default' => $this->getObject()->getWebsite())));
    $this->setValidator('website', new sfValidatorUrl(array('required' => true)));

    $this->setWidget('leading_instructor', new sfWidgetFormInputText(array('label' => 'Leading Instructor', 'default' => $this->getObject()->getLeadingInstructor())));
    $this->setValidator('leading_instructor', new sfValidatorString(array('required' => true)));

    $this->setWidget('class_time', new sfWidgetFormTextarea(array('label' => 'Class Time', 'default' => $this->getObject()->getClasstime())));
    $this->setValidator('class_time', new sfValidatorPass(array('required' => true)));

    $this->validatorSchema->setOption( 'allow_extra_fields', true );

    $this->useFields(self::$showFields);
  }

  protected function getCountries($combine = true) {
    $countries = array(
        'Australia', 'Finnland', 'USA', 'Sri Lanka', 'The Netherlands'
    );

    return $combine ? array_combine($countries, $countries) : $countries;
  }

}

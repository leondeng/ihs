<?php

/**
 * School form base class.
 *
 * @method School getObject() Returns the current form's model object
 *
 * @package    ihs
 * @subpackage form
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSchoolForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInputText(),
      'country'           => new sfWidgetFormChoice(array('choices' => array('Australia' => 'Australia', 'Finnland' => 'Finnland', 'USA' => 'USA', 'Sri Lanka' => 'Sri Lanka', 'The Netherlands' => 'The Netherlands'))),
      'city'              => new sfWidgetFormInputText(),
      'suburb'            => new sfWidgetFormInputText(),
      'addr1'             => new sfWidgetFormInputText(),
      'addr2'             => new sfWidgetFormInputText(),
      'phone'             => new sfWidgetFormInputText(),
      'email_address'     => new sfWidgetFormInputText(),
      'website'           => new sfWidgetFormInputText(),
      'leadingInstructor' => new sfWidgetFormInputText(),
      'classTime'         => new sfWidgetFormInputText(),
      'isActive'          => new sfWidgetFormInputCheckbox(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'              => new sfValidatorPass(array('required' => false)),
      'country'           => new sfValidatorChoice(array('choices' => array(0 => 'Australia', 1 => 'Finnland', 2 => 'USA', 3 => 'Sri Lanka', 4 => 'The Netherlands'), 'required' => false)),
      'city'              => new sfValidatorPass(array('required' => false)),
      'suburb'            => new sfValidatorPass(array('required' => false)),
      'addr1'             => new sfValidatorPass(array('required' => false)),
      'addr2'             => new sfValidatorPass(array('required' => false)),
      'phone'             => new sfValidatorPass(array('required' => false)),
      'email_address'     => new sfValidatorPass(array('required' => false)),
      'website'           => new sfValidatorPass(array('required' => false)),
      'leadingInstructor' => new sfValidatorPass(array('required' => false)),
      'classTime'         => new sfValidatorPass(array('required' => false)),
      'isActive'          => new sfValidatorBoolean(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('school[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'School';
  }

}

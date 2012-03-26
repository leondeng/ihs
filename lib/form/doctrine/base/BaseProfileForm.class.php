<?php

/**
 * Profile form base class.
 *
 * @method Profile getObject() Returns the current form's model object
 *
 * @package    ihs
 * @subpackage form
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'first_name'   => new sfWidgetFormInputText(),
      'last_name'    => new sfWidgetFormInputText(),
      'title'        => new sfWidgetFormInputText(),
      'philosophy'   => new sfWidgetFormInputText(),
      'dob'          => new sfWidgetFormDate(),
      'yearStarted'  => new sfWidgetFormDate(),
      'beltGrade'    => new sfWidgetFormChoice(array('choices' => array('Kup1' => 'Kup1', 'Kup2' => 'Kup2', 'Kup3' => 'Kup3', 'Kup4' => 'Kup4', 'Kup5' => 'Kup5', 'Kup6' => 'Kup6', 'Kup7' => 'Kup7', 'Kup8' => 'Kup8', 'Kup9' => 'Kup9'))),
      'isInstructor' => new sfWidgetFormInputCheckbox(),
      'idUser'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'idSchool'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('School'), 'add_empty' => true)),
      'imageName'    => new sfWidgetFormInputText(),
      'isActive'     => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'first_name'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'philosophy'   => new sfValidatorPass(array('required' => false)),
      'dob'          => new sfValidatorDate(array('required' => false)),
      'yearStarted'  => new sfValidatorDate(array('required' => false)),
      'beltGrade'    => new sfValidatorChoice(array('choices' => array(0 => 'Kup1', 1 => 'Kup2', 2 => 'Kup3', 3 => 'Kup4', 4 => 'Kup5', 5 => 'Kup6', 6 => 'Kup7', 7 => 'Kup8', 8 => 'Kup9'), 'required' => false)),
      'isInstructor' => new sfValidatorBoolean(array('required' => false)),
      'idUser'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'idSchool'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('School'), 'required' => false)),
      'imageName'    => new sfValidatorPass(array('required' => false)),
      'isActive'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

}

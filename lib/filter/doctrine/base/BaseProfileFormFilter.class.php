<?php

/**
 * Profile filter form base class.
 *
 * @package    ihs
 * @subpackage filter
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProfileFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'first_name'   => new sfWidgetFormFilterInput(),
      'last_name'    => new sfWidgetFormFilterInput(),
      'title'        => new sfWidgetFormFilterInput(),
      'philosophy'   => new sfWidgetFormFilterInput(),
      'dob'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'yearStarted'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'beltGrade'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'Kup1' => 'Kup1', 'Kup2' => 'Kup2', 'Kup3' => 'Kup3', 'Kup4' => 'Kup4', 'Kup5' => 'Kup5', 'Kup6' => 'Kup6', 'Kup7' => 'Kup7', 'Kup8' => 'Kup8', 'Kup9' => 'Kup9'))),
      'isInstructor' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'idUser'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'idSchool'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('School'), 'add_empty' => true)),
      'imageName'    => new sfWidgetFormFilterInput(),
      'isActive'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'first_name'   => new sfValidatorPass(array('required' => false)),
      'last_name'    => new sfValidatorPass(array('required' => false)),
      'title'        => new sfValidatorPass(array('required' => false)),
      'philosophy'   => new sfValidatorPass(array('required' => false)),
      'dob'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'yearStarted'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'beltGrade'    => new sfValidatorChoice(array('required' => false, 'choices' => array('Kup1' => 'Kup1', 'Kup2' => 'Kup2', 'Kup3' => 'Kup3', 'Kup4' => 'Kup4', 'Kup5' => 'Kup5', 'Kup6' => 'Kup6', 'Kup7' => 'Kup7', 'Kup8' => 'Kup8', 'Kup9' => 'Kup9'))),
      'isInstructor' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'idUser'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'idSchool'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('School'), 'column' => 'id')),
      'imageName'    => new sfValidatorPass(array('required' => false)),
      'isActive'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('profile_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Profile';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'first_name'   => 'Text',
      'last_name'    => 'Text',
      'title'        => 'Text',
      'philosophy'   => 'Text',
      'dob'          => 'Date',
      'yearStarted'  => 'Date',
      'beltGrade'    => 'Enum',
      'isInstructor' => 'Boolean',
      'idUser'       => 'ForeignKey',
      'idSchool'     => 'ForeignKey',
      'imageName'    => 'Text',
      'isActive'     => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}

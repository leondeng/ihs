<?php

/**
 * School filter form base class.
 *
 * @package    ihs
 * @subpackage filter
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSchoolFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'               => new sfWidgetFormFilterInput(),
      'country'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'Australia' => 'Australia', 'Finnland' => 'Finnland', 'USA' => 'USA', 'Sri Lanka' => 'Sri Lanka', 'The Netherlands' => 'The Netherlands'))),
      'city'               => new sfWidgetFormFilterInput(),
      'suburb'             => new sfWidgetFormFilterInput(),
      'addr1'              => new sfWidgetFormFilterInput(),
      'addr2'              => new sfWidgetFormFilterInput(),
      'phone'              => new sfWidgetFormFilterInput(),
      'email_address'      => new sfWidgetFormFilterInput(),
      'website'            => new sfWidgetFormFilterInput(),
      'leading_instructor' => new sfWidgetFormFilterInput(),
      'classtime'          => new sfWidgetFormFilterInput(),
      'is_publishable'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'slug'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'               => new sfValidatorPass(array('required' => false)),
      'country'            => new sfValidatorChoice(array('required' => false, 'choices' => array('Australia' => 'Australia', 'Finnland' => 'Finnland', 'USA' => 'USA', 'Sri Lanka' => 'Sri Lanka', 'The Netherlands' => 'The Netherlands'))),
      'city'               => new sfValidatorPass(array('required' => false)),
      'suburb'             => new sfValidatorPass(array('required' => false)),
      'addr1'              => new sfValidatorPass(array('required' => false)),
      'addr2'              => new sfValidatorPass(array('required' => false)),
      'phone'              => new sfValidatorPass(array('required' => false)),
      'email_address'      => new sfValidatorPass(array('required' => false)),
      'website'            => new sfValidatorPass(array('required' => false)),
      'leading_instructor' => new sfValidatorPass(array('required' => false)),
      'classtime'          => new sfValidatorPass(array('required' => false)),
      'is_publishable'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'slug'               => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('school_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'School';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'name'               => 'Text',
      'country'            => 'Enum',
      'city'               => 'Text',
      'suburb'             => 'Text',
      'addr1'              => 'Text',
      'addr2'              => 'Text',
      'phone'              => 'Text',
      'email_address'      => 'Text',
      'website'            => 'Text',
      'leading_instructor' => 'Text',
      'classtime'          => 'Text',
      'is_publishable'     => 'Boolean',
      'slug'               => 'Text',
    );
  }
}

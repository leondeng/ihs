<?php

/**
 * Profile form.
 *
 * @package    ihs
 * @subpackage form
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  protected static $showFields = array(
      'title',
      'first_name',
      'last_name',
      'philosophy',
      'dob',
      'year_started',
      'belt_grade',
      'is_instructor',
      'image_name',
      'idSchool'
  );

  public function configure() {
    $this->setWidget('title', new sfWidgetFormInputText(array('label' => 'Title', 'default' => $this->getObject()->getTitle())));
    $this->setValidator('title', new sfValidatorString(array('required' => true)));

    $this->setWidget('first_name', new sfWidgetFormInputText(array('label' => 'First Name', 'default' => $this->getObject()->getFirstName())));
    $this->setValidator('first_name', new sfValidatorString(array('required' => true)));

    $this->setWidget('last_name', new sfWidgetFormInputText(array('label' => 'Surname', 'default' => $this->getObject()->getLastName())));
    $this->setValidator('last_name', new sfValidatorString(array('required' => true)));

    $this->setWidget('philosophy', new sfWidgetFormTextarea(array('label' => 'Philosophy', 'default' => $this->getObject()->getPhilosophy())));
    $this->setValidator('philosophy', new sfValidatorPass(array('required' => true)));

    $this->setWidget('dob', new sfWidgetFormInputText(array('label' => 'Date of Birth (Optional)', 'default' => $this->getObject()->getDob())));
    $this->setValidator('dob', new sfValidatorDate(array('required' => false)));

    $this->setWidget('year_started', new sfWidgetFormInputText(array('label' => 'Year Started Hapkido', 'default' => $this->getObject()->getYearStarted())));
    $this->setValidator('year_started', new sfValidatorDate(array('required' => true)));

    $this->setWidget('belt_grade', new sfWidgetFormSelect(array('label' => 'Belt Grade', 'choices' => $this->getBeltGrades(), 'default' => $this->getObject()->getBeltGrade())));
    $this->setValidator('belt_grade', new sfValidatorChoice(array('choices' => $this->getBeltGrades(false))));

    $this->setWidget('is_instructor', new sfWidgetFormChoice(array('label' => false, 'expanded' => true, 'choices' => array('1' => 'Instructor', '0' => 'Black Belt'), 'default' => $this->getObject()->getIsActivated())));
    $this->setValidator('is_instructor', new sfValidatorBoolean(array('required' => true)));

    $this->setWidget('image_name', new sfWidgetFormInputFileEditable(array(
        'label' => 'Upload Image from your computer',
        'default' => $this->getObject()->getImageName(),
        'edit_mode' => false,
        'with_delete' => false,
        'file_src' => 'uploads/'.$this->getObject()->getImageName()
    )));
    $this->setValidator('image_name', new sfValidatorFile(array(
        'required' => true,
        'max_size' => 500000,
        'mime_types' => 'web_images',
        'path' => 'uploads',
    )));

    $this->setWidget('idSchool', new sfWidgetFormDoctrineChoice(array(
        'label' => 'Home Dojang',
        'model' => $this->getRelatedModelName('School'),
        'add_empty' => true,
        'default' => $this->getObject()->getIdSchool()
    )));
    $this->setValidator('idSchool', new sfValidatorDoctrineChoice(array(
        'model' => $this->getRelatedModelName('School'),
        'required' => false,
        'empty_value' => true
    )));

    $this->validatorSchema->setOption( 'allow_extra_fields', true );

    $this->useFields(self::$showFields);
  }

  protected function getBeltGrades($combine = true) {
    $grades = array(
        'Kup1', 'Kup2', 'Kup3', 'Kup4', 'Kup5', 'Kup6', 'Kup7', 'Kup8', 'Kup9'
    );

    return $combine ? array_combine($grades, $grades) : $grades;
  }
}

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
  const IMAGE_WIDTH = 430;
  const IMAGE_HEIGHT = 580;

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
    $this->setWidget('title', new sfWidgetFormInputText(array('label' => 'Title', 'default' => $this->getObject()->getTitle()), array('class' => 'auto-focus')));
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
    $this->setValidator('year_started', new sfValidatorInteger(array('required' => true, 'min' => 1900, 'max' => date('Y'))));

    $this->setWidget('belt_grade', new sfWidgetFormSelect(array('label' => 'Belt Grade', 'choices' => $this->getBeltGrades(), 'default' => $this->getObject()->getBeltGrade())));
    $this->setValidator('belt_grade', new sfValidatorChoice(array('choices' => $this->getBeltGrades(false))));

    $this->setWidget('is_instructor', new sfWidgetFormChoice(array('label' => false, 'expanded' => true, 'choices' => array('1' => 'Instructor', '0' => 'Black Belt'), 'default' => $this->getObject()->getIsInstructor())));
    $this->setValidator('is_instructor', new sfValidatorBoolean(array('required' => true)));

    $this->setWidget('image_name', new sfWidgetFormInputFileEditable(array(
        'label' => strlen($this->getObject()->getImageName()) > 0 ? 'Current Image' : 'Upload Image from your computer',
        'file_src' => basename(sfConfig::get('sf_upload_dir')).'/'.basename(sfConfig::get('sf_thumbnail_dir')).'/'.$this->getObject()->getImageName(),
        'is_image' => true,
        'edit_mode' => strlen($this->getObject()->getImageName()) > 0,
        'with_delete' => false,
        'template'  => strlen($this->getObject()->getImageName()) > 0 ? '<div><div style="padding: 2px 0 2px;">%file%</div>Upload a New Image%input%</div>' : '<div>%input%</div>',
    )));
    $this->setValidator('image_name', new sfValidatorFile(array(
        'required' => !(strlen($this->getObject()->getImageName()) > 0),
        /* 'max_size' => 500000, */
        'mime_types' => 'web_images',
        /* 'path' => basename(sfConfig::get('sf_upload_dir')), */
    )));

    $this->setWidget('idSchool', new sfWidgetFormDoctrineChoice(array(
        'label' => 'Home Dojang',
        'model' => $this->getRelatedModelName('School'),
        'add_empty' => '--Dojang not listed yet--',
    )));
    $this->setValidator('idSchool', new sfValidatorDoctrineChoice(array(
        'model' => $this->getRelatedModelName('School'),
        'required' => false,
    )));

    $this->validatorSchema->setOption( 'allow_extra_fields', true );

    $this->mergePostValidator(new sfValidatorCallback(array('callback' => array($this, 'validateImageDimension'))));

    $this->useFields(self::$showFields);
  }

  protected function doSave ( $con = null ) {
    $upload = $this->getValue('image_name');

    if ( $upload ) {
      $filename = sha1($upload->getOriginalName().microtime().rand()).$upload->getExtension($upload->getOriginalExtension());
      $filepath = sfConfig::get('sf_upload_dir').'/'.$filename;
      $oldfilepath = sfConfig::get('sf_upload_dir').'/'.$this->getObject()->getImageName();

      if ( file_exists($oldfilepath) ) unlink($oldfilepath);

      $upload->save($filepath);

      $thumbnailpath = sfConfig::get('sf_thumbnail_dir').'/'.$filename;
      $oldthumbnailpath = sfConfig::get('sf_thumbnail_dir').'/'.$this->getObject()->getImageName();

      if ( file_exists($oldthumbnailpath) ) unlink($oldthumbnailpath);

      $thumbnail = new sfThumbnail(52, 70, true, true, 75, 'sfGDAdapter');
      $thumbnail->loadFile($filepath);
      $thumbnail->save($thumbnailpath);
    }

    /* $delete = $this->getValue('background_image_delete');
    if ( $delete ) {
      $filename = $this->getObject()->getImageName();
      $filepath = sfConfig::get('sf_upload_dir').'/'.$filename;
      @unlink($filepath);
      $this->getObject()->setImageName(null);
    } */

    return parent::doSave($con);
  }

  public function updateObject($values = null) {
    $object = parent::updateObject($values);
    $object->setImageName(str_replace(sfConfig::get('sf_upload_dir').'/', '', $object->getImageName()));

    return $object;
  }

  protected function getBeltGrades($combine = true) {
    $grades = array(
        'Kup1', 'Kup2', 'Kup3', 'Kup4', 'Kup5', 'Kup6', 'Kup7', 'Kup8', 'Kup9'
    );

    return $combine ? array_combine($grades, $grades) : $grades;
  }

  public function validateImageDimension($validator, $values) {
    if($values['image_name']) {
      list($width, $height, $type, $attr) = getimagesize($values['image_name']->getTempName());
      if($width > self::IMAGE_WIDTH || $height > self::IMAGE_HEIGHT) {
        $error =  new sfValidatorError($validator, sprintf('Image dimension exceeds %dx%d.', self::IMAGE_WIDTH, self::IMAGE_HEIGHT));
        throw new sfValidatorErrorSchema($validator, array('image_name' => $error));
      }
    }

    return $values;
  }

}

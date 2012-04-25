<?php
class ihsChangeUserEmailForm extends BaseFormDoctrine {
  public function configure() {
    $this->setWidget('email_address', new sfWidgetFormInputText());
    $this->setValidator('email_address', new sfValidatorEmail(array('required' => true, 'trim' => true)));

    $this->setWidget('email_address_again',  new sfWidgetFormInputText());
    $this->setValidator('email_address_again', clone $this->getValidator('email_address'));

    $this->mergePostValidator(new sfValidatorSchemaCompare('email_address', sfValidatorSchemaCompare::EQUAL, 'email_address_again', array(), array('invalid' => 'The two email addresses must be the same.')));
    $this->getWidgetSchema()->setNameFormat('email[%s]');

    $this->mergePostValidator(new sfValidatorDoctrineUnique(array(
        'model' => 'sfGuardUser',
        'column' => array('email_address')
    ), array(
        'invalid' => 'Another user already uses this email address.'
    )));
  }

  public function getModelName() {
    return 'sfGuardUser';
  }

}
<?php
class RegisterForm extends sfGuardUserForm
{
  public function configure()
  {
    // Remove all widgets we don't want to show
    unset(
        $this['is_active'],
        $this['is_super_admin'],
        $this['updated_at'],
        $this['groups_list'],
        $this['permissions_list'],
        $this['last_login'],
        $this['created_at'],
        $this['salt'],
        $this['algorithm']
    );

    // change the name format as we dont want to the
    // world to know that we are using sfGuardPlugin
    $this->widgetSchema->setNameFormat('sign_up[%s]');

    // Setup proper password validation with confirmation
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password']->setOption('required', true);
    $this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword();
    $this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];
    $this->widgetSchema['toc'] = new sfWidgetFormInputCheckbox();

    $this->widgetSchema->setLabel('password_confirmation', 'Confirm Password');
    //$this->widgetSchema->setLabel('toc', 'I agree to the Terms of Use.');
    $this->validatorSchema['email_address']   = new sfValidatorEmail(
        array('required' => true),
        array(
//             'required' => 'Please provide an email address',
            'invalid'  => 'Invalid email address'
        )
    );
    $this->validatorSchema['toc'] = new sfValidatorBoolean(
        array('required' => true),
        array(
            'required' =>
            'You need to accept the terms of use to proceed')
    );
    $this->widgetSchema->moveField('password_confirmation', 'after', 'password');

    $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => 'The two passwords must be the same.')));
  }
}

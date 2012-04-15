<?php

/**
 * register actions.
 *
 * @package    ihs
 * @subpackage register
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeRegister(sfWebRequest $request) {
    $this->form = new RegisterForm();
    $this->form->getWidget('toc')->setLabel(sprintf('I agree to the <a href="%s/%s">Term of Use</a>.', $request->getUriPrefix(), 'term_of_use.html'));
    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter('sign_up'));
      if ($this->form->isValid()) {
        $this->form->save();

        // get the user object
        $user = $this->form->getObject();

        // get the normal user group
        $normal_user_group = sfConfig::get('app_config_normal_user');

        // deactivate the account, till the user verifies the account
        $user->setIsActive(false);

        // set the activation token
        $profile = $user->getProfile();
        $profile->setToken(md5(time()));

        // notify the user about the signup
        $this->notifySignup($user, $profile);
        $user->save(); // save the record in the database

        $this->getUser()->setFlash('register_confirm', true);

        //         $this->getUser()->signIn($this->form->getObject());
        //         $this->redirect('@homepage');
      }
    }
  }

  private function notifySignup($user, $profile) {
    $activationUrl = "http://www.event.com/index.php..." . $user->getId() . "&activation=" . $profile->getToken();
    $message = $this->getMailer()->compose(
        'info@megasale.am',
        'info@megasale.am'/* $mailerarraystuff[0] */,
        '' . $user->getEmailAddress() . '', 'Shnorhakalutyun grancman hamar
        Grancumn aktivacnelu hamar ayceleq hetvevyal hasceov: '
        . $activationUrl . ' //Megasale');
    $message->setBcc($singleUserMail[0]['email_address']);
    //$this->getMailer()->send($message);
  }

  public function executeActivation(sfWebRequest $request) {
    if ($request->isMethod('get')) {
      $this->memberId = $request->getParameter('member');
      $this->activationId = $request->getParameter('activation');

      $q2s = Doctrine_Query::create()->select('p.id ')
      ->from('sfGuardUserProfile p')
      ->where('p.token = ?', $this->activationId );

      $getUserId = $q2s->fetchArray();
      $this->activated = 0;
      if (sizeof($getUserId[0][id])) {

        Doctrine_Query::create ()
        ->update('sfGuardUser u')
        ->set('u.is_active', 1)
        ->where('u.id = ?', $getUserId[0][id])->execute();
        $this->activated = 1;
      }
    }

  }

  public function executeActivationgo(sfWebRequest $request) {

  }
}

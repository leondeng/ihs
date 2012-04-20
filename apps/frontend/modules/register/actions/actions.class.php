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
        //$normal_user_group = sfConfig::get('app_config_normal_user');

        // deactivate the account, till the user verifies the account
        $user->setIsActive(false);

        // create profile for the user
        $profile = new Profile();

        // set the activation token
        $profile->setToken(md5(time()));

        $user->setProfile($profile);

        // notify the user about the signup
        $this->notifySignup($request, $user, $profile);
        $profile->save();
        $user->save(); // save the record in the database

        $this->getUser()->setFlash('success', 'Register success. Please check your email to activate your account.');
        $this->redirect('@sf_guard_signin');
        //         $this->getUser()->signIn($this->form->getObject());
        //         $this->redirect('@homepage');
      }
    }
  }

  private function notifySignup(sfWebRequest $request, $user, $profile) {
    $activationUrl = $this->generateUrl('sf_guard_activate', array('userid' => $user->getId(), 'activation' => $profile->getToken()), true);

    $message = Swift_Message::newInstance('International Hapkido Alliance Register Verification')
//       ->setFrom(sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'))
      ->setFrom(array('iha.register@dimitristangl.com' => 'IHA Register'))
      ->setTo(array($user->getEmailAddress() => $user->getUserName()))
      ->setBody($this->getPartial('register/activeAccountMail', array('site' => $request->getHost(), 'user' => $user, 'activationUrl' => $activationUrl)))
      ->setContentType('text/html');

      $transport = Swift_SmtpTransport::newInstance('host269.hostmonster.com', 465, 'ssl')
        ->setUsername("iha.register@dimitristangl.com")
        ->setpassword("iha@123");

      $mailer = Swift_Mailer::newInstance($transport);

      if (!$mailer->send($message, $failures)) {
        $this->getUser()->setFlash('error', 'Register failed. '.$failures);
        $this->redirect('@sf_guard_signin');
      }
  }

  public function executeActivate(sfWebRequest $request) {
    if ($request->isMethod('get')) {
      $this->userId = $request->getParameter('userid');
      $this->activationId = $request->getParameter('activation');

      $user = sfGuardUserTable::getInstance()->findOneById($this->userId);

      if (!($user instanceof sfGuardUser)) {
        $this->getUser()->setFlash('error', 'Oops! Invalid user.');
        // $this->redirect('@sf_guard_signin');
        return sfView::ERROR;
      }

      if ($user->getIsActive()) {
        $this->getUser()->setFlash('error', sprintf('Oops! Account %s has already been activated.', $user->getUsername()));
        // $this->redirect('@sf_guard_signin');
        return sfView::ERROR;
      }

      $profile = $user->getProfile();

      if ($this->activationId !== $profile->getToken()) {
        $this->getUser()->setFlash('error', 'Oops! Invalid activation token.');
        // $this->redirect('@sf_guard_signin');
        return sfView::ERROR;
      }

      $profile->setToken(null)->save();
      $user->setIsActive(true)->save();

      $this->getUser()->setFlash('success', 'Account activated. Please login.');
      $this->redirect('@sf_guard_signin');

      /* $q2s = Doctrine_Query::create()->select('p.id ')
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
      } */
    }
  }

  /* public function executeActivationgo(sfWebRequest $request) {

  } */
}

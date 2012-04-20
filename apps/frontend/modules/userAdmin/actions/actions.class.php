<?php

/**
 * userAdmin actions.
 *
 * @package    ihs
 * @subpackage userAdmin
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userAdminActions extends sfActions
{
  public function preExecute() {
    $this->username = $this->getUser()->getUserName();
    $this->profile = $this->getUser()->getGuardUser()->getProfile();
    $this->school = $this->profile->getSchool();
    $this->school = empty($this->school) ? new School() : $this->school;
  }

  public function executeIndex(sfWebRequest $request) {
    $this->getResponse()->setTitle($this->username.' - User Administration');
    
    $fname = $this->profile->getFirstName();
    $profile_pub = $this->profile->getIsPublishable();
    $this->profileStatus = empty($fname) ? 'Your profile is empty, please update it ASAP.'
    : ($profile_pub ? 'ok' : 'in verification, please be patient.');
    
    $school_name = $this->school->getName();
    $school_pub = $this->school->getIsPublishable();
    $this->schoolStatus = empty($school_name) ? 'Your school info is empty. You can select an existing one in profile, or edit a new one.'
    : ($school_pub ? 'ok' : 'in verification, please be patient.');
  }

  public function executeChangePassword(sfWebRequest $request) {
    $this->form = new sfGuardChangeUserPasswordForm($this->getUser()->getGuardUser());
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Change Password');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $user = $this->getUser()->getGuardUser();
      $user->setPassword($this->form->getValue('password'));
      $user->save();

      $this->getUser()->setFlash('success', 'Your password has been updated successfully.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  public function executeChangeEmail(sfWebRequest $request) {
    $this->form = new ihsChangeUserEmailForm($this->getUser()->getGuardUser());
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Change Email Address');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $user = $this->getUser()->getGuardUser();
      $user->setEmailAddress($this->form->getValue('email_address'));
      $user->save();

      $this->getUser()->setFlash('success', 'Your email address has been changed successfully.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  public function executeEditProfile(sfWebRequest $request) {
    $this->form = new ProfileForm($this->profile);
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Edit Profile');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $this->form->save();

      /* $profile = $this->getUser()->getGuardUser()->getProfile();
       $profile->fromArray($this->form->getValues());
      $profile->save(); */

      $user = $this->getUser()->getGuardUser();
      $profile = $this->form->getObject();
      
      // set the verification token
      $profile->setToken(md5(time()));

      // notify the admin about the profile update
      $this->notifyProfileUpdate($request, $user, $profile);

      $profile->setSlug($profile->getUniqueSlug())->setIsPublishable(false)->save();

      $this->getUser()->setFlash('success', 'Your profile has been updated successfully. It will be public after verification.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  private function notifyProfileUpdate(sfWebRequest $request, $user, $profile) {
    $verificationUrl = $this->generateUrl('profile_verificate', array('profileid' => $profile->getId(), 'verification' => $profile->getToken()), true);

    $admin = sfGuardUserTable::getInstance()->findOneByIsSuperAdmin(true);
    $message = Swift_Message::newInstance('User Profile Update Verification')
      ->setFrom(array('iha.register@dimitristangl.com' => 'IHA Register'))
      ->setTo(array($admin->getEmailAddress() => $admin->getUserName()))
      ->setBody($this->getPartial('userAdmin/verificateProfileMail', array('user' => $user, 'profile' => $profile, 'verificationUrl' => $verificationUrl)))
      ->setContentType('text/html');

    $transport = Swift_SmtpTransport::newInstance('host269.hostmonster.com', 465, 'ssl')
      ->setUsername("iha.register@dimitristangl.com")
      ->setpassword("iha@123");

    $mailer = Swift_Mailer::newInstance($transport);

    if (!$mailer->send($message, $failures)) {
      $this->getUser()->setFlash('error', 'Update profile failed. '.$failures);
      $this->redirect('@userAdmin');
    }
  }

  public function executeProfileVerificate(sfWebRequest $request) {
    if ($request->isMethod('get')) {
      $this->profileId = $request->getParameter('profileid');
      $this->verificationId = $request->getParameter('verification');

      $profile = ProfileTable::getInstance()->findOneById($this->profileId);

      if (!($profile instanceof Profile)) {
        $this->getUser()->setFlash('error', 'Oops! Invalid profile.');
      }

      if ($profile->getIsPublishable()) {
        $this->getUser()->setFlash('error', sprintf('Oops! Profile of %s has already been verified.', $profile->getFullName()));
      }

      if ($this->verificationId !== $profile->getToken()) {
        $this->getUser()->setFlash('error', 'Oops! Invalid verification token.(pleaase check mail, seems the user update again?)');
      }

      $profile->setIsPublishable(true)->setToken(null)->save();

      $this->getUser()->setFlash('success', 'Profile verified.');
      $this->redirect('@userAdmin');
    }
  }
  
  public function executeEditSchool(sfWebRequest $request) {
    $this->form = new SchoolForm($this->school);
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Edit Dojang');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $school = $this->school;
      $school->fromArray($this->form->getValues());
      $school->setSlug($school->getUniqueSlug())->setIsPublishable(false)->save();
      
      $this->profile->setSchool($school)->save();

      $this->getUser()->setFlash('success', 'Your dojang has been updated successfully. It will be public after verification.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

}

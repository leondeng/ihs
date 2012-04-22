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
  }

  public function executeIndex(sfWebRequest $request) {
    $this->getResponse()->setTitle($this->username.' - Accoount Management');

    $this->profileIsEmpty = $this->profileIsInVerification = $this->schoolIsEmpty = false;
    
    if ($this->getUser()->getGuardUser()->getIsSuperAdmin()) return sfView::SUCCESS;

    $fname = $this->profile->getFirstName();
    if (empty($fname)) {
      $this->profileIsEmpty = true;
      $this->getUser()->setFlash('notice', 'Please create your profile.', false);

      return sfView::SUCCESS;
    }

    if (!$this->profile->getIsPublishable()) {
      $this->profileIsInVerification = true;
      $this->getUser()->setFlash('notice', 'Your profile is still in our verification, please wait.', false);

      return sfView::SUCCESS;
    }

    $school_name = $this->profile->getSchool()->getName();
    if (empty($school_name)) {
      $this->schoolIsEmpty = true;
      $this->getUser()->setFlash('notice', 'Please select a dojang in your profile, or create a new one.', false);

      return sfView::SUCCESS;
    }

    if (!$this->profile->getSchool()->getIsPublishable()) {
      $this->getUser()->setFlash('notice', 'Your dojang is still in our verification, please wait.', false);

      return sfView::SUCCESS;
    }
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

      $profile = $this->form->save();

      $user = $this->getUser()->getGuardUser();
      
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

    $admin = sfGuardUserTable::getInstance()->findOneByUserName('admin');
    $message = Swift_Message::newInstance('User Profile Update Verification')
      ->setFrom(array('iha.register@dimitristangl.com' => 'IHA Register'))
      ->setTo(array($admin->getEmailAddress() => $admin->getUserName()))
      ->setBody($this->getPartial('userAdmin/verificateProfileMail', array(
          'img_path' => $request->getUriPrefix().'/'.basename(sfConfig::get('sf_upload_dir')),
          'user' => $user,
          'profile' => $profile,
          'verificationUrl' => $verificationUrl
      )))
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
    $this->checkIfSuperAdmin();

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
        $this->getUser()->setFlash('error', 'Oops! Invalid verification link, possibly caused by repeated updating, pleaase check email.)');
      }

      $profile->setIsPublishable(true)->setToken(null)->save();

      $this->getUser()->setFlash('success', sprintf('User %s profile verified.', $profile->getFullName()));
      $this->redirect('@userAdmin');
    }
  }
  
  public function executeEditSchool(sfWebRequest $request) {
    $this->school = $this->profile->getSchool();
    $this->form = new SchoolForm($this->school);
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Edit Dojang');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $school = empty($this->school) ? new School() : $this->school;
      $school->fromArray($this->form->getValues());

      $user = $this->getUser()->getGuardUser();

      // set the verification token
      $school->setToken(md5(time()));

      $school->setSlug($school->getUniqueSlug())->setIsPublishable(false)->save();

      // notify the admin about the school update
      $this->notifySchoolUpdate($request, $user, $school);

      $this->profile->setSchool($school)->save();

      $this->getUser()->setFlash('success', 'Your dojang has been updated successfully. It will be public after verification.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  private function notifySchoolUpdate(sfWebRequest $request, $user, $school) {
    $verificationUrl = $this->generateUrl('school_verificate', array('schoolid' => $school->getId(), 'verification' => $school->getToken()), true);

    $admin = sfGuardUserTable::getInstance()->findOneByUserName('admin');
    $message = Swift_Message::newInstance('School Update Verification')
      ->setFrom(array('iha.register@dimitristangl.com' => 'IHA Register'))
      ->setTo(array($admin->getEmailAddress() => $admin->getUserName()))
      ->setBody($this->getPartial('userAdmin/verificateSchoolMail', array(
          'user' => $user,
          'school' => $school,
          'verificationUrl' => $verificationUrl
    )))
    ->setContentType('text/html');

    $transport = Swift_SmtpTransport::newInstance('host269.hostmonster.com', 465, 'ssl')
    ->setUsername("iha.register@dimitristangl.com")
    ->setpassword("iha@123");

    $mailer = Swift_Mailer::newInstance($transport);

    if (!$mailer->send($message, $failures)) {
      $this->getUser()->setFlash('error', 'Update school failed. '.$failures);
      $this->redirect('@userAdmin');
    }
  }

  public function executeSchoolVerificate(sfWebRequest $request) {
    $this->checkIfSuperAdmin();

    if ($request->isMethod('get')) {
      $this->schoolId = $request->getParameter('schoolid');
      $this->verificationId = $request->getParameter('verification');

      $school = SchoolTable::getInstance()->findOneById($this->schoolId);

      if (!($school instanceof School)) {
        $this->getUser()->setFlash('error', 'Oops! Invalid school.');
      }

      if ($school->getIsPublishable()) {
        $this->getUser()->setFlash('error', sprintf('Oops! School %s has already been verified.', $school->getName()));
      }

      if ($this->verificationId !== $school->getToken()) {
        $this->getUser()->setFlash('error', 'Oops! Invalid verification link, possibly caused by repeated updating, pleaase check email.)');
      }

      $school->setIsPublishable(true)->setToken(null)->save();

      $this->getUser()->setFlash('success', sprintf('School %s verified.', $school->getName()));
      $this->redirect('@userAdmin');
    }
  }

  protected function checkIfSuperAdmin() {
    if (!$this->getUser()->getGuardUser()->getIsSuperAdmin()) {
      $this->getUser()->setFlash('error', 'Access denied, please logout and login as administrator.');
      $this->redirect('@userAdmin');
    }
  }

}

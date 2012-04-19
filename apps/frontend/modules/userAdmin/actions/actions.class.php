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
  }

  public function executeIndex(sfWebRequest $request) {
    //$this->forward('default', 'module');
    $this->getResponse()->setTitle($this->username.' - User Administration');
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

      $this->getUser()->setFlash('notice', 'Your password has been updated successfully.');
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

      $this->getUser()->setFlash('notice', 'Your email address has been changed successfully.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  public function executeEditProfile(sfWebRequest $request) {
    $this->form = new ProfileForm($this->getUser()->getGuardUser()->getProfile());
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Edit Personal Profile');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $this->form->save();

      /* $profile = $this->getUser()->getGuardUser()->getProfile();
       $profile->fromArray($this->form->getValues());
      $profile->save(); */

      $profile = $this->form->getObject();

      // notify the admin about the profile update
//       $this->notifyProfileUpdate($request, $profile);

      $profile->setSlug($profile->getUniqueSlug())->setIsPublishable(false)->save();

      $this->getUser()->setFlash('notice', 'Personal profile updated. It\'s under verification now and not open to the public.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

  private function notifyProfileUpdate(sfWebRequest $request, $profile) {
    $verificationUrl = $this->generateUrl('profile_verificate', array('profileId' => $profile->getId()), true);

    $message = Swift_Message::newInstance()
      ->setFrom(sfConfig::get('app_sf_guard_plugin_default_from_email', 'from@noreply.com'))
      ->setTo(sfConfig::get('app_sf_guard_plugin_default_from_email', 'iha.admin@gmail.com'))
      ->setSubject('International Hapkido Alliance Profile Update Verification')
      ->setBody($this->getPartial('userAdmin/verificateProfileMail', array('profile' => $profile)))
      ->setContentType('text/html');

    $this->getMailer()->send($message);
  }

  public function executeEditSchool(sfWebRequest $request) {
    $this->form = new SchoolForm($this->getUser()->getGuardUser()->getProfile()->getSchool());
    $request->setRequestFormat('html');

    $this->getResponse()->setTitle($this->username.' - Edit Dojang Profile');

    if ($request->isMethod('post')) {
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $school = $this->getUser()->getGuardUser()->getProfile()->getSchool();
      $school->fromArray($this->form->getValues());
      $school->setIsPublishable(false)->save();

      $this->getUser()->setFlash('notice', 'Dojang profile updated. It\'s under verification now and not open to the public.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

}

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

      $this->getUser()->setFlash('notice', 'Your password has been changed successfully.');
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
      $this->form->bind($request->getParameter($this->form->getName()));
      if (!$this->form->isValid()) {
        return sfView::SUCCESS;
      }

      $profile = $this->getUser()->getGuardUser()->getProfile();
      $profile->fromArray($this->form->getValues());
      $profile->save();

      $this->getUser()->setFlash('notice', 'Your personal profile has been updated successfully.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
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
      $school->save();

      $this->getUser()->setFlash('notice', 'Your dojang profile has been updated successfully.');
      $this->redirect('@userAdmin');

      return sfView::SUCCESS;
    }
  }

}

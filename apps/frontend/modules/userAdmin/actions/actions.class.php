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
  }

  public function executeChangePassword(sfWebRequest $request) {
    $this->form = new sfGuardChangeUserPasswordForm($this->getUser()->getGuardUser());
    $request->setRequestFormat('html');

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
  
}

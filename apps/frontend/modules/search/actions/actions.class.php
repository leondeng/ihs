<?php

/**
 * search actions.
 *
 * @package    ihs
 * @subpackage search
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeSearchInstructor(sfWebRequest $request) {
    $this->form = new SearchInstructorForm();
    
    if($request->isMethod('post')) {
      die(print_r($request->getParameter('search_instructor'), true));
    }
  }

  public function executeSearchDojang(sfWebRequest $request) {
    $this->form = new ProfileForm();
  }

}

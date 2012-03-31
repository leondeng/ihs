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
  public function executeInstructor(sfWebRequest $request) {
    $this->form = new SearchInstructorForm();
    
    if($request->isMethod('post')) $this->forward('search', 'searchInstructor');
  }

  public function executeSearchInstructor(sfWebRequest $request) {
    $this->instructors = ProfileTable::getInstance()
      ->createQuery('p')
      ->execute();
  }

  public function executeDojang(sfWebRequest $request) {
    $this->form = new SearchDojangForm();
    
    if($request->isMethod('post')) $this->forward('search', 'searchDojang');
  }

  public function executeSearchDojang(sfWebRequest $request) {
    $this->dojangs = SchoolTable::getInstance()
      ->createQuery('s')
      ->execute();
  }

}

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
  }

  public function executeSearchInstructor(sfWebRequest $request) {
    $this->pager = new sfDoctrinePager('Profile', '20');

    $query = ProfileTable::getInstance()->createQuery('p')->where('p.is_activated = 1');

    $params = $request->getParameter('search_instructor', array());

    if(!empty($params['byName'])) {
      $names = explode(' ', $params['byName']);
      if(isset($names[1])) {
        $query->andWhere('p.first_name = ? AND p.last_name = ?', array($names[0], $names[1]));
      } else {
        $query->andWhere('p.first_name = ? OR p.last_name = ?', array($names[0], $names[0]));
      }
    }

    if(!empty($params['byDojang']) || !empty($params['byCountry'])) {
      $query->innerJoin('p.School sh');
      if(!empty($params['byDojang'])) $query->andWhere('sh.id = ?', $params['byDojang']);
      if(!empty($params['byCountry'])) $query->andWhere('sh.country = ?', $params['byCountry']);
    }

    if(!empty($params['byBeltGrade'])) $query->andWhere('p.belt_grade = ?', $params['byBeltGrade']);
    if(!empty($params['instructorOnly'])) $query->andWhere('p.is_instructor = 1');
     
    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeViewInstructor(sfWebRequest $request) {
    $this->instructor = ProfileTable::getInstance()->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->instructor instanceof Profile, 'No blackbelt/instructor with this name.');
  }

  public function executeDojang(sfWebRequest $request) {
    $this->form = new SearchDojangForm();
  }

  public function executeSearchDojang(sfWebRequest $request) {
    $this->pager = new sfDoctrinePager('School', '20');

    $query = SchoolTable::getInstance()->createQuery('sh')->where('sh.is_activated = 1');
    $params = $request->getParameter('search_dojang', array());

    if(!empty($params['byName'])) $query->andWhere('sh.name = ?', $params['byName']);
    if(!empty($params['byInstructor'])) $query->andWhere('sh.leading_instructor = ?', $params['byInstructor']);
    if(!empty($params['byCity'])) $query->andWhere('sh.city = ?', $params['byCity']);
    if(!empty($params['byCountry'])) $query->andWhere('sh.country = ?', $params['byCountry']);

    $this->pager->setQuery($query);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }

  public function executeViewDojang(sfWebRequest $request) {
    $this->dojang = SchoolTable::getInstance()->findOneBySlug($request->getParameter('slug'));
    $this->forward404Unless($this->dojang instanceof School, 'No dojang with this name.');

    $this->gMap = new GMap();

    $address = sprintf('%s, %s', $this->dojang->getAddr1(), $this->dojang->getAddr2());
    $geocoded_address = $this->gMap->geocode($address);

    $gMapMarker = new GMapMarker($geocoded_address->getLat(), $geocoded_address->getLng());
    $gMapMarker->addHtmlInfoWindow(new GMapInfoWindow(sprintf('<b>%s:</b><br />%s', $this->dojang->getName(), $address)));
    $this->gMap->addMarker($gMapMarker);

    $this->gMap->centerAndZoomOnMarkers(0.3);
  }

}

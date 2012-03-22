<?php

/**
 * static actions.
 *
 * @package    ihs
 * @subpackage static
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->content = $this->getRequestParameter("content", "index");

    $context = $this->getContext();

    $this->forward404Unless($this->partialExists($context, $this->content));
  }

  protected function partialExists($context, $name) {
    $directory = $context->getModuleDirectory();

    if (is_readable($directory . DIRECTORY_SEPARATOR ."templates". DIRECTORY_SEPARATOR ."_". $name .".php")) {
      return true;
    } else {
      return false;
    }
  }
}

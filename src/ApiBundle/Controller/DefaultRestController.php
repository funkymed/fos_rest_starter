<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Validator\ConstraintViolationList;
use Tigreboite\FmBundle\Entity\Pays;
use JMS\Serializer\SerializationContext;

class DefaultRestController extends FOSRestController
{

  /**
       * Return true
       *
       * @ApiDoc(
       *   resource = true,
       *   description = "Return true",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @return View
       */
      public function getTestAction()
      {
          $view = View::create();
          $view->setData(array('test'=>true))->setStatusCode(200)
            ->setSerializationContext(
              SerializationContext::create()
            )
          ;

          return $view;
      }

}

?>

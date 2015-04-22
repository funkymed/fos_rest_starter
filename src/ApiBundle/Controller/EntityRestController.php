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

class EntityRestController extends FOSRestController
{
      /**
       * Return all entities
       *
       * @ApiDoc(
       *   resource = true,
       *   description = "Return all entities",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @return View
       */
      public function getEntitiesAction()
      {
          $view = View::create();
          $view->setData(array('test'=>true))->setStatusCode(200)
            ->setSerializationContext(
              SerializationContext::create()
            )
          ;

          return $view;
      }

      /**
       * Return an entity by id
       *
       * @ApiDoc(
       *   resource = true,
       *   description = "Return an entity by id",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @return View
       */
      public function getEntityAction($id)
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

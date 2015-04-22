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
        $doctrine   = $this->container->get('doctrine');
        $em         = $doctrine->getManager();
        $entities   = $em->getRepository("ApiBundle:Test")->findAll();

        $view = View::create();
        $view->setData($entities)->setStatusCode(200)
          ->setSerializationContext(
            SerializationContext::create()
              ->setGroups(array("test_list"))
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
        $doctrine   = $this->container->get('doctrine');
        $em         = $doctrine->getManager();

        $entity     = $em->getRepository("ApiBundle:Test")->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Data not found.');
        }

        $view = View::create();
        $view->setData($entity)->setStatusCode(200)
          ->setSerializationContext(
            SerializationContext::create()
              ->setGroups(array("test_detail","toto_list"))
          )
        ;

        return $view;
      }

}

?>

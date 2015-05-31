<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Symfony\Component\Validator\ConstraintViolationList;
use JMS\Serializer\SerializationContext;

class ParamRestController extends FOSRestController
{
      /**
       * Return all data
       * @Secure(roles="ROLE_ADMIN")
       * @ApiDoc(
       *   resource = true,
       *   description = "Return all data",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @RequestParam(name="page", nullable=true, strict=true, description="Page")
       * @RequestParam(name="limit", nullable=true, strict=true, description="Nb result")
       * @RequestParam(name="orderby", nullable=true, strict=true, description="Ordre ASC|DESC")
       * @return View
       */
      public function postParamAction(ParamFetcher $paramFetcher)
      {
        $data = array(
          'page'=>$paramFetcher->get('page'),
          'limit'=>$paramFetcher->get('limit'),
          'orderby'=>$paramFetcher->get('orderby'),
        );

        $view = View::create();
        $view->setData($data)->setStatusCode(200);
        return $view;
      }

      /**
       * Return delete
       *
       * @ApiDoc(
       *   resource = true,
       *   description = "delete",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @return View
       */
      public function deleteParamAction($id)
      {
        $view = View::create();
        $view->setData(array($id))->setStatusCode(200);
        return $view;
      }


      /**
       * Return update
       *
       * @ApiDoc(
       *   resource = true,
       *   description = "update",
       *   statusCodes = {
       *     200 = "Returned when successful",
       *     404 = "Returned when not found"
       *   }
       * )
       *
       * @return View
       */
      public function putParamAction($id)
      {
        $view = View::create();
        $view->setData(array($id))->setStatusCode(200);
        return $view;
      }

}

?>

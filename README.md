composer create-project symfony/framework-standard-edition fos_rest 2.6

add to composer.json

Doctrine
"stof/doctrine-extensions-bundle": "dev-master",

JMS serializer
"jms/security-extra-bundle": "1.5.*",
"jms/di-extra-bundle": "1.5.*",
"jms/serializer-bundle": "0.13.*",

fost rest bundle
"friendsofsymfony/rest-bundle": "1.5.*",
"willdurand/rest-extra-bundle": "1.0.*",

Guzzle
"guzzlehttp/guzzle": "dev-master",

Api Doc
"nelmio/api-doc-bundle": "2.7.0",
"sami/sami": "3.0.*",


Edit config.yml

# Sensio\Bundle\FrameworkExtraBundle Configuration
sensio_framework_extra:
    router:   { annotations: true }
    request:  { converters: true, auto_convert: true }
    view:     { annotations: false }
    cache:    { annotations: true }
    security: { annotations: true }

#StofDoctrineExtensionsBundle Configuration
stof_doctrine_extensions:
    default_locale: %locale%
    orm:
        default:
            translatable: true
            timestampable: true
            sluggable: true
            loggable: true
            tree: true


added fos_rest.yml configuration

create a bundle

update routing.yml

update AppKernel.php

	new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
    new FOS\RestBundle\FOSRestBundle(),
    new JMS\AopBundle\JMSAopBundle(),
    new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
    new JMS\DiExtraBundle\JMSDiExtraBundle($this),
    new JMS\SerializerBundle\JMSSerializerBundle(),
    new Nelmio\ApiDocBundle\NelmioApiDocBundle(),

#FOSRest
restful_services:
    resource: "@TigreboiteApiBundle/Resources/config/routing.yml"
    type:     rest
    prefix:   /api

#ApiDoc
nelmio_apidoc:
    resource: "@NelmioApiDocBundle/Resources/config/routing.yml"
    prefix:   /api/doc

create a routing.yml in the bundle with

create a controller named DefaultRestController.php
 with

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

api_test:
    type: rest
    prefix: /v1
    resource: ApiBundle\Controller\DefaultRestController
    name_prefix:  api_1_ # naming collision

now call the page http://fosrest.local/api/doc/

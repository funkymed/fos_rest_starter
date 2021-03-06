# bootstrap project with fost rest bundle

First create a symfony project

```
composer create-project symfony/framework-standard-edition fos_rest 2.6
```

Add to composer.json the following lines

```
"stof/doctrine-extensions-bundle": "dev-master",
"jms/security-extra-bundle": "1.5.*",
"jms/di-extra-bundle": "1.5.*",
"jms/serializer-bundle": "0.13.*",
"friendsofsymfony/rest-bundle": "1.5.*",
"willdurand/rest-extra-bundle": "1.0.*",
"guzzlehttp/guzzle": "dev-master",
"nelmio/api-doc-bundle": "2.7.0",
"sami/sami": "3.0.*",
```

Edit app/config/config.yml and add those lines

```
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

```

added the file fos_rest.yml to the app/config/config.yml
```
- { resource: fos/fos_rest.yml }
```

Create a bundle (ex : ApiBundle)

Update app/AppKernel.php

```
new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),  
new FOS\RestBundle\FOSRestBundle(),  
new JMS\AopBundle\JMSAopBundle(),  
new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),  
new JMS\DiExtraBundle\JMSDiExtraBundle($this),  
new JMS\SerializerBundle\JMSSerializerBundle(),  
new Nelmio\ApiDocBundle\NelmioApiDocBundle(),  
```

Update app/config/routing.yml


```
#your bundle  
restful_services:  
    resource: "@ApiBundle/Resources/config/routing.yml"  
    type:     rest  
    prefix:   /api  
#ApiDoc
nelmio_apidoc:  
    resource: "@NelmioApiDocBundle/Resources/config/routing.yml"  
    prefix:   /api/doc  
```

create a routing.yml in the bundle with

create a controller named DefaultRestController.php with


```php
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
```

Added route to your bundle routing.

```
api_test:
    type: rest
    prefix: /v1
    resource: ApiBundle\Controller\DefaultRestController
    name_prefix:  api_1_ # naming collision
```

Here we go, now call the page http://fosrest.local/api/doc/

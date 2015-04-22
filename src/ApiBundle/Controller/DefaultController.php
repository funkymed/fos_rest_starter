<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use GuzzleHttp\Client;

class DefaultController extends Controller
{
    /**
     * @Route("/guzzle")
     * @Template()
     */
    public function indexAction()
    {

      $client = new Client();
      $res = $client->get('http://fosrest.local/api/v1/test.json');
      var_dump("code : ",$res->getStatusCode());
      var_dump("type : ",$res->getHeader('content-type'));
      var_dump("body : ",$res->getBody());
      var_dump("json : ",$res->json());

      return array('name' => "world");
    }
}

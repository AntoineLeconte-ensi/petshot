<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'fos_rest.view_handler' shared service.

return $this->services['fos_rest.view_handler'] = new \FOS\RestBundle\View\ViewHandler(($this->services['router'] ?? $this->getRouterService()), ($this->privates['fos_rest.serializer.symfony'] ?? $this->load('getFosRest_Serializer_SymfonyService.php')), NULL, ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ['json' => false, 'xml' => false, 'html' => true], 400, 204, false, ['html' => 302], 'twig', ['serializeNullStrategy' => false]);

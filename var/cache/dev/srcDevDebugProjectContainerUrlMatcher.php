<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = [];
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), ['HEAD', 'GET'], true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/') {
            $pathinfo = $trimmedPathinfo === $pathinfo ? $pathinfo.'/' : $trimmedPathinfo;
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $pathinfo, array &$allow = [], array &$allowSchemes = []): array
    {
        $allow = $allowSchemes = [];
        $pathinfo = rawurldecode($pathinfo) ?: '/';
        $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/';
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($trimmedPathinfo) {
            default:
                $routes = [
                    '/phone' => [['_route' => 'app_phone_list', '_controller' => 'App\\Controller\\PhoneController::listAction'], null, ['GET' => 0], null, false],
                    '/_profiler' => [['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true],
                    '/_profiler/search' => [['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false],
                    '/_profiler/search_bar' => [['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false],
                    '/_profiler/phpinfo' => [['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false],
                    '/_profiler/open' => [['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false],
                ];
    
                if (!isset($routes[$trimmedPathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$trimmedPathinfo];
                if ('/' !== $pathinfo && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                    if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                        return $allow = $allowSchemes = [];
                    }
                    break;
                }
    
                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }
    
                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = [
            0 => '{^(?'
                    .'|/phone/([^/]++)(?'
                        .'|(*:25)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:64)'
                        .'|wdt/([^/]++)(*:83)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:128)'
                                .'|router(*:142)'
                                .'|exception(?'
                                    .'|(*:162)'
                                    .'|\\.css(*:175)'
                                .')'
                            .')'
                            .'|(*:185)'
                        .')'
                    .')'
                .')/?$}sD',
        ];

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    case 25:
                        // app_phone_get
                        if ($trimmedPathinfo !== $pathinfo) {
                            goto not_app_phone_get;
                        }

                        $matches = ['imei' => $matches[1] ?? null];

                        $ret = $this->mergeDefaults(['_route' => 'app_phone_get'] + $matches, ['_controller' => 'App\\Controller\\PhoneController::getAction']);
                        if (!isset(($a = ['GET' => 0])[$canonicalMethod])) {
                            $allow += $a;
                            goto not_app_phone_get;
                        }
            
                        return $ret;
                        not_app_phone_get:
            
                         // app_phone_addphonedata
                        if ($trimmedPathinfo !== $pathinfo) {
                            goto not_app_phone_addphonedata;
                        }

                        $ret = $this->mergeDefaults(['_route' => 'app_phone_addphonedata'] + $matches, ['_controller' => 'App\\Controller\\PhoneController::addPhoneDataAction']);
                        if (!isset(($a = ['POST' => 0])[$requestMethod])) {
                            $allow += $a;
                            goto not_app_phone_addphonedata;
                        }
            
                        return $ret;
                        not_app_phone_addphonedata:

                       break;
                    default:
                        $routes = [
                            64 => [['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true],
                            83 => [['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true],
                            128 => [['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false],
                            142 => [['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false],
                            162 => [['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false],
                            175 => [['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false],
                            185 => [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true],
                        ];
            
                        list($ret, $vars, $requiredMethods, $requiredSchemes, $hasTrailingSlash, $hasTrailingVar) = $routes[$m];
            
                        $hasTrailingVar = $trimmedPathinfo !== $pathinfo && $hasTrailingVar;
                        if ('/' !== $pathinfo && !$hasTrailingVar && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                            if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                                return $allow = $allowSchemes = [];
                            }
                            break;
                        }
                        if ($hasTrailingSlash && $hasTrailingVar && preg_match($regex, rtrim($matchedPathinfo, '/') ?: '/', $n) && $m === (int) $n['MARK']) {
                            $matches = $n;
                        }
            
                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }
            
                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }
            
                        return $ret;
                }

                if (185 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return [];
    }
}

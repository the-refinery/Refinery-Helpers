<?php 

namespace therefinery\helpers\twigextensions;

class UrlHelpersTwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
          new \Twig_SimpleFilter('appendParams', [$this, 'appendParamsFilter']),
        ];
    }

    public function appendParamsFilter($url, $params) {
      $paramStart = '?';

      if (strpos($url, '?')) {
        $params = str_replace("?","&",$params);
        $paramStart = '&';
      } 

      if (substr($params,0,1) != $paramStart) {
        $params = $paramStart . $params;
      }

      return $url . $params;
    }
}
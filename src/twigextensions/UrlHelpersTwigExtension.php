<?php 

namespace therefinery\helpers\twigextensions;

class UrlHelpersTwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
          new \Twig_SimpleFilter('appendParams', [$this, 'appendParamsFilter']),
          new \Twig_SimpleFilter('appendParamsToHref', [$this, 'appendParamsToHrefFilter'], ['is_safe' => ['html']]),
        ];
    }

    public function appendParamsFilter($url, $params) {
      $paramStart = '?';

      if (strpos($url, '?')) {
        $params = str_replace("?","&",$params);
        $paramStart = '&';
      } 

      if (substr($params,0,1) == '&' || substr($params,0,1) == '?') {
        $params = substr($params, 1);
      }

      $params = $paramStart . $params;

      return $url . $params;
    }

    public function appendParamsToHrefFilter($html, $params) {
      $hrefPattern = '/(<a[^>]* href=["\'])([^"\']*)/';

      return preg_replace_callback($hrefPattern,
        function ($matches) use ($params) {
          return $matches[1] . $this->appendParamsFilter($matches[2], $params);
        },
        $html);
    }
}
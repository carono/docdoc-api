<?php

namespace carono\docdoc\codegen;

use carono\codegen\ClassGenerator;

class AbstractClient extends ClassGenerator
{
    protected function classProperties()
    {
        return [
            'url' => [
                'visibility' => 'protected',
                'value' => 'back.docdoc.ru/api/rest/1.0.6/json',
            ],
            'protocol' => [
                'visibility' => 'protected',
                'value' => 'https'
            ]
        ];
    }

    protected function formClassName()
    {
        return (new \ReflectionClass(__CLASS__))->getShortName();
    }

    protected function formExtends()
    {
        return 'carono\rest\Client';
    }

    protected function formClassNamespace()
    {
        return 'carono\docdoc';
    }

    protected function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    public function methods()
    {
        foreach ($this->params['raw'] as $item) {
            $url = $item['request']['url'];
            $methodName = self::formMethodNameByUrl($url);
            $apiUrl = self::formApiByUrl($url);
            $method = $this->phpClass->addMethod($methodName);
            $method->addComment("@url $url\n");
            $urlParams = [];
            foreach (self::extractParamsFromUrl($url) as $part) {
                $arr = explode('/', $part);
                $urlParams[$arr[0]] = $arr[1];
            }
            $requiredParams = [];
            if (isset($item['request']['params'])) {
                foreach ($item['request']['params'] as $param) {
                    $originalName = $param['name'];
                    $paramName = lcfirst($param['name']);
                    if (strlen($paramName) == 2) {
                        $paramName = strtolower($paramName);
                    }
                    if (isset($param['require']) && $param['require'] == 'Да') {
                        $method->addParameter($paramName);
                        $description = $param['description'];
                        $type = self::formParamType($param['type']);
                        $method->addComment("@param $type \$$paramName $description");
                        if ($idx = array_search("$$originalName", $urlParams)) {
                            $requiredParams[] = "'$idx' => " . '$' . $paramName;
                        }
                    }
                }
            }
//            $apiMethodClass = new Method();
//            $apiMethodClass->renderToFile([
//                'name' => $methodName,
//                'response' => isset($item['response']) ? $item['response'] : [],
//                'request' => $item['request']
//            ]);
//            $apiMethodClassName = $apiMethodClass->formClassNamespace() . '\\' . $apiMethodClass->formClassName();
            $requiredParamsStr = self::arrayAsPhpVar($requiredParams);
            $body = <<<PHP
\$params = $requiredParamsStr;
return (new Response('$apiUrl', \$this))->setParams(\$params);
PHP;
            $method->addBody($body);
            $method->addComment('@return Response');
            $this->phpNamespace->addUse('\carono\docdoc\Response');
        }
        return false;
    }

    protected static function formParamType($str)
    {
        $str = mb_strtolower($str, 'utf-8');
        $types = [
            'строка' => 'string',
            'число' => 'int',
            'массив чисел' => 'int[]'
        ];
        return isset($types[$str]) ? $types[$str] : $str;
    }

    /**
     * @param $url
     * @return array
     */
    protected static function extractParamsFromUrl($url)
    {
        if (preg_match_all('#[\w\-]+/\$[\w\-]+#', $url, $m)) {
            return $m[0];
        } else {
            return [];
        }
    }

    protected static function clearUrl($url)
    {
        $url = trim($url, '/');
        foreach (self::extractParamsFromUrl($url) as $part) {
            $url = str_replace($part, '', $url);
        }
        return array_filter(explode('/', $url));
    }

    protected static function formApiByUrl($url)
    {
        $arr = self::clearUrl($url);
        if (!$arr) {
            $url = explode('/', trim($url, '/'));
            $arr[] = $url[0];
        }
        return join('/', $arr);

    }

    protected static function formMethodNameByUrl($url)
    {
        $methods = [
            '/review/clinic/$ID' => 'reviewClinic',
            '/review/doctor/$ID' => 'reviewDoctor',
            '/doctor/by/alias/' => 'doctorByAlias',
            '/clinic/by/alias/' => 'clinicByAlias'
        ];
        foreach ($methods as $urlPart => $name) {
            if (strpos($url, $urlPart) !== false) {
                return $name;
            }
        }
        $arr = explode('/', self::formApiByUrl($url));
        foreach ($arr as &$item) {
            $item = ucfirst($item);
        }
        return lcfirst(join('', $arr));
    }

    protected function arrayAsPhpVar($array)
    {
        $export = join(",\n\t", $array);
        if ($array) {
            $result = "[\n\t$export\n]";
        } else {
            $result = "[]";
        }
        return $result;
    }
}
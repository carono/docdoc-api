<?php

namespace carono\docdoc\codegen;

class Method extends \carono\codegen\ClassGenerator
{
    public function formClassName()
    {
        return ucfirst($this->params['name']);
    }

    public function formClassNamespace()
    {
        return 'carono\docdoc\methods';
    }

    public function formOutputPath()
    {
        return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'methods' . DIRECTORY_SEPARATOR . $this->formClassName() . '.php';
    }

    public function formExtends()
    {
        return 'carono\docdoc\AbstractMethod';
    }
}
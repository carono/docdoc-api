<?php

namespace carono\docdoc;

class Client extends AbstractClient
{
    public function getContent($urlRequest, $data = [])
    {
//        echo $this->buildUrl($urlRequest);
        return parent::getContent($urlRequest, $data);
    }

//    public function guzzleOptions()
//    {
//        parent::guzzleOptions();
//        $this->_guzzleOptions['proxy'] = 'tcp://localhost:8888';
//    }
}
<?php

use \Socialite\Component\OAuth\Oauth;

class OAuthTest extends \PHPUnit_Framework_TestCase {
    protected $raw;
    protected $encoded;
    protected $array;

    public function setUp() {
        $this->raw = 'param1=a&param2=b&param3=c';
        $this->encoded = 'param1%3Da%26param2%3Db%26param3%3Dc';
        $this->array = array('param1'=>'a', 'param2'=>'b', 'param3'=>'c');
    }

    public function testStaticMethods() {
        $this->assertEquals($this->encoded, OAuth::urlencode($this->raw));
        $this->assertEquals($this->raw, OAuth::urldecode($this->encoded));
        $this->assertEquals($this->raw, OAuth::buildHttpQuery($this->array));
    }
}

<?php

namespace Listener;

use \Library\IRC\Listener\Base as BaseListener;
use \Util\Util;

class Op extends BaseListener { 

    protected $util;

    protected $names = array(
        'orloc',
        'x4via',
        'isleshocky77'
    );

    public function __construct(){
        $this->util = new Util;
    }


    public function execute($data){
        $args = $this->getArguments($data);

        if (in_array(($name = $this->util->getUserNickName($args[0])), $this->names)){
            $this->say('/op' . " $name");
        }

    }

    public function getKeywords(){
        return array("JOIN");
    }
}

<?php

namespace Listener;

use \Library\IRC\Listener\Base as BaseListener;
use \Util\Util;

class Op extends BaseListener { 

    protected $util;

    protected $names = array(
        'orloc',
        'xavia',
        'isleshocky77'
    );

    public function __construct(){
        $this->util = new Util;
    }


    public function execute($data){
        $args = $this->getArguments($data);

        if (in_array(($name = $this->util->getUserNickName($args[0])), $this->names)){
            $this->connection->sendData(
                "MODE {$args[2]} +o $name"
            );
        }

    }

    public function getKeywords(){
        return array("JOIN");
    }
}

<?php
// Namespace
namespace Listener;

use \Util\Util;
/**
 *
 * @package IRCBot
 * @subpackage Listener
 * @author Matej Velikonja <matej@velikonja.si>
 */
class Joins extends \Library\IRC\Listener\Base {


    protected $util;

    public function __construct(){
        $this->util = new Util();
    }

    /**
     * Main function to execute when listen even occurs
     */
    public function execute($data) {
        $args = $this->getArguments($data);

        $this->say($this->util->getUserNickName($args[0]) . ", welcome to channel " . $args[2] . ". I am your servant, and can be instructed with the following: " . $this->getCommandsName(), $args[2]);
    }

    private function getCommandsName() {
        $commands = $this->bot->getCommands();

        $names = array();
        /* @var $command \Library\IRC\Command\Base */
        foreach ($commands as $name => $command) {
            $names[] = $this->bot->getCommandPrefix() . $name;
        }

        return implode(", ", $names);
    }


    /**
     * Returns keywords that listener is listening to.
     *
     * @return array
     */
    public function getKeywords() {
        return array("JOIN");
    }
}

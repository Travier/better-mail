<?php
namespace Travier\BetterMail;

class Override {
    /**
     * Override internal or defined functions
     * $name string name of function to override
     * $closure new overriding function
     */
    public static function func($name, $closure) {
        try {
            return runkit_function_redefine($name, $closure);
        } catch(Exception $e) {
            throw $e;
        }
        
        return false;
    }
}
?>
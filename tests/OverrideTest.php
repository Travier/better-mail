<?php 
use Travier\BetterMail\Override;
/**
*  Corresponding Class to test YourClass class
*
*  For each class in your library, there should be a corresponding Unit-Test for it
*  Unit-Tests should be as much as possible independent from other test going on.
*
*  @author yourname
*/
class OverrideTest extends PHPUnit_Framework_TestCase{
	
  /**
  * Just check if the YourClass has no syntax error 
  *
  * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
  * any typo before you even use this library in a real project.
  *
  */
  public function testFunc(){
	Override::func('mail', function($a, $b) {
        return $a + $b;
    });

    $val = mail(2, 2);
    
    $this->assertEquals($val, 4);
  }
}
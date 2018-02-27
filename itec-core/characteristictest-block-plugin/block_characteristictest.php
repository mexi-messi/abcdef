<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block displaying information about current logged-in user.
 *
 * This block can be used as anti cheating measure, you
 * can easily check the logged-in user matches the person
 * operating the computer.
 *
 * @package    block_myprofile
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Displays the current user's profile information.
 *
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_characteristictest extends block_base {
    /**
     * block initializations
     */
    public function init() {
        $this->title   = get_string('pluginname', 'block_characteristictest');
    }
	public function get_content() {
    if ($this->content !== null) {
      return $this->content;
    }
 
    $this->content         =  new stdClass;
global $USER,$COURSE;
$zxc = $USER->id;
$cxz = $COURSE->id;
    
	$this->content->text .= '<div> <h5 style="text-align:center">This is where you can test your characteristic.Including 24 questions for you to find out whether you are an Activist,Reflector,Theorist or Pragmatist!! .</h5> <br></div>'; 
	

    $this->content->footer = '<div style="text-align:center"><a id="a" href="../itec/test.php"> Test quiz </a> </div>'; 



	/*$this->content->footer = '<div style="text-align:center"><a id="a" href="../itec/resetcourse.php?csid='.$cxz.'&usname='.$zxc.'"> Reset course </a> </div>'; */


	
 
    return $this->content;
	}
}

   ?>








<style>

#a:hover {
	color:white;
	background-color: #88b77b;
	border:#88b77b;
}
#a{
	text-align: center;
	padding: 5px 20px;
	background-color: white;
	border: 2px solid #f60;	
	border: ;

}


</style>

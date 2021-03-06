<?php
// This file is part of Rogō
//
// Rogō is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Rogō is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Rogō.  If not, see <http://www.gnu.org/licenses/>.

/**
* 
* @author Simon Wilkinson
* @version 1.0
* @copyright Copyright (c) 2014 The University of Nottingham
* @package
*/

echo $configObject->get('cfg_js_root');
?>
<script type="text/javascript" src="<?php echo $configObject->get('cfg_root_path') ?>/tools/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<?php
if (isset($user_answers[$current_screen][$q_id]) and $user_answers[$current_screen][$q_id] == '' and $screen_pre_submitted == 1) {
?>
<script type="text/javascript" src="<?php echo $configObject->get('cfg_root_path') ?>/tools/tinymce/jscripts/tiny_mce/tiny_config_unanswered.js"></script>
<?php
} else {
?>
<script type="text/javascript" src="<?php echo $configObject->get('cfg_root_path') ?>/tools/tinymce/jscripts/tiny_mce/tiny_config_answered.js"></script>
<?php
}
?>
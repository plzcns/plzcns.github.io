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
* Delete a session in the internal list of objectives.
*
* @author Simon Wilkinson
* @version 1.0
* @copyright Copyright (c) 2014 The University of Nottingham
* @package
*/

require '../include/sysadmin_auth.inc';

// Query 'objectives' to get the IDs of the 'relationships' records to delete.
$obj_data = $mysqli->prepare("SELECT obj_id FROM objectives WHERE identifier = ? AND idMod = ? AND calendar_year = ?");
$obj_data->bind_param('dis', $_POST['identifier'], $_POST['moduleID'], $_POST['session']);
$obj_data->execute();
$obj_data->store_result();
$obj_data->bind_result($obj_id);
while ($obj_data->fetch()) {
  // Delete from 'relationships' table.
  $result = $mysqli->prepare("DELETE FROM relationships WHERE obj_id = ? AND idMod = ? AND calendar_year = ? AND vle_api = ''");
  $result->bind_param('iis', $obj_id, $_POST['moduleID'], $_POST['session']);
  $result->execute();  
  $result->close();
}
$obj_data->close();

// Delete from 'sessions' table.
$result = $mysqli->prepare("DELETE FROM sessions WHERE identifier = ? AND idMod = ? AND calendar_year = ?");
$result->bind_param('dis', $_POST['identifier'], $_POST['moduleID'], $_POST['session']);
$result->execute();  
$result->close();

// Delete from 'objectives' table.
$result = $mysqli->prepare("DELETE FROM objectives WHERE identifier = ? AND idMod = ? AND calendar_year = ?");
$result->bind_param('dis', $_POST['identifier'], $_POST['moduleID'], $_POST['session']);
$result->execute();  
$result->close();

$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="content-type" content="text/html;charset=<?php echo $configObject->get('cfg_page_charset') ?>" />
  
  <title>Session Deleted</title>
  
  <link rel="stylesheet" type="text/css" href="../css/body.css" />
  <link rel="stylesheet" type="text/css" href="../css/check_delete.css" />

  <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
  <script>
		$(document).ready(function() {
      window.opener.location.reload();
      self.close();
    });
  </script>
</head>

<body>

<p><?php echo $string['msg']; ?></p>

<div class="button_bar">
<form action="" method="get" autocomplete="off">
<input type="button" name="cancel" value="OK" class="ok" onclick="javascript:window.close();" />
</form>
</div>

</body>
</html>

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

if (isset($_GET['module'])) {
  $module = $_GET['module'];
} else {
  $module = '';
}
if (isset($_GET['folder'])) {
  $folder = $_GET['folder'];
} else {
  $folder = '';
}
?>
<div id="left-sidebar" class="sidebar">
<script>
  function deleteReview() {
    notice=window.open("../delete/check_delete_review.php?std_setID=" + $('#std_setID').val() + "","notice","width=420,height=170,scrollbars=no,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable");
    notice.moveTo(screen.width/2-210, screen.height/2-85);
    if (window.focus) {
      notice.focus();
    }
  }
  function editReview() {
    var methodType = '';
    if ($('#method').val() == 'Modified Angoff') {
      methodType = 'modified_angoff';
    } else if ($('#method').val() == 'Ebel') {
      methodType = 'ebel';
    } else {
      methodType = 'hofstee';
    }

    if (groupReview == 'No') {
      if (methodType == 'hofstee') {
        window.location.href = "hofstee.php?paperID=<?php echo $_GET['paperID']; ?>&std_setID=" + $('#std_setID').val() + "&method=" + methodType + "&module=<?php echo $module; ?>&folder=<?php echo $folder; ?>";
      } else {
        window.location.href = "individual_review.php?paperID=<?php echo $_GET['paperID']; ?>&std_setID=" + $('#std_setID').val() + "&method=" + methodType;
      }
    } else {
      window.location.href = "group_set_angoff.php?paperID=<?php echo $_GET['paperID']; ?>&std_setID=" + $('#std_setID').val() + "&reviewers=" + $('#setterID').val() + "&module=<?php echo $module; ?>&folder=<?php echo $folder; ?>&method=" + methodType;
    }
  }
</script>

<form name="StdSetMenu" action="" autocomplete="off">


<div class="submenuheading"><?php echo $string['individualrating'] ?></div>


<div id="menu1">
	<div class="grey menuitem" onclick="launchHelp(97)"><img class="sidebar_icon" src="../artwork/small_help_icon.gif" alt="Help" /><a href="#" onclick="return false"><?php echo $string['aboutstandardssetting'] ?></a></div>
	<div class="grey menuitem"><a href="individual_review.php?paperID=<?php echo $_GET['paperID']; ?>&method=modified_angoff&module=<?php echo $module; ?>&folder=<?php echo $folder ?>"><img class="sidebar_icon" src="../artwork/std_set_icon_16.gif" alt="Angoff Method" /><?php echo $string['createmodifiedangoff'] ?></a></div>
	<div class="grey menuitem"><a href="individual_review.php?paperID=<?php echo $_GET['paperID']; ?>&method=ebel&module=<?php echo $module; ?>&folder=<?php echo $folder ?>"><img class="sidebar_icon" src="../artwork/std_set_icon_16.gif" alt="Ebel Method" /><?php echo $string['createebelmethod'] ?></a></div>
	<div class="grey menuitem"><a href="hofstee.php?paperID=<?php echo $_GET['paperID']; ?>&module=<?php echo $module; ?>&folder=<?php echo $folder ?>"><img class="sidebar_icon" src="../artwork/std_set_icon_16.gif" alt="Ebel Method" /><?php echo $string['createhofsteemethod'] ?></a></div>
</div>

<br />

<div class="submenuheading"><?php echo $string['currentrating']; ?></div>
<div id="menu2a">
	<div class="grey menuitem"><img class="sidebar_icon" src="../artwork/edit_grey.png" alt="Arrow" /><?php echo $string['editrating'] ?></div>
	<div class="grey menuitem"><img class="sidebar_icon" src="../artwork/red_cross_grey.png" alt="Arrow" /><?php echo $string['delete'] ?></div>
</div>

<div id="menu2b">
	<div class="menuitem" onclick="editReview()"><img class="sidebar_icon" src="../artwork/edit.png" alt="Arrow" /><a onclick="return false" href="#"><?php echo $string['editrating'] ?></a></div>
	<div class="menuitem" onclick="deleteReview()"><img class="sidebar_icon" src="../artwork/red_cross.png" alt="Arrow" /><a href="#" onclick="return false"><?php echo $string['delete'] ?></a></div>
</div>

<div id="menu2c">
	<div class="grey menuitem"><img class="sidebar_icon" src="../artwork/edit_grey.png" alt="Arrow" /><?php echo $string['editrating'] ?></div>
	<div class="grey menuitem"><img class="sidebar_icon" src="../artwork/red_cross_grey.png" alt="Arrow" /><?php echo $string['delete'] ?></div>
</div>

<br />

<div class="submenuheading"><?php echo $string['grouprating']; ?></div>
<div id="menu3">
<?php 
if (isset($no_reviews) and $no_reviews > 1) {
?>
<div class="menuitem"><a href="get_group.php?paperID=<?php echo $_GET['paperID']; ?>&module=<?php echo $_GET['module']; ?>&folder=<?php echo $_GET['folder'] ?>&method=modified_angoff"><img class="sidebar_icon" src="../artwork/small_users_icon.png" alt="Angoff Method" /><?php echo $string['modifiedangoff']; ?></a></div>
<?php
} else {
?>
<div class="grey menuitem"><img class="sidebar_icon" src="../artwork/small_users_icon_grey.png" alt="Angoff Method" /><?php echo $string['modifiedangoff'] ?></div>
<?php
}
?>
</div>

<input type="hidden" name="std_setID" id="std_setID" value="" />
<input type="hidden" name="setterID" id="setterID" value="" />
<input type="hidden" name="reviewID" id="reviewID" value="" />
<input type="hidden" name="oldReviewID" id="oldReviewID" value="" />
<input type="hidden" name="method" id="method" value="" />
</form>
</div>
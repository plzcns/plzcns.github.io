// JavaScript Document
// This file is part of Rogo
//
// Rogo is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Rogo is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Rogo.  If not, see <http://www.gnu.org/licenses/>.

//
//
// Oauth client admin page js functions
//
// @author Dr Joseph Baxter <joseph.baxter@nottingham.ac.uk>
// @version 1.0
// @copyright Copyright (c) 2016 The University of Nottingham
//

function viewoption() {
    window.location.href = './edit_oauthclient.php?client=' + $('#lineID').val();
}

function deleteoption() {
    notice = window.open("../../delete/check_delete_oauthclient.php?client=" + $('#lineID').val() + "", "LTIkeyss", "width=520,height=170,scrollbars=no,toolbar=no,location=no,directories=no,status=no,menubar=no,resizable");
    notice.moveTo(screen.width / 2 - 270, screen.height / 2 - 85);
    if (window.focus) {
      notice.focus();
    }
}

function edit(id) {
    document.location.href='./edit_oauthclient.php?client=' + id;
}

$(function () {
    if ($("#maindata").find("tr").size() > 1) {
        $("#maindata").tablesorter({ 
            sortList: [[0,0]] 
        });
    }

    $(".l").click(function(event) {
        event.stopPropagation();
        selLine($(this).attr('id'),event);
    });

    $(".l").dblclick(function() {
        edit($(this).attr('id'));
    });
});
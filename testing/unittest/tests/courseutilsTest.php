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

use testing\unittest\unittestdatabase;

/**
 * Test courseutils class
 * 
 * @author Dr Joseph Baxter <joseph.baxter@nottingham.ac.uk>
 * @version 1.0
 * @copyright Copyright (c) 2016 onwards The University of Nottingham
 * @package tests
 */
class courseutilstest extends unittestdatabase {
    
    /**
     * Get init data set from yml
     * @return dataset
     */
    public function getDataSet() {
        return new PHPUnit_Extensions_Database_DataSet_YamlDataSet($this->get_base_fixture_directory() . "courseutilsTest" . DIRECTORY_SEPARATOR . "courseutils.yml");
    }
    /**
     * Test comparing  courses with external list
     * @group courses
     */
    public function test_diff_external_courses_to_internal_courses() {
        $external = array("ABCD", "EFGH", "IJKL");
        $this->assertEquals(array("WXYZ"), CourseUtils::diff_external_courses_to_internal_courses($external, 'external', $this->db));
    }
    /**
     * Test gettings course id  given external id
     * @group courses
     */
    public function test_get_courseid_from_externalid() {
        $external = "ABCD";
        $this->assertEquals(1, CourseUtils::get_courseid_from_externalid($external, $this->db));
    }
}
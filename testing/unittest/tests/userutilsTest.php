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
 * Test userutils class
 * 
 * @author Dr Joseph Baxter <joseph.baxter@nottingham.ac.uk>
 * @version 1.0
 * @copyright Copyright (c) 2016 onwards The University of Nottingham
 * @package tests
 */
class userutilstest extends unittestdatabase {
    /**
     * Get init data set from yml
     * @return dataset
     */
    public function getDataSet() {
        return new PHPUnit_Extensions_Database_DataSet_YamlDataSet($this->get_base_fixture_directory() . "userutilsTest" . DIRECTORY_SEPARATOR . "userutils.yml");
    } 
    /**
     * Test gettign enrolment id
     * @group user
     */
    public function test_get_enrolement_id() {
        // Enrolment exists.
        $this->assertEquals(1, UserUtils::get_enrolement_id(1000, 3, 2016, $this->db));
        // Enrolment does not exist.
        $this->assertEquals(false, UserUtils::get_enrolement_id(1, 3, 2016, $this->db));
    }
    
}

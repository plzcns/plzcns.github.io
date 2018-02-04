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
 * Class for Multiple Response options
 *
 * @author Rob Ingram
 * @version 1.0
 * @copyright Copyright (c) 2014 The University of Nottingham
 * @package
 */

Class OptionAREA extends OptionEdit {
  protected $_fields_required = array('question_id', 'marks_correct', 'correct');

  /**
   * Is this option blank?
   * @return boolean
   */
  public function is_blank() {
    return ($this->correct == '');
  }
  
  /**
   * Check that the minimum set of fields exist in the given data to create a new option 
   * @param array $data
   * @param array $files expects PHP FILES array
   * @param integer $index option number
   * @return boolean
   */
  public function minimum_fields_exist($data, $files, $index) {
    return true;
  }

  /**
   * @param string $value
   */
  public function set_correct($value) {
    if (strpos($value, ';') !== false) {
      $tmp = explode(';', $value);
      $value = $tmp[1];
    }
    $value = rtrim($value, ', ');
    parent::set_correct($value);
  }
}


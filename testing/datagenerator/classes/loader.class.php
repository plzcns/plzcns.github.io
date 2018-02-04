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

namespace testing\datagenerator;
use testing\datagenerator\generator;

/**
 * Utility class to find and load Rogo data generators.
 *
 * @author Neill Magill <neill.magill@nottingham.ac.uk>
 * @copyright Copyright (c) 2015 The University of Nottingham
 * @package testing
 * @subpackage datagenerator
 */
class loader {
  /** @var mysqli Store the database connection object to be used by data generators. */
  protected static $db = null;

  /**
   * Loads a datagenerator.
   *
   * @param string $name The name of the generator.
   * @param string $component The component the generator is from (optional).
   * @return \testing\datagenerator\datagenerator
   * @throws \testing\datagenerator\not_found
   */
  public static function get($name, $component = 'core') {
    $locationbase = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'generators' . DIRECTORY_SEPARATOR;
    $location = $locationbase . $component . DIRECTORY_SEPARATOR . $name . '.php';
    if (file_exists($location)) {
      require_once $location;
    } else {
      // The data generator file does not exist.
      throw new not_found($name, $component);
    }
    //Create insance and check this is a valid data generator.
    $classname = "\\testing\\datagenerator\\$name";
    $datagenerator = new $classname();
    if (!($datagenerator instanceof \testing\datagenerator\generator)) {
      // A valid data generator was not created.
      throw new not_found($name, $component);
    }
    return $datagenerator;
  }

  /**
   * Sets the database connection object that should be used by data generators.
   * This should only be set by test suites and not individual tests.
   *
   * @param mysqli $database
   */
  public static function set_database($database) {
    self::$db = $database;
  }

  /**
   * Returns the database object that should be used by data generators.
   *
   * @return mysqli
   * @throws \testing\datagenerator\no_database
   */
  public static function get_database() {
    if (!isset(self::$db)) {
      throw new no_database();
    }
    return self::$db;
  }
}

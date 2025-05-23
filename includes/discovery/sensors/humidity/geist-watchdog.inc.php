<?php

/**
 * geist-watchdog.inc.php
 *
 * LibreNMS humidity discovery module for Geist Watchdog
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * @link       https://www.librenms.org
 *
 * @copyright  2017 Neil Lathwood
 * @author     Neil Lathwood <gh+n@laf.io>
 */

use LibreNMS\Util\Number;

$value = Number::cast(SnmpQuery::get('GEIST-MIB-V3::climateHumidity')->value());
if ($value) {
    $current_oid = '.1.3.6.1.4.1.21239.2.2.1.7.1';
    $descr = 'Humidity';
    discover_sensor(null, 'humidity', $device, $current_oid, 'climateHumidity', 'geist-watchdog', $descr, 1, 1, null, null, null, null, $value);
}

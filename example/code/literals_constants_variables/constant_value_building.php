<?php

// Using a function call
define('SOME_DATE', date('Y-m-d H:i:s'));
// const OTHER_DATE = date('Y-m-d H:i:s');
// PHP Fatal error:  Constant expression contains invalid operations

print('Some date: ' . SOME_DATE . "\n\n");

// Using concatenation with runtime values
$hostName = 'localhost'; // gethostname();
define('SOME_FILE_PATH', '/var/log/app_' . $hostName . '.log');
// const OTHER_FILE_PATH = '/var/log/app_' . $hostName . '.log';
// PHP Fatal error:  Constant expression contains invalid operations

print('Some date: ' . SOME_DATE . "\n\n");

// Using superglobals variables
define('SOME_FILE_NAME', $_SERVER['PHP_SELF']);
// const OTHER_FILE_NAME = $_SERVER['PHP_SELF'];
// PHP Fatal error:  Constant expression contains invalid operations

print('Some file name: ' . SOME_FILE_NAME . "\n\n");

// Using a non-constant array element
$prefix = 'app_';
define('SOME_SERVICE_INFO', [
    'version' => '1.0.0',
    'last_release_date' => '06.12.2025',
    'prefixed_name' => $prefix . 'service',
]);
// const OTHER_SERVICE_INFO = [
//     'version' => '1.0.0',
//     'last_release_date' => '06.12.2025',
//     'prefixed_name' => $prefix . 'service',
// ];
// PHP Fatal error:  Constant expression contains invalid operations

print("Some service info:\n");
print_r(SOME_SERVICE_INFO);
print("\n");

// Using non-scalar (e.g. object or resource) array element
define('SOME_TEST_INFO', [
    'type' => 'unit',
    'object'  => new stdClass(),
]);
const OTHER_TEST_INFO = [
    'type' => 'unit',
    'object'  => new stdClass(),
];

print("Some test info:\n");
print_r(SOME_TEST_INFO);
print("Other test info:\n");
print_r(OTHER_TEST_INFO);
print("\n");

<?php

declare(strict_types=1);

require_once __DIR__.'/database.php';

// Table structure
// |    id   |   name    |    age    |   country    |

// 1. Create user

create_user(database_connection(), 'Kinkin', 21, 'Ukraine');
create_user(database_connection(), 'John Dou');

// 2. Read user

$user = read_user(database_connection(), 1);

print_r($user);

$user = read_user(database_connection(), 2);

print_r($user);

// 3. Update user

update_user(database_connection(), 2, country: 'Canada');

$user = read_user(database_connection(), 2);

print_r($user);

// 4. Delete user

delete_user(database_connection(), 1);

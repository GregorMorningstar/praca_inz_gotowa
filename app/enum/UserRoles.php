<?php

namespace App\enum;

enum UserRoles
{
const ADMIN = 'admin';
const FORWARDER = 'forwarder';
const DRIVER = 'driver';
const  USER = 'user';

const TYPEROLES = [
    self::ADMIN,
    self::USER,
    self::FORWARDER,
    self::DRIVER,
];
}

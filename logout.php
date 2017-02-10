<?php
/**
 * Created by PhpStorm.
 * User: gbern
 * Date: 02/02/17
 * Time: 12:45 PM
 */
session_start();

session_destroy();

header("location: /");
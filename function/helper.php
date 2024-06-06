<?php

define("BASE_URL", "http://localhost/Project/");

function base_url($path = '') {
    return BASE_URL . $path;
}
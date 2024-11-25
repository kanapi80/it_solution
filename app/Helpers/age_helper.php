<?php

if (!function_exists('calculate_age')) {
    function calculate_age($birthdate)
    {
        $birthDate = new DateTime($birthdate);
        $today = new DateTime('today');
        $age = $birthDate->diff($today)->y;
        return $age;
    }
}

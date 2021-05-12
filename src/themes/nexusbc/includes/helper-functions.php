<?php
function strip_tel($number)
{
    return preg_replace('/[^0-9]/', '', $number);
}
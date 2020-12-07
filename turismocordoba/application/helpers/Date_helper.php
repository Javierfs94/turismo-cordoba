<?php

function format_date($date){
    $date = new DateTime($date);
    return $date->format("d/m/Y");
}
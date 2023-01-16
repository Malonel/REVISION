<?php
/* 
* PHP cryptocurrency number handling library
*/

function remove_ep($num) {
  return str_replace('ep', '', $num);
}

function float_format($num, $dec=10, $pow=0, $sep='.', $ths='') {

  return number_for
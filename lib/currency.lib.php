<?php
/* 
* PHP cryptocurrency number handling library
*/

function remove_ep($num) {
  return str_replace('ep', '', $num);
}

function float_format($num, $dec=10, $pow=0, $sep='.', $ths='') {

  return number_format(bcmul(remove_ep($num), bcpow(10, $pow)), $dec-$pow, $sep, $ths);	
}
 
function coins_to_int($num, $coin=1e10) {
  
  return bcmul(remove_ep($num), $coi
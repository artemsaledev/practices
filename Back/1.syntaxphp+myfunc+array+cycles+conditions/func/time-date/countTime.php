<?php  
header('Content-Type: text/html; charset=utf-8');

function endings($timekey,$timeval) {
          $m0 = $timekey % 10;
          $m1 = $timekey % 100;

            if($m1 >= 5 && $m1 <=20) {
              $res = $timeval[0];
            }
              elseif($m0 == 1) {
                  $res = $timeval[1];
              }
                elseif($m0 >= 2 && $m0 <=4) {
                    $res = $timeval[2];
                }
                else {$res = $timeval[0];}
              return $res;
                } //function endings        

function endingsCount_Time() {

      $arr_hour       = ['часов','час','часа']; 
      $arr_minutes    = ['минут','минуту','минуты'];
      $arr_second     = ['секунд','секунду','секунды'];

    $hour   = date('H');
    $minute = date('i');
    $second = date('s');

    // foreach ($arr_hour as $key) { 
          $tkeyH = endings($hour,$arr_hour);
    //      echo $tkeyH;  
    //   } // each count
    // foreach ($arr_minutes as $key) { 
          $tkeyM = endings($minute,$arr_minutes);
    //      echo $tkeyM;  
    //   } // each count
    // foreach ($arr_second as $key) { 
          $tkeyS = endings($second,$arr_second);
    //      echo $tkeyS;  
    //   } // each count

      $result = "$hour $tkeyH $minute $tkeyM $second $tkeyS";
      return $result;
 } //function
 
echo "<pre>";
echo "<br>" . endingsCount_Time() . "<br>";
echo "</pre>";

?>
<?php
$x= 0;
$separado ="";
$separado2 ="";
$data = file_get_contents ("data-1.json");
$json = json_decode($data, true);
        foreach ($json as $key => $value) {
            if (!is_array($value)) {

              } else {
                 foreach ($value as $key => $val) {
                   //echo $val;
                   if($key == 'Ciudad'){
                       $pos = strpos($separado,$val);
                       if ($pos === false) {
                          $ciudades[$x] = $val;
                          $separado = implode(";", $ciudades);
                              $x = $x+1;
                       } else {
                      }
                      //     echo $ciudades[$x];
                       }//segundo foreach
                    } //pregunta del arreglo
              } //p foreach
            }
asort($ciudades);
            foreach ($ciudades as $key => $val) {
}

$data2 = file_get_contents ("data-1.json");
$json2 = json_decode($data2, true);
foreach ($json2 as $key => $value1) {
  if (!is_array($value1)) {
    //echo $key . '=>' . $value . '<br/>';
         } else {
    foreach ($value1 as $key => $val) {
      if($key == 'Tipo'){
          $pos = strpos($separado,$val);
          if ($pos === false) {
             $tipos[$x] = $val;
             $separado = implode(";", $tipos);
       //      $separado2 = implode($ciudades);
             //  echo $ciudades[$x];
             $x = $x+1;
          } else {
         }
         //     echo $ciudades[$x];

      }//segundo foreach
    } //pregunta del arreglo
  } //p foreach
}
asort($tipos);
foreach ($tipos as $key => $val) {
}

?>

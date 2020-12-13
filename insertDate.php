<?php
//if ($checkin != null  or $checkint != null or $p_type != null){
//    if (($checkin > $now) and (($checkint >= $start )&& ($checkint <= $end))) {
function insertData(){
        //if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if ($_POST['action'] == "insert"){

          $db = new SQLite3('park_city.db');
          $stmt=$db->prepare("INSERT INTO confirmed_trans (trans_date, check_in, pref_time, est_amount, service_type) SELECT trans_date, check_in, pref_time, est_amount, service_type from daily_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
          $stmt->execute();
          $stmt->close();
          $db->close();
        }
//    }
}
?>

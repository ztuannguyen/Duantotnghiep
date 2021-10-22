<?php
function get_total_slot_remain($remainSlot,$slotId,$arrBookedServices){
    // dd($remainSlot,$slotId, $arrBookedServices);
    foreach($arrBookedServices as $bookedSlot){
        if($bookedSlot->doing_time_id == $slotId){
            $remainSlot -= 1;
        }
    }
    return $remainSlot;
}
?>
<?php 


namespace Hotel;


use DateTime;
use DateInterval;
use DatePeriod;

/**
* Misc
*/
class Misc{
    
    protected $messages = array();

    public function setMessages($message){

        if (!is_array($message)) {
            $this->messages[0] = $message;
            return ;
        }

        $result = array(); 
        foreach ($message as $key => $value) { 
            if (is_array($value)) { 
                $result = array_merge($result, array_flatten($value)); 
            } 
            else { 
                $result[$key] = $value; 
            } 
        } 

        $this->messages = $result; 
    }

    public function getMessages($color = 'danger'){

        // need to solve set mathod

        if (!empty($this->messages)) {
            foreach ($this->messages as $message) {
                $this->styleMessage($message, $color);
            }
        }
    }

    public function styleMessage($message, $color = 'danger'){?>
        <div class="alert alert-<?php echo $color; ?>">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $message; ?>
        </div>
    <?php }


    public function imageProcess($image, $uploadDir = "uploads/", $img_x = 500, $img_y = 500){

        if ($image['name'] === "") {
            return false;
        }

        $unique = uniqid(mt_rand(), true);

        $profilePic = new \Hotel\Upload($image); 
        if ($profilePic->uploaded) {

            // save uploaded image with no changes
            $profilePic->file_new_name_body = $unique;
            $profilePic->dir_auto_create = true;
            $profilePic->dir_auto_chmod = true;
            $profilePic->file_max_size = '512000'; // 1KB
            $profilePic->allowed = array('image/*');
            $profilePic->forbidden = array('application/*');
            $profilePic->image_convert = 'jpg';
            $profilePic->image_resize = true;
            $profilePic->image_x = $img_x;
            $profilePic->image_y = $img_y;
            $profilePic->Process($uploadDir);
            if ($profilePic->processed) {
                $directory = str_replace("../", "", $uploadDir);
                return $directory . $unique . ".jpg";
            } else {
                return false;
            }
        }
    }


    public function dateRange(){

        // init and assign value to variable.
        $begin = new DateTime();
        $end = new DateTime("+ 9 days");
        $interval = null;
        $strDate = array();
        $toDate = array();

        // Because DatePeriod does not include the last date specified.
        $end = $end->modify('+1 day');
        $interval = new DateInterval($interval ? $interval : 'P1D');

        $dates = iterator_to_array(new DatePeriod($begin, $interval, $end), false);
        foreach ($dates as $date) {
            if ($date->format("D") === "Mon" || $date->format("D") === "Fri") {
                $strDate[] = $date->format("Y-m-d l");
            }
            
        }

        for ($i=0; $i < 2; $i++) { 
            $toDate[] = $strDate[$i] . " to " . $strDate[$i+1];
        }
        return $toDate;
    }

    public function getCabinAvailableDate($id){

        $booking = \Hotel\Models\Booking::where("cabinid", $id)->get()->toArray();

        $dateRang = $this->dateRange();

        foreach ($booking as $book) {

            // Search
            $index = array_search($book["date"], $dateRang);

            // Remove from array
            unset($dateRang[$index]);
        }

        return $dateRang;
    }
}
<?php 


namespace Hotel;


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

        $this->messages = $message;


        // foreach ($message as $key => $value) {
        //     if (is_array($value)) {
        //         foreach ($value as $v) { // need to run for loop to solve this problem.
        //             $this->message = $v;
        //         }
                
        //     }
        // }
    }

    public function getMessages($color = 'danger'){

        // need to solve set mathod

        // if (!empty($this->messages)) {
        //     foreach ($this->messages as $message) {
        //         $this->styleMessage($message, $color);
        //     }
        // }

        return $this->messages;
    }

    public function styleMessage($message, $color = 'danger'){?>
        <div class="alert alert-<?php echo $color; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
                return $uploadDir . $unique . ".jpg";
            } else {
                return false;
            }
        }
    }
}
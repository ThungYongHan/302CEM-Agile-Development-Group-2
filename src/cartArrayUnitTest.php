<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<?php

class cartArrayUnitTest {

    public function validateCartIsArray() {
        $addCart = array("isbn" => "a", "amt" => 1, "title" => "a", "pic" => "a", "price" => 12);
        if (is_array($addCart)) {
            return true;
        } else
            return false;
    }

    public function validateCartKey() {
        $addCart = array("isbn" => "a", "amt" => 1, "title" => "a", "pic" => "a", "price" => 12);
        return $addCart;
    }

    public function validateCartType($isbn, $amt, $title, $pic, $price) {
        $addCart = array("isbn" => $isbn, "amt" => $amt, "title" => $title, "pic" => $pic, "price" => $price);

        if (is_string($addCart['isbn']) && is_int($addCart['amt']) && is_string($addCart['title']) &&
            is_int($addCart['price'])) {
            if ($this->validate_url($addCart['pic']) &&
                $this->validate_int($addCart['amt'], $addCart['price'])) {
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    //add these in home_action when writing report
    function validate_url($url) {
        $path = parse_url($url, PHP_URL_PATH);
        $encoded_path = array_map('urlencode', explode('/', $path));
        $url = str_replace($path, implode('/', $encoded_path), $url);

        return filter_var($url, FILTER_VALIDATE_URL) ? true : false;
    }

    //add these in home_action when writing report
    function validate_int($amt, $price) {
        if ($amt >= 0 && $price > 0) {
            return true;
        } else {
            return false;
        }
    }

<<<<<<< Updated upstream
}
=======
}
>>>>>>> Stashed changes

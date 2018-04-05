<?php

class House {
    public function introduce() {
        print("House " . $this->getHouseName());
        print(" of " . $this->getHouseSeat());
        print(" : " . $this->getHouseMotto() . "\"" . PHP_EOL);
    }
}

?>

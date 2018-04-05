<?php

class UnholyFactory {
    public function absorb($soldier_type) {
        if ($soldier_type instanceof Fighter)
        {
            if (!(isset($this->recruited[$soldier_type->retName()]))) {
                $this->recruited[$soldier_type->retName()] = $soldier_type;
                print("(Factory absorbed a fighter of type " . $soldier_type->retName() . ")" . PHP_EOL);
            }
            else
                print("(Factory already absorbed a fighter of type " . $soldier_type->retName() . ")" . PHP_EOL);
        }
        else {
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        }
    }

    public function fabricate($hey) {
        if (isset($this->recruited[$hey])) {
            print("(Factory fabricates a fighter of type " . $hey . ")" . PHP_EOL);
            return ($this->recruited[$hey]);
        }
        else {
            print("(Factory hasn't absorbed any fighter of type " . $hey .")" . PHP_EOL);
            return (NULL);
        }
    }
}

?>

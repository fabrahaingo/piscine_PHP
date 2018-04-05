<?php

class NightsWatch {
    public function recruit($person) {
        if ($person instanceof IFighter) {
            $this->recruits[] = $person;
        }
    }
    public function fight() {
        foreach ($this->recruits as $elem) {
            $elem->fight();
        }
    }
}

?>

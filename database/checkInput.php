<?php

    function checkInput($input) {
        return preg_replace("/[^a-zA-Z0-9\s]/", '', $input);
    }

?>
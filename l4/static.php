<?php

    function test() {
        static $a = 1;
        $a++;
        return $a;
    }

    echo test();
    echo test();
    echo test();
    echo test();
    echo test();
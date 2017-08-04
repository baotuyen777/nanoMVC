<?php

class Session {

    static function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    static function get($key) {
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    static function destroy() {
        session_destroy();
    }

}

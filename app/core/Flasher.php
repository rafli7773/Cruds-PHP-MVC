<?php

class Flasher
{
    public static function setFlash($pesan)
    {
        $_SESSION['flash'] = [
            "pesan" => $pesan
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="container-alert">
                <div class="alert">
                    <div class="message">
                        <p>' . $_SESSION['flash']['pesan'] . '</p>
                    </div>
                    <div class="close-alert">
                        <button class="btn-close-alert">&times;</button>
                    </div>
                </div>
            </div>
        ';
        }
        unset($_SESSION['flash']);
    }
}

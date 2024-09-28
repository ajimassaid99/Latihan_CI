<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Encryption extends BaseConfig
{
    // In Encryption, you may use
    /**
     * Summary of key
     * @var string
     */
    public $key = 'hex2bin:<your-hex-encoded-key>';
    // or

    // ...
}
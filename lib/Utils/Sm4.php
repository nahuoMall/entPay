<?php

namespace Entpay\Mse\Client\Utils;

class Sm4
{
    private $ck = [
        0x00070E15, 0x1C232A31, 0x383F464D, 0x545B6269,
        0x70777E85, 0x8C939AA1, 0xA8AFB6BD, 0xC4CBD2D9,
        0xE0E7EEF5, 0xFC030A11, 0x181F262D, 0x343B4249,
        0x50575E65, 0x6C737A81, 0x888F969D, 0xA4ABB2B9,
        0xC0C7CED5, 0xDCE3EAF1, 0xF8FF060D, 0x141B2229,
        0x30373E45, 0x4C535A61, 0x686F767D, 0x848B9299,
        0xA0A7AEB5, 0xBCC3CAD1, 0xD8DFE6ED, 0xF4FB0209,
        0x10171E25, 0x2C333A41, 0x484F565D, 0x646B7279,
    ];

    private $Sbox = [
        0xD6, 0x90, 0xE9, 0xFE, 0xCC, 0xE1, 0x3D, 0xB7, 0x16, 0xB6, 0x14, 0xC2, 0x28, 0xFB, 0x2C, 0x05,
        0x2B, 0x67, 0x9A, 0x76, 0x2A, 0xBE, 0x04, 0xC3, 0xAA, 0x44, 0x13, 0x26, 0x49, 0x86, 0x06, 0x99,
        0x9C, 0x42, 0x50, 0xF4, 0x91, 0xEF, 0x98, 0x7A, 0x33, 0x54, 0x0B, 0x43, 0xED, 0xCF, 0xAC, 0x62,
        0xE4, 0xB3, 0x1C, 0xA9, 0xC9, 0x08, 0xE8, 0x95, 0x80, 0xDF, 0x94, 0xFA, 0x75, 0x8F, 0x3F, 0xA6,
        0x47, 0x07, 0xA7, 0xFC, 0xF3, 0x73, 0x17, 0xBA, 0x83, 0x59, 0x3C, 0x19, 0xE6, 0x85, 0x4F, 0xA8,
        0x68, 0x6B, 0x81, 0xB2, 0x71, 0x64, 0xDA, 0x8B, 0xF8, 0xEB, 0x0F, 0x4B, 0x70, 0x56, 0x9D, 0x35,
        0x1E, 0x24, 0x0E, 0x5E, 0x63, 0x58, 0xD1, 0xA2, 0x25, 0x22, 0x7C, 0x3B, 0x01, 0x21, 0x78, 0x87,
        0xD4, 0x00, 0x46, 0x57, 0x9F, 0xD3, 0x27, 0x52, 0x4C, 0x36, 0x02, 0xE7, 0xA0, 0xC4, 0xC8, 0x9E,
        0xEA, 0xBF, 0x8A, 0xD2, 0x40, 0xC7, 0x38, 0xB5, 0xA3, 0xF7, 0xF2, 0xCE, 0xF9, 0x61, 0x15, 0xA1,
        0xE0, 0xAE, 0x5D, 0xA4, 0x9B, 0x34, 0x1A, 0x55, 0xAD, 0x93, 0x32, 0x30, 0xF5, 0x8C, 0xB1, 0xE3,
        0x1D, 0xF6, 0xE2, 0x2E, 0x82, 0x66, 0xCA, 0x60, 0xC0, 0x29, 0x23, 0xAB, 0x0D, 0x53, 0x4E, 0x6F,
        0xD5, 0xDB, 0x37, 0x45, 0xDE, 0xFD, 0x8E, 0x2F, 0x03, 0xFF, 0x6A, 0x72, 0x6D, 0x6C, 0x5B, 0x51,
        0x8D, 0x1B, 0xAF, 0x92, 0xBB, 0xDD, 0xBC, 0x7F, 0x11, 0xD9, 0x5C, 0x41, 0x1F, 0x10, 0x5A, 0xD8,
        0x0A, 0xC1, 0x31, 0x88, 0xA5, 0xCD, 0x7B, 0xBD, 0x2D, 0x74, 0xD0, 0x12, 0xB8, 0xE5, 0xB4, 0xB0,
        0x89, 0x69, 0x97, 0x4A, 0x0C, 0x96, 0x77, 0x7E, 0x65, 0xB9, 0xF1, 0x09, 0xC5, 0x6E, 0xC6, 0x84,
        0x18, 0xF0, 0x7D, 0xEC, 0x3A, 0xDC, 0x4D, 0x20, 0x79, 0xEE, 0x5F, 0x3E, 0xD7, 0xCB, 0x39, 0x48,
    ];

    private $fk = [0xA3B1BAC6, 0x56AA3350, 0x677D9197, 0xB27022DC];

    private $rk = [];

    private $len = 16;

    /**
     * Sm4 constructor.
     * @param  string     $key 秘钥长度16位
     * @param  string     $b   不是16的倍数 需要的补码
     * @throws \Exception
     */
    public function __construct($key, $b = ' ')
    {
        $this->ck16($key);
        $this->crk($key);
    }

    private function dd(&$data)
    {
        $n    = $this->len - strlen($data) % $this->len;
        $data = $data . str_repeat(chr($n), $n);
    }

    private function unpad($data)
    {
        $len = strlen($data);
        $rem = $data[$len - 1];

        return substr($data, 0, $len - ord($rem));
    }

    private function ck16($str)
    {
        if (strlen($str) !== $this->len) {
            throw new \Exception('秘钥长度为16位');
        }
    }

    /**
     * @param string $str 加密字符串
     * @param string $iv  初始化字符串16位
     * @return string
     * @throws \Exception
     */
    public function enDataCbc($str, $iv)
    {
        $this->ck16($iv);
        $r = '';
        $this->dd($str);
        $l = strlen($str) / $this->len;
        for ($i = 0; $i < $l; ++$i) {
            $s  = substr($str, $i * $this->len, $this->len);
            $s  = $iv ^ $s;
            $tr = [];
            $this->encode(array_values(unpack('N*', $s)), $tr);
            $iv = pack('N*', ...$tr);
            $r .= $iv;
        }

        return $r;
    }

    /**
     * @param string $str 加密字符串
     * @param string $iv  初始化字符串16位
     * @return string
     * @throws \Exception
     */
    public function deDataCbc($str, $iv)
    {
        $this->ck16($iv);
        $r = '';
        $l = strlen($str) / $this->len;
        for ($i = 0; $i < $l; ++$i) {
            $s  = substr($str, $i * $this->len, $this->len);
            $tr = [];
            $this->decode(array_values(unpack('N*', $s)), $tr);
            $s1 = pack('N*', ...$tr);
            $s1 = $iv ^ $s1;
            $iv = $s;
            $r .= $s1;
        }

        return $this->unpad($r);
    }

    private function encode($ar, &$r)
    {
        for ($i = 0; $i < 32; ++$i) {
            $ar[$i + 4] = $this->f($ar[$i], $ar[$i + 1], $ar[$i + 2], $ar[$i + 3], $this->rk[$i]);
        }
        $r[] = $ar[35];
        $r[] = $ar[34];
        $r[] = $ar[33];
        $r[] = $ar[32];
    }

    private function decode($ar, &$r)
    {
        for ($i = 0; $i < 32; ++$i) {
            $ar[$i + 4] = $this->f($ar[$i], $ar[$i + 1], $ar[$i + 2], $ar[$i + 3], $this->rk[31 - $i]);
        }
        $r[] = $ar[35];
        $r[] = $ar[34];
        $r[] = $ar[33];
        $r[] = $ar[32];
    }

    private function crk($key)
    {
        $keys = array_values(unpack('N*', $key));
        $keys = [
            $keys[0] ^ $this->fk[0],
            $keys[1] ^ $this->fk[1],
            $keys[2] ^ $this->fk[2],
            $keys[3] ^ $this->fk[3],
        ];
        for ($i = 0; $i < 32; ++$i) {
            $this->rk[] = $keys[] = $keys[$i] ^ $this->t1($keys[$i + 1] ^ $keys[$i + 2] ^ $keys[$i + 3] ^ $this->ck[$i]);
        }
    }

    private function lm($a, $n)
    {
        return $a >> (32 - $n) | (($a << $n) & 0xFFFFFFFF);
    }

    private function f($x0, $x1, $x2, $x3, $r)
    {
        return $x0 ^ $this->t($x1 ^ $x2 ^ $x3 ^ $r);
    }

    private function s($n)
    {
        return $this->Sbox[($n & 0xFF)] | $this->Sbox[(($n >> 8) & 0xFF)] << 8 | $this->Sbox[(($n >> 16) & 0xFF)] << 16 | $this->Sbox[(($n >> 24) & 0xFF)] << 24;
    }

    private function t($n)
    {
        $b = $this->s($n);

        return $b ^ $this->lm($b, 2) ^ $this->lm($b, 10) ^ $this->lm($b, 18) ^ $this->lm($b, 24);
    }

    private function t1($n)
    {
        $b = $this->s($n);

        return $b ^ $this->lm($b, 13) ^ $this->lm($b, 23);
    }
}

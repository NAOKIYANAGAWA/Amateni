<?php
namespace model;

use lib\Msg;

class UserModel extends AbstractModel
{
    public string $email;
    public string $pwd;
    public string $nickname;
    public int $level;

    protected static $SESSION_NAME = '_user';

    public function init_params()
    {
        $this->id = 0;
        $this->nickname = '';
        $this->level = 0;
    }

    public static function set_params($target, $params)
    {
        foreach ($target as $key1 => $value1) {
            foreach ($params as $key2 => $value2) {
                if ($key1 == $key2) {
                    $target->$key1 = $value2;
                }
            }
        }

        return $target;
    }

    public function isValidEmail()
    {
        return static::validateEmail($this->email);
    }

    public static function validateEmail($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, 'Emailを入力してください。');
            $res = false;
        } else {
            if (strlen($val) > 50) {
                Msg::push(Msg::ERROR, 'Emailは50文字以下で入力してください。');
                $res = false;
            }

            $pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)*$/";
            if (preg_match($pattern, $val)) {
                Msg::push(Msg::ERROR, 'Emailの形式で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidPwd()
    {
        return static::validatePwd($this->pwd);
    }

    public static function validatePwd($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, 'パスワードを入力してください。');
            $res = false;
        } else {
            if (strlen($val) < 4) {
                Msg::push(Msg::ERROR, 'パスワードは４桁以上で入力してください。');
                $res = false;
            }

            if (!is_alnum($val)) {
                Msg::push(Msg::ERROR, 'パスワードは半角英数字で入力してください。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidNickname()
    {
        return static::validateNickname($this->nickname);
    }

    public static function validateNickname($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, 'ニックネームを入力してください。');
            $res = false;
        } else {
            if (mb_strlen($val) > 20) {
                Msg::push(Msg::ERROR, 'ニックネームは20文字以下で入力してください。');
                $res = false;
            }
        }

        return $res;
    }
}

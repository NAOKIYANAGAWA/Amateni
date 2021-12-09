<?php
class StaticList
{
    const PREFECTURE_DEFAULT = 0;
    const PREFECTURE_HOKKAIDO = 1;
    const PREFECTURE_AOMORI = 2;
    const PREFECTURE_IWATE = 3;
    const PREFECTURE_MIYAGI = 4;
    const PREFECTURE_AKITA = 5;
    const PREFECTURE_YAMAGATA = 6;
    const PREFECTURE_FUKUSHIMA = 7;
    const PREFECTURE_IBARAKI = 8;
    const PREFECTURE_TOCHIGI = 9;
    const PREFECTURE_GUNMA = 10;
    const PREFECTURE_SAITAMA = 11;
    const PREFECTURE_CHIBA = 12;
    const PREFECTURE_TOKYO = 13;
    const PREFECTURE_KANAGAWA = 14;
    const PREFECTURE_NIIGATA = 15;
    const PREFECTURE_TOYAMA = 16;
    const PREFECTURE_ISHIKAWA = 17;
    const PREFECTURE_FUKUI = 18;
    const PREFECTURE_YAMANASHI = 19;
    const PREFECTURE_NAGANO = 20;
    const PREFECTURE_GIFU = 21;
    const PREFECTURE_SHIZUOKA = 22;
    const PREFECTURE_AICHI = 23;
    const PREFECTURE_MIE = 24;
    const PREFECTURE_SHIGA = 25;
    const PREFECTURE_KYOTO = 26;
    const PREFECTURE_OSAKA = 27;
    const PREFECTURE_HYOGO = 28;
    const PREFECTURE_NARA = 29;
    const PREFECTURE_WAKAYAMA = 30;
    const PREFECTURE_TOTTORI = 31;
    const PREFECTURE_SHIMANE = 32;
    const PREFECTURE_OKAWAMA = 33;
    const PREFECTURE_HIROSHIMA = 34;
    const PREFECTURE_YAMAGUCHI = 35;
    const PREFECTURE_TOKUSHIMA = 36;
    const PREFECTURE_KAGAWA = 37;
    const PREFECTURE_EHIME = 38;
    const PREFECTURE_KOCHI = 39;
    const PREFECTURE_FUKUOKA = 40;
    const PREFECTURE_SAGA = 41;
    const PREFECTURE_NAGASAKI = 42;
    const PREFECTURE_KUMAMOTO = 43;
    const PREFECTURE_OITA = 44;
    const PREFECTURE_MIYAZAKI = 45;
    const PREFECTURE_KAGOSHIMA = 46;
    const PREFECTURE_OKINAWA = 47;
    const PREFECTURE_FOREIGN = 48;

    public static $prefecture = array(
        self::PREFECTURE_DEFAULT => null,
        self::PREFECTURE_HOKKAIDO => '北海道',
        self::PREFECTURE_AOMORI => '青森県',
        self::PREFECTURE_IWATE => '岩手県',
        self::PREFECTURE_MIYAGI => '宮城県',
        self::PREFECTURE_AKITA => '秋田県',
        self::PREFECTURE_YAMAGATA => '山形県',
        self::PREFECTURE_FUKUSHIMA => '福島県',
        self::PREFECTURE_IBARAKI => '茨城県',
        self::PREFECTURE_TOCHIGI => '栃木県',
        self::PREFECTURE_GUNMA => '群馬県',
        self::PREFECTURE_SAITAMA => '埼玉県',
        self::PREFECTURE_CHIBA => '千葉県',
        self::PREFECTURE_TOKYO => '東京都',
        self::PREFECTURE_KANAGAWA => '神奈川県',
        self::PREFECTURE_NIIGATA => '新潟県',
        self::PREFECTURE_TOYAMA => '富山県',
        self::PREFECTURE_ISHIKAWA => '石川県',
        self::PREFECTURE_FUKUI => '福井県',
        self::PREFECTURE_YAMANASHI => '山梨県',
        self::PREFECTURE_NAGANO => '長野県',
        self::PREFECTURE_GIFU => '岐阜県',
        self::PREFECTURE_SHIZUOKA => '静岡県',
        self::PREFECTURE_AICHI => '愛知県',
        self::PREFECTURE_MIE => '三重県',
        self::PREFECTURE_SHIGA => '滋賀県',
        self::PREFECTURE_KYOTO => '京都府',
        self::PREFECTURE_OSAKA => '大阪府',
        self::PREFECTURE_HYOGO => '兵庫県',
        self::PREFECTURE_NARA => '奈良県',
        self::PREFECTURE_WAKAYAMA => '和歌山県',
        self::PREFECTURE_TOTTORI => '鳥取県',
        self::PREFECTURE_SHIMANE => '島根県',
        self::PREFECTURE_OKAWAMA => '岡山県',
        self::PREFECTURE_HIROSHIMA => '広島県',
        self::PREFECTURE_YAMAGUCHI => '山口県',
        self::PREFECTURE_TOKUSHIMA => '徳島県',
        self::PREFECTURE_KAGAWA => '香川県',
        self::PREFECTURE_EHIME => '愛媛県',
        self::PREFECTURE_KOCHI => '高知県',
        self::PREFECTURE_FUKUOKA => '福岡県',
        self::PREFECTURE_SAGA => '佐賀県',
        self::PREFECTURE_NAGASAKI => '長崎県',
        self::PREFECTURE_KUMAMOTO => '熊本県',
        self::PREFECTURE_OITA => '大分県',
        self::PREFECTURE_MIYAZAKI => '宮崎県',
        self::PREFECTURE_KAGOSHIMA => '鹿児島県',
        self::PREFECTURE_OKINAWA => '沖縄県',
        self::PREFECTURE_FOREIGN => '日本国外',
    );

    const USRE_LEVEL_UNSELECTED = 0;
    const USRE_LEVEL_ONE = 1;
    const USRE_LEVEL_TWO = 2;
    const USRE_LEVEL_THREE = 3;
    const USRE_LEVEL_FOUR = 4;
    const USRE_LEVEL_FIVE = 5;
    const USRE_LEVEL_SIX = 6;
    const USRE_LEVEL_SEVEM = 7;
    const USRE_LEVEL_EIGHT = 8;
    const USRE_LEVEL_NINE = 9;
    const USRE_LEVEL_TEN = 10;

    public static $user_level = array(
        self::USRE_LEVEL_UNSELECTED => '未選択',
        self::USRE_LEVEL_ONE => 1,
        self::USRE_LEVEL_TWO => 2,
        self::USRE_LEVEL_THREE => 3,
        self::USRE_LEVEL_FOUR => 4,
        self::USRE_LEVEL_FIVE => 5,
        self::USRE_LEVEL_SIX => 6,
        self::USRE_LEVEL_SEVEM => 7,
        self::USRE_LEVEL_EIGHT => 8,
        self::USRE_LEVEL_NINE => 9,
        self::USRE_LEVEL_TEN => 10,
    );

    const MATCH_TYPE_UNSELECTED = 0;
    const MATCH_TYPE_1SET = 1;
    const MATCH_TYPE_3SET = 3;
    const MATCH_TYPE_5SET = 5;

    public static $match_type = array(
        self::MATCH_TYPE_UNSELECTED => '未選択',
        self::MATCH_TYPE_1SET => '１セットマッチ',
        self::MATCH_TYPE_3SET => '３セットマッチ',
        self::MATCH_TYPE_5SET => '５セットマッチ',
    );

    const WIN_FLG_UNSELECTED = 0;
    const WIN_FLG_WIN = 1;
    const WIN_FLG_LOSE = 2;

    public static $win_flg = array(
        self::WIN_FLG_UNSELECTED => '未選択',
        self::WIN_FLG_WIN => '勝利',
        self::WIN_FLG_LOSE => '敗戦',
    );

    const SET_POINT_USER_UNSELECTED = 0;
    const SET_POINT_USER_ONE = 1;
    const SET_POINT_USER_TWO = 2;
    const SET_POINT_USER_THREE = 3;

    public static $set_point_user = array(
        self::SET_POINT_USER_UNSELECTED => '0',
        self::SET_POINT_USER_ONE => '1',
        self::SET_POINT_USER_TWO => '2',
        self::SET_POINT_USER_THREE => '3',
    );

    const SET_POINT_OPPONENT_UNSELECTED = 0;
    const SET_POINT_OPPONENT_ONE = 1;
    const SET_POINT_OPPONENT_TWO = 2;
    const SET_POINT_OPPONENT_THREE = 3;

    public static $set_point_opponent = array(
        self::SET_POINT_OPPONENT_UNSELECTED => '0',
        self::SET_POINT_OPPONENT_ONE => '1',
        self::SET_POINT_OPPONENT_TWO => '2',
        self::SET_POINT_OPPONENT_THREE => '3',
    );

    const FIRST_SET_GAME_POINT_USER_UNSELECTED = 0;
    const FIRST_SET_GAME_POINT_USER_ONE = 1;
    const FIRST_SET_GAME_POINT_USER_TWO = 2;
    const FIRST_SET_GAME_POINT_USER_THREE = 3;
    const FIRST_SET_GAME_POINT_USER_FOUR = 4;
    const FIRST_SET_GAME_POINT_USER_FIVE = 5;
    const FIRST_SET_GAME_POINT_USER_SIX = 6;
    const FIRST_SET_GAME_POINT_USER_SEVENTH = 7;

    public static $first_set_game_point_user = array(
        self::FIRST_SET_GAME_POINT_USER_UNSELECTED => '0',
        self::FIRST_SET_GAME_POINT_USER_ONE => '1',
        self::FIRST_SET_GAME_POINT_USER_TWO => '2',
        self::FIRST_SET_GAME_POINT_USER_THREE => '3',
        self::FIRST_SET_GAME_POINT_USER_FOUR => '4',
        self::FIRST_SET_GAME_POINT_USER_FIVE => '5',
        self::FIRST_SET_GAME_POINT_USER_SIX => '6',
        self::FIRST_SET_GAME_POINT_USER_SEVENTH => '7',
    );

    const FIRST_SET_GAME_POINT_OPPONENT_UNSELECTED = 0;
    const FIRST_SET_GAME_POINT_OPPONENT_ONE = 1;
    const FIRST_SET_GAME_POINT_OPPONENT_TWO = 2;
    const FIRST_SET_GAME_POINT_OPPONENT_THREE = 3;
    const FIRST_SET_GAME_POINT_OPPONENT_FOUR = 4;
    const FIRST_SET_GAME_POINT_OPPONENT_FIVE = 5;
    const FIRST_SET_GAME_POINT_OPPONENT_SIX = 6;
    const FIRST_SET_GAME_POINT_OPPONENT_SEVENTH = 7;

    public static $first_set_game_point_opponent = array(
        self::FIRST_SET_GAME_POINT_OPPONENT_UNSELECTED => '0',
        self::FIRST_SET_GAME_POINT_OPPONENT_ONE => '1',
        self::FIRST_SET_GAME_POINT_OPPONENT_TWO => '2',
        self::FIRST_SET_GAME_POINT_OPPONENT_THREE => '3',
        self::FIRST_SET_GAME_POINT_OPPONENT_FOUR => '4',
        self::FIRST_SET_GAME_POINT_OPPONENT_FIVE => '5',
        self::FIRST_SET_GAME_POINT_OPPONENT_SIX => '6',
        self::FIRST_SET_GAME_POINT_OPPONENT_SEVENTH => '7',
    );

    const SECOND_SET_GAME_POINT_USER_UNSELECTED = 0;
    const SECOND_SET_GAME_POINT_USER_ONE = 1;
    const SECOND_SET_GAME_POINT_USER_TWO = 2;
    const SECOND_SET_GAME_POINT_USER_THREE = 3;
    const SECOND_SET_GAME_POINT_USER_FOUR = 4;
    const SECOND_SET_GAME_POINT_USER_FIVE = 5;
    const SECOND_SET_GAME_POINT_USER_SIX = 6;
    const SECOND_SET_GAME_POINT_USER_SEVENTH = 7;

    public static $second_set_game_point_user = array(
        self::SECOND_SET_GAME_POINT_USER_UNSELECTED => '0',
        self::SECOND_SET_GAME_POINT_USER_ONE => '1',
        self::SECOND_SET_GAME_POINT_USER_TWO => '2',
        self::SECOND_SET_GAME_POINT_USER_THREE => '3',
        self::SECOND_SET_GAME_POINT_USER_FOUR => '4',
        self::SECOND_SET_GAME_POINT_USER_FIVE => '5',
        self::SECOND_SET_GAME_POINT_USER_SIX => '6',
        self::SECOND_SET_GAME_POINT_USER_SEVENTH => '7',
    );

    const SECOND_SET_GAME_POINT_OPPONENT_UNSELECTED = 0;
    const SECOND_SET_GAME_POINT_OPPONENT_ONE = 1;
    const SECOND_SET_GAME_POINT_OPPONENT_TWO = 2;
    const SECOND_SET_GAME_POINT_OPPONENT_THREE = 3;
    const SECOND_SET_GAME_POINT_OPPONENT_FOUR = 4;
    const SECOND_SET_GAME_POINT_OPPONENT_FIVE = 5;
    const SECOND_SET_GAME_POINT_OPPONENT_SIX = 6;
    const SECOND_SET_GAME_POINT_OPPONENT_SEVENTH = 7;

    public static $second_set_game_point_opponent = array(
        self::SECOND_SET_GAME_POINT_OPPONENT_UNSELECTED => '0',
        self::SECOND_SET_GAME_POINT_OPPONENT_ONE => '1',
        self::SECOND_SET_GAME_POINT_OPPONENT_TWO => '2',
        self::SECOND_SET_GAME_POINT_OPPONENT_THREE => '3',
        self::SECOND_SET_GAME_POINT_OPPONENT_FOUR => '4',
        self::SECOND_SET_GAME_POINT_OPPONENT_FIVE => '5',
        self::SECOND_SET_GAME_POINT_OPPONENT_SIX => '6',
        self::SECOND_SET_GAME_POINT_OPPONENT_SEVENTH => '7',
    );

    const THIRD_SET_GAME_POINT_USER_UNSELECTED = 0;
    const THIRD_SET_GAME_POINT_USER_ONE = 1;
    const THIRD_SET_GAME_POINT_USER_TWO = 2;
    const THIRD_SET_GAME_POINT_USER_THREE = 3;
    const THIRD_SET_GAME_POINT_USER_FOUR = 4;
    const THIRD_SET_GAME_POINT_USER_FIVE = 5;
    const THIRD_SET_GAME_POINT_USER_SIX = 6;
    const THIRD_SET_GAME_POINT_USER_SEVENTH = 7;

    public static $third_set_game_point_user = array(
        self::THIRD_SET_GAME_POINT_USER_UNSELECTED => '0',
        self::THIRD_SET_GAME_POINT_USER_ONE => '1',
        self::THIRD_SET_GAME_POINT_USER_TWO => '2',
        self::THIRD_SET_GAME_POINT_USER_THREE => '3',
        self::THIRD_SET_GAME_POINT_USER_FOUR => '4',
        self::THIRD_SET_GAME_POINT_USER_FIVE => '5',
        self::THIRD_SET_GAME_POINT_USER_SIX => '6',
        self::THIRD_SET_GAME_POINT_USER_SEVENTH => '7',
    );

    const THIRD_SET_GAME_POINT_OPPONENT_UNSELECTED = 0;
    const THIRD_SET_GAME_POINT_OPPONENT_ONE = 1;
    const THIRD_SET_GAME_POINT_OPPONENT_TWO = 2;
    const THIRD_SET_GAME_POINT_OPPONENT_THREE = 3;
    const THIRD_SET_GAME_POINT_OPPONENT_FOUR = 4;
    const THIRD_SET_GAME_POINT_OPPONENT_FIVE = 5;
    const THIRD_SET_GAME_POINT_OPPONENT_SIX = 6;
    const THIRD_SET_GAME_POINT_OPPONENT_SEVENTH = 7;

    public static $third_set_game_point_opponent = array(
        self::THIRD_SET_GAME_POINT_OPPONENT_UNSELECTED => '0',
        self::THIRD_SET_GAME_POINT_OPPONENT_ONE => '1',
        self::THIRD_SET_GAME_POINT_OPPONENT_TWO => '2',
        self::THIRD_SET_GAME_POINT_OPPONENT_THREE => '3',
        self::THIRD_SET_GAME_POINT_OPPONENT_FOUR => '4',
        self::THIRD_SET_GAME_POINT_OPPONENT_FIVE => '5',
        self::THIRD_SET_GAME_POINT_OPPONENT_SIX => '6',
        self::THIRD_SET_GAME_POINT_OPPONENT_SEVENTH => '7',
    );

    const FOURTH_SET_GAME_POINT_USER_UNSELECTED = 0;
    const FOURTH_SET_GAME_POINT_USER_ONE = 1;
    const FOURTH_SET_GAME_POINT_USER_TWO = 2;
    const FOURTH_SET_GAME_POINT_USER_THREE = 3;
    const FOURTH_SET_GAME_POINT_USER_FOUR = 4;
    const FOURTH_SET_GAME_POINT_USER_FIVE = 5;
    const FOURTH_SET_GAME_POINT_USER_SIX = 6;
    const FOURTH_SET_GAME_POINT_USER_SEVENTH = 7;

    public static $fourth_set_game_point_user = array(
        self::FOURTH_SET_GAME_POINT_USER_UNSELECTED => '0',
        self::FOURTH_SET_GAME_POINT_USER_ONE => '1',
        self::FOURTH_SET_GAME_POINT_USER_TWO => '2',
        self::FOURTH_SET_GAME_POINT_USER_THREE => '3',
        self::FOURTH_SET_GAME_POINT_USER_FOUR => '4',
        self::FOURTH_SET_GAME_POINT_USER_FIVE => '5',
        self::FOURTH_SET_GAME_POINT_USER_SIX => '6',
        self::FOURTH_SET_GAME_POINT_USER_SEVENTH => '7',
    );

    const FOURTH_SET_GAME_POINT_OPPONENT_UNSELECTED = 0;
    const FOURTH_SET_GAME_POINT_OPPONENT_ONE = 1;
    const FOURTH_SET_GAME_POINT_OPPONENT_TWO = 2;
    const FOURTH_SET_GAME_POINT_OPPONENT_THREE = 3;
    const FOURTH_SET_GAME_POINT_OPPONENT_FOUR = 4;
    const FOURTH_SET_GAME_POINT_OPPONENT_FIVE = 5;
    const FOURTH_SET_GAME_POINT_OPPONENT_SIX = 6;
    const FOURTH_SET_GAME_POINT_OPPONENT_SEVENTH = 7;

    public static $fourth_set_game_point_opponent = array(
        self::FOURTH_SET_GAME_POINT_OPPONENT_UNSELECTED => '0',
        self::FOURTH_SET_GAME_POINT_OPPONENT_ONE => '1',
        self::FOURTH_SET_GAME_POINT_OPPONENT_TWO => '2',
        self::FOURTH_SET_GAME_POINT_OPPONENT_THREE => '3',
        self::FOURTH_SET_GAME_POINT_OPPONENT_FOUR => '4',
        self::FOURTH_SET_GAME_POINT_OPPONENT_FIVE => '5',
        self::FOURTH_SET_GAME_POINT_OPPONENT_SIX => '6',
        self::FOURTH_SET_GAME_POINT_OPPONENT_SEVENTH => '7',
    );

    const FIFTH_SET_GAME_POINT_USER_UNSELECTED = 0;
    const FIFTH_SET_GAME_POINT_USER_ONE = 1;
    const FIFTH_SET_GAME_POINT_USER_TWO = 2;
    const FIFTH_SET_GAME_POINT_USER_THREE = 3;
    const FIFTH_SET_GAME_POINT_USER_FOUR = 4;
    const FIFTH_SET_GAME_POINT_USER_FIVE = 5;
    const FIFTH_SET_GAME_POINT_USER_SIX = 6;
    const FIFTH_SET_GAME_POINT_USER_SEVENTH = 7;

    public static $fifth_set_game_point_user = array(
        self::FIFTH_SET_GAME_POINT_USER_UNSELECTED => '0',
        self::FIFTH_SET_GAME_POINT_USER_ONE => '1',
        self::FIFTH_SET_GAME_POINT_USER_TWO => '2',
        self::FIFTH_SET_GAME_POINT_USER_THREE => '3',
        self::FIFTH_SET_GAME_POINT_USER_FOUR => '4',
        self::FIFTH_SET_GAME_POINT_USER_FIVE => '5',
        self::FIFTH_SET_GAME_POINT_USER_SIX => '6',
        self::FIFTH_SET_GAME_POINT_USER_SEVENTH => '7',
    );

    const FIFTH_SET_GAME_POINT_OPPONENT_UNSELECTED = 0;
    const FIFTH_SET_GAME_POINT_OPPONENT_ONE = 1;
    const FIFTH_SET_GAME_POINT_OPPONENT_TWO = 2;
    const FIFTH_SET_GAME_POINT_OPPONENT_THREE = 3;
    const FIFTH_SET_GAME_POINT_OPPONENT_FOUR = 4;
    const FIFTH_SET_GAME_POINT_OPPONENT_FIVE = 5;
    const FIFTH_SET_GAME_POINT_OPPONENT_SIX = 6;
    const FIFTH_SET_GAME_POINT_OPPONENT_SEVENTH = 7;

    public static $fifth_set_game_point_opponent = array(
        self::FIFTH_SET_GAME_POINT_OPPONENT_UNSELECTED => '0',
        self::FIFTH_SET_GAME_POINT_OPPONENT_ONE => '1',
        self::FIFTH_SET_GAME_POINT_OPPONENT_TWO => '2',
        self::FIFTH_SET_GAME_POINT_OPPONENT_THREE => '3',
        self::FIFTH_SET_GAME_POINT_OPPONENT_FOUR => '4',
        self::FIFTH_SET_GAME_POINT_OPPONENT_FIVE => '5',
        self::FIFTH_SET_GAME_POINT_OPPONENT_SIX => '6',
        self::FIFTH_SET_GAME_POINT_OPPONENT_SEVENTH => '7',
    );
}

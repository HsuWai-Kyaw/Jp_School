<?php
require "server/db.php";

$nrcDataList = [
    1 => [
        'BhaMaNa',
        'PaMaNa',
        'AhTaNa',
        'MaTaNa',
        'KhaPhaNa',
        'TaNaNa',
        'PhaKaNa',
        'KaMaNa',
        'KhaLaPha',
        'MaKhaBa',
        'MaSaNa',
        'MaKaTa',
        'MaNyaNa',
        'HaPaNa',
        'MaKaTha',
        'MaMaNa',
        'MaKaNa',
        'SaKaNa',
        'KaMaTa',
        'SaBaTa',
        'MaGaDa',
        'AhGaYa',
        'NaMaNa',
        'PaTaAh',
        'YaKaNa',
        'SaBaNa',
        'SaLaNa',
        'WaMaNa',
    ],
    [
        'BaLaKha',
        'DaMaSa',
        'SaSaNa',
        'PhaSaNa',
        'HtaTaPa',
        'KhaSaNa',
        'PhaLaSa',
        'PhaYaSa',
        'LaKaNa',
        'MaYaMa',
        'MaSaNa',
        'YaTaNa',
    ],
    [
        'LaBaNa',
        'PaKaNa',
        'YaYaTha',
        'PhaAhNa',
        'BaAhNa',
        'PhaPaNa',
        'KaMaMa',
        'KaKaYa',
        'KaDaNa',
        'KaSaKa',
        'MaWaTa',
        'SaKaLa',
        'MaSaLa',
        'KaTaKha',
        'WaLaMa',
        'BaGaLa',
        'LaThaNa',
        'ThaTaNa',
        'ThaTaKa',
    ],
    [
        'PhaLaNa',
        'HaKhaNa',
        'KaPaLa',
        'MaTaPa',
        'MaTaNa',
        'PaLaWa',
        'TaTaNa',
        'HtaTaLa',
        'TaZaNa',
    ],
    [
        'AhYaTa',
        'BhaMaNa',
        'BaTaLa',
        'KhaAuNa',
        'KhaTaNa',
        'HaMaLa',
        'AhTaNa',
        'KaLaNa',
        'KaLaHta',
        'KaLaWa',
        'KaBaLa',
        'AhHtaNa',
        'KaNaNa',
        'KaThaNa',
        'KaLaTa',
        'KaSaLa',
        'HtaPaKha',
        'LaHaNa',
        'LaYaNa',
        'MaPaLa',
        'SaMaYa',
        'MaLaNa',
        'MaKaNa',
        'MaYaNa',
        'MaMaNa',
        'DaHaNa',
        'NaYaNa',
        'PaSaNa',
        'PaLaNa',
        'PhaPaNa',
        'PaLaBa',
        'SaKaNa',
        'SaLaKa',
        'KaMaNa',
        'YaBaNa',
        'DaPaYa',
        'TaMaNa',
        'MaThaNa',
        'TaSaNa',
        'HtaKhaNa',
        'KaLaTha',
        'NgaSaNa',
        'TaAuNa',
        'DaKaNa',
        'AhMaZa',
        'WaLaNa',
        'WaThaNa',
        'YaAuNa',
        'YaMaPa',
        'MaMaTa',
        'KhaAuTa',
    ],
    [
        'BaPaNa',
        'HtaWaNa',
        'AhMaYa',
        'KaYaYa',
        'KaPaNa',
        'KaThaMa',
        'HaThaTa',
        'KhaMaKa',
        'MaMaLa',
        'KaThaNa',
        'KaSaNa',
        'MaAaNa',
        'LaLaNa',
        'MaMaNa',
        'MaAhYa',
        'PaLaNa',
        'TaThaya',
        'ThaYaKha',
        'YaPhaNa',
    ],
    [
        'PaKhaNa',
        'MaWaTa',
        'DaAuNa',
        'KaPaKa',
        'HtaTaPa',
        'KaWaNa',
        'KaKaNa',
        'KaTaKha',
        'KaTaNa',
        'LaPaTa',
        'MaLaNa',
        'MaNyaNa',
        'NaTaLa',
        'NyaLaPa',
        'AhPhaNa',
        'AhTaNa',
        'PaTaNa',
        'PaKhaTa',
        'PaTaTa',
        'PhaMaNa',
        'PaSaTa',
        'PaMaNa',
        'YaTaNa',
        'YaKaNa',
        'TaNgaNa',
        'ThaNaPa',
        'ThaWaTa',
        'ThaKaNa',
        'WaMaNa',
        'YaTaYa',
        'ZaKaNa',
        'PaKhaNa',
    ],
    [
        'AhLaNa',
        'MaHtaNa',
        'KhaMaNa',
        'BaKaLa',
        'GaGaNa',
        'KaMaNa',
        'MaKaNa',
        'MaBaNa',
        'MaTaNa',
        'MaLaNa',
        'MaMaNa',
        'MaThaNa',
        'NaMaNa',
        'NgaPhaNa',
        'PaKhaKa',
        'PaMaNa',
        'PaPhaNa',
        'SaLaNa',
        'KaHtaNa',
        'SaMaNa',
        'SaPhaNa',
        'SaTaYa',
        'SaPaWa',
        'MaYaSa',
        'MaGaDa',
        'MaHtaLa',
        'TaTaKa',
        'ThaYaNa',
        'HtaLaNa',
        'YaNaKha',
        'YaSaKa',
    ],
    [
        'AhMaYa',
        'KhaMaSa',
        'KhaMaKha',
        'AhYaTa',
        'ThaTaYa',
        'KhaMaZa',
        'NaNaMa',
        'PaKhaMa',
        'KaMaNa',
        'AhMaZa',
        'MaNaMa',
        'KhaAhZa',
        'KhaMaTha',
        'KaPaTa',
        'KhaMaNa',
        'KaSaNa',
        'NaTaKa',
        'SaKaTa',
        'MaSaNa',
        'LaKaNa',
        'YaAuNa',
        'MaYaTa',
        'MaTaNa',
        'MaTaYa',
        'MaHaMa',
        'MaLaNa',
        'MaHtaLa',
        'MaKaNa',
        'MaKhaNa',
        'MaThaNa',
        'NaMaNa',
        'MaTaLa',
        'NaHtaKa',
        'NgaZaNa',
        'NyaAuNa',
        'AhKhaNa',
        'PaThaKa',
        'PaBaNa',
        'PaKaKha',
        'AhMaBa',
        'AhSaNa',
        'KhaMaMa',
        'MaKaKha',
        'MaNaTa',
        'MaYaMa',
        'PaKhaKa',
        'ThaWaNa',
        'PaAuLa',
        'MaMaNa',
        'SaKaNa',
        'TaTaAu',
        'TaThaNa',
        'ThaPaKa',
        'ThaSaNa',
        'WaTaNa',
        'YaMaTha',
        'DaKhaTha',
        'LaWaNa',
        'AuTaTha',
        'PaBaTha',
        'PaMaNa',
        'TaKaNa',
        'ZaBaTha',
        'ZaYaTha',
        'NgaThaYa',
    ],
    [
        'BaLaNa',
        'KhaSaNa',
        'KaMaYa',
        'BaAhNa',
        'KaHtaNa',
        'HtarHtaNa',
        'KaMaLa',
        'PhaPaNa',
        'MaSaNa',
        'MaLaMa',
        'MaDaNa',
        'PaMaNa',
        'ThaPhaYa',
        'ThaHtaNa',
        'KhaZaNa',
        'LaMaNa',
        'YaMaNa',
    ],
    [
        'AhMaNa',
        'BaThaTa',
        'GaMaNa',
        'KaTaLa',
        'KaPhaNa',
        'KaTaNa',
        'MaMaNa',
        'MaTaNa',
        'TaPaWa',
        'MaAuNu',
        'MaPaNa',
        'PaTaNa',
        'PaNaTa',
        'PaNaKa',
        'YaBhaNa',
        'YaThaTa',
        'YaTaNa',
        'MaPaTa',
        'YaTaTha',
        'LaMaTa',
        'SaTaNa',
        'ThaTaNa',
        'MaAhNa',
        'TaKaNa',
    ],
    [
        'AhLaNa',
        'BhaHaNa',
        'BhaTaHta',
        'KaKaKa',
        'DaGaNa',
        'DaDaSa',
        'DaLaNa',
        'DaPaNa',
        'DaGaYa',
        'LaMaNa',
        'LaThaYa',
        'LaKaNa',
        'MaBaNa',
        'HtaTaPa',
        'AhSaNa',
        'KaMaya',
        'SaKaKha',
        'KaMaNa',
        'KhaYaNa',
        'KaKhaKa',
        'KaTaTa',
        'KaTaNa',
        'KaMaTa',
        'LaMaTa',
        'LaThaNa',
        'MaYaKa',
        'MaGaDa',
        'MaGaTa',
        'DaGaMa',
        'MaAuKa',
        'AuKaMa',
        'PaBaTa',
        'PaZaTa',
        'SaKhaNa',
        'SaKaNa',
        'YaPaTha',
        'DaGaTa',
        'AuKaTa',
        'TaAuKa',
        'TaKaNa',
        'TaMaNa',
        'ThaKaTa',
        'ThaLaNa',
        'ThaGaKa',
        'ThaKhaNa',
        'TaTaNa',
        'YaKaNa',
        'BaTaHta',
        'DaGaSa',
        'WaTaNa',
    ],
    [
        'MaMaNa',
        'MaPaNa',
        'HaPaNa',
        'ThaNaNa',
        'SaSaNa',
        'ThaPaNa',
        'KaLaNa',
        'KaTaNa',
        'KaKaNa',
        'MaHtaTa',
        'KaHaNa',
        'KaKhaNa',
        'TaMaNya',
        'KaMaNa',
        'MaNgaNa',
        'KaThaNa',
        'LaKhaNa',
        'HaMaNa',
        'LaYaNa',
        'KhaYaHa',
        'LaKaNa',
        'YaSaNa',
        'LaLaNa',
        'MaBaNa',
        'MaTaNa',
        'MaKhaTa',
        'MaSaNa',
        'MaPhaTa',
        'MaPhaNa',
        'MaLaNa',
        'MaNaNa',
        'TaTaNa',
        'PaPaKa',
        'MaYaTa',
        'MaYaNa',
        'MaHaYa',
        'MaKaNa',
        'MaSaTa',
        'WaKana',
        'NaKhaNa',
        'NaSaNa',
        'NaPhana',
        'KhaLaNa',
        'NaTaNa',
        'NaMaTa',
        'NyaYaNa',
        'MaKhaNa',
        'PaSaNa',
        'PaWaNa',
        'PhaKhaNa',
        'PaTaYa',
        'PaLaNa',
        'TaKhaLa',
        'TaYaNa',
        'TaKaNa',
        'KaTaLa',
        'YaNyaNa',
        'YaNgaNa',
        'NaKhaTa',
    ],
    [
        'BaKaLa',
        'DaNaPha',
        'DaDaYa',
        'KaMaNa',
        'PaKaKha',
        'HaThaTa',
        'AhGaPa',
        'TaMaNa',
        'KaKaHta',
        'KaLaNa',
        'KaKhaNa',
        'KaKaNa',
        'KaPaNa',
        'LaPaTa',
        'PaSaLa',
        'LaMaNa',
        'MaAhPa',
        'MaMaKa',
        'MaAhNa',
        'AhPaNa',
        'MaMaNa',
        'HaKaKa',
        'NgaPaTa',
        'NgaYaKa',
        'NyaTaNa',
        'PaTaNa',
        'YaThaYa',
        'MaYaKa',
        'AhSaNa',
        'PaThaYa',
        'PaThaNa',
        'NgaSaNa',
        'AhMaNa',
        'KaMaTha',
        'PhaPaNa',
        'ThaPaNa',
        'WaKhaMa',
        'YaKaNa',
        'NgaThaKha',
        'ZaLaNa',
    ],
];
// foreach ($nrcDataList as $key => $value) {
    // print_r($value);
//     foreach ($value as $res) {
//         $arr = [
//             "code" => $key,
//             "location" => $res
//         ];
//         // return $arr;
//         echo "<pre>";
//         if ($arr['code'] == 1) {
//             // print_r($arr);
//             print_r($arr['code'] . "=>" . $arr['location'] . "<br>");
//         }
//         echo "</pre>";
//     }
// }

// foreach ($nrcDataList as $number =>  $nrcData) {
//     foreach ($nrcData as $nrc) {
//         [
//             'state_code' => $number,
//             'location_shortname' => $nrc,
//         ];
//     }
// }
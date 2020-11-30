<?php

function setAngka($nilai)
{
    list($nilai) = explode("]", str_replace("[>", "", $nilai));
    $nilai = $nilai == "" ? "0" : $nilai;

    $hasil = substr($nilai, 0, 1) == "." ? "0" . $nilai : $nilai;
    $hasil = str_replace(",", "", $hasil);

    return $hasil;
}

function getAngka($nilai = 0, $digit = 0)
{
    return number_format($nilai, $digit);
}

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

function getBulan($bulan, $str = "")
{

    $arr = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
    $sub = ["1" => "Jan", "2" => "Feb", "3" => "Mar", "4" => "Apr", "5" => "May", "6" => "Jun", "7" => "Jul", "8" => "Aug", "9" => "Sep", "01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec"];

    $hasil = $str ? $sub["$bulan"] : $arr["$bulan"];

    return $hasil;
}

function getTanggal($tanggal, $format = "")
{

    $arr = explode("-", $tanggal);

    if ($format == "") {
        $hasil = ($tanggal == "" or $tanggal == "0000-00-00") ? "" : $arr[2] . "/" . $arr[1] . "/" . $arr[0];
    } else {
        $hasil = ($tanggal == "" or $tanggal == "0000-00-00") ? "" : "$arr[2] " . getBulan($arr[1]) . " $arr[0]";
    }

    return $hasil;
}

function setTanggal($tanggal)
{

    if (empty($tanggal))
        $hasil = "0000-00-00";

    $arr = explode("/", $tanggal);
    $hasil = $arr[2] . "-" . $arr[1] . "-" . $arr[0];

    return $hasil;
}

function uploadFile($inputName = null, $fileName = null, $path = null, $extensionAllow = "gif|jpg|png|jpeg")
{
    $ci = &get_instance();
    $config['upload_path']          = $path;
    $config['allowed_types']        = $extensionAllow;
    $config['file_name']            = $fileName;
    $config['overwrite']            = true;
    $config['max_size']             = 1024; // 1MB

    $ci->load->library('upload', $config);

    if ($ci->upload->do_upload($inputName)) {
        return $ci->upload->data("file_name");
    } else {
        return null;
    }
}


function deleteImage($table, $where, $fieldName, $path)
{
    $ci = &get_instance();
    $data = $ci->db->get_where($table, $where)->row();
    if ($data->$fieldName != 'default.png') {
        $filename = explode(".", $data->$fieldName)[0];
        return array_map('unlink', glob(FCPATH . "$path/$filename.*"));
    }
}

<?php

function outcome_proof_url($fileName) {
    return asset('storage/'.config('url.outcome-proof').'/'.$fileName);
}

function donation_proof_url($fileName) {
    return asset('storage/'.config('url.donation-proof').'/'.$fileName);
}

function information_image_url($fileName) {
    return asset('storage/'.config('url.information-photo').'/'.$fileName);
}

function solia_image_url($fileName) {
    return asset('storage/'.config('url.solia-photo').'/'.$fileName);
}

function campaign_image_link($fileName) {
    return asset('storage/'.config('url.campaign-photo').'/'.$fileName);
}

function indonesian_date($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);
    
    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function number_formatting($angka)
{
    return number_format($angka, 0, "", ".") . "";
}

function truncateDescription($str) {
    return strip_tags(substr($str, 0, 120)). '...';
}
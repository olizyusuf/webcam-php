<?php

define('UPLOAD_DIR', 'upload/'); // lokasi folder upload
$img = $_POST['image']; // ambil dari form id image
$img = str_replace('data:image/png;base64,','', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.png'; // penamaan untuk upload ke folder yaitu dengan uniqid
$success = file_put_contents($file, $data); // hasil nama yang bisa diambil berupa nama folder upload dan nama filenya.
var_dump($success ? $file : 'unable to save the file');

// $data = $_POST['image'];
// list($type, $data) = explode(';', $data);
// list(, $data) = explode(',', $data);
// $data = base64_decode($data);

// echo $data;

// mkdir($_SERVER['DOCUMENT_ROOT']. "/photos");

// file_put_contents($_SERVER['DOCUMENT_ROOT']. "/photos" . time() . '.png', $data);
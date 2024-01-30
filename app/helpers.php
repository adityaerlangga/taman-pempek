<?php

use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


if (!function_exists('generateFiledCode')) {
    function generateFiledCode($code)
    {
        $result = $code . '-' . date('s') . date('Y') . date('m') . date('d') . date('h') . date('i') . mt_rand(10000, 99999);

        return $result;
    }
}

if (!function_exists('validateThis')) {
    function validateThis($request, $rules = array())
    {
        return Validator::make($request->all(), $rules);
    }
}

if (!function_exists('validationMessage')) {
    function validationMessage($validation)
    {
        $validate = collect($validation)->flatten();
        return $validate->values()->all();
    }
}


if (!function_exists('createAvatar')) {
    function createAvatar($name)
    {
        // Cek berapa suku kata, jika satu ambil satu huruf, jika lebih dari 1 ambil huruf pertama dari dua suku kata pertama
        $nameParts = explode(' ', $name);
        $initials = '';
        if (count($nameParts) > 1) {
            $initials = $nameParts[0][0] . $nameParts[1][0];
        } else {
            $initials = $nameParts[0][0];
        }

        $initials = strtoupper($initials);

        // Define a background color and text color for the avatar
        $bgColor = '#dddddd'; // Use a unique color based on the name
        $textColor = '#050505'; // White text color

        // Create an image with the initials and colors
        $imageWidth = 200;
        $imageHeight = 200;
        $image = imagecreate($imageWidth, $imageHeight);
        $bg = imagecolorallocate($image, hexdec(substr($bgColor, 1, 2)), hexdec(substr($bgColor, 3, 2)), hexdec(substr($bgColor, 5, 2)));
        $text = imagecolorallocate($image, hexdec(substr($textColor, 1, 2)), hexdec(substr($textColor, 3, 2)), hexdec(substr($textColor, 5, 2)));
        imagefill($image, 0, 0, $bg);

        // Use a default font
        $font = 50; // Adjust the font size as needed
        $bbox = imagettfbbox($font, 0, public_path('admin-assets/fonts/arial.ttf'), $initials);
        $textWidth = $bbox[2] - $bbox[0];
        $textHeight = $bbox[1] - $bbox[7];
        $textX = ($imageWidth - $textWidth) / 2;
        $textY = ($imageHeight - $textHeight) / 2 + $textHeight; // Adjust for better vertical centering

        imagettftext($image, $font, 0, $textX, $textY, $text, public_path('admin-assets/fonts/arial.ttf'), $initials);

        // Encode the image as base64
        ob_start();
        imagepng($image);
        $imageData = ob_get_clean();
        $base64 = base64_encode($imageData);

        imagedestroy($image);

        return 'data:image/png;base64,' . $base64;
    }
}

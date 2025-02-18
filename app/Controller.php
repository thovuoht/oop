<?php

namespace App;

class Controller
{
    public function validate($validator, $data, $rules)
    {
        $validation = $validator->make($data, $rules);
        $validation->validate();

        if ($validation->fails()) {
            return $validation->errors()->firstOfAll();
        }

        return [];
    }

    public function logError($message)
    {
        $date = date('d-m-Y');

        $message = date('d-m-Y H:i:s') . ' - ' . $message . PHP_EOL;

        error_log($message, 3, "storage/logs/$date.log");
    }

    public function uploadFile(array $file, $folder = null)
    {

        $fileTmpPath = $file['tmp_name'];
        $fileName = time() . '-' . $file['name']; 
        $uploadDir = 'storage/uploads/' . $folder . '/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            return $destPath;
        }

        throw new \Exception('Lỗi upload file!');
    }
}
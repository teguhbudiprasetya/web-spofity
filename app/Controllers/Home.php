<?php

namespace App\Controllers;
use Intervention\Image\ImageManagerStatic as Image;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function app()
    {   
        

        if($this->request->getFile('file')){
            $file = $this->request->getFile('file');

            if ($file->isValid() && ! $file->hasMoved()) {
                // Membaca konten file
                $resizedImage = Image::make($file->getTempName())
                ->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

            // Save the resized image to a temporary file
            $tempPath = 'assets/img/user-img';
            $tempName = 'resized_image.jpg'; // Provide a suitable filename with appropriate extension
            $resizedImage->save($tempPath . $tempName);

            // Obtain the necessary information from the temporary file
            $tempMimeType = mime_content_type($tempPath . $tempName);
            $tempNameWithExtension = $tempName;

            $apiUrl = 'https://gymtools-4ar4xydreq-et.a.run.app/';

            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, [
                'file' => new \CURLFile($tempPath . $tempName, $tempMimeType, $tempNameWithExtension)
            ]);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($curl);
    
            $response = curl_exec($curl);
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            // Check if the request was successful
            if ($statusCode === 200) {
                // Process the response from the API
                $responseData = json_decode($response, true);
                
                // Do something with the response data
                $id = $responseData['id'];
                $name = $responseData['name'];
                $accuracy = $responseData['accuracy'];
                $timePredict = $responseData['time_predict'];
                unlink($tempPath . $tempName);
            } else {
                die("Failed to process the image. Error: " . $response);
            }
            curl_close($curl);

            $data = [
                'namaAlat' => $name,
                'akurasi' => $accuracy,
                'waktuPrediksi' => $timePredict,
                'guide' => $this->AppModel->getEquipment($id),
            ];
        }
        }else{
            $data = [
                'namaAlat' => '',
                'akurasi' => '',
                'waktuPrediksi' => '',
            ];
        }
            return view('try-app-prediction', $data);
        }
    

    public function bmi()
    {

        if($this->request->getVar()){
            $height = $this->request->getPost('height');
            $weight = $this->request->getPost('weight');

            // Data yang akan dikirim ke API
            $data = [
                'height' => $height,
                'weight' => $weight
            ];

            $apiUrl = 'https://backend-4ar4xydreq-et.a.run.app/api/calculate-bmi';
            $token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjoiZXhhbXBsZSIsImlhdCI6MTY4NjU4NDE0Nn0.TiM8fcpmttPCj9UlZonCYoUgycpbaTTzrakOKDvFqU8';

            // Mengirim data ke API menggunakan cURL
            $curl = curl_init($apiUrl);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ]);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
            // Check if the request was successful
            if ($statusCode === 200) {
                // Process the response from the API
                $responseData = json_decode($response, true);
                
                // Do something with the response data
                $bmi = $responseData['bmi'];
                $kategori = $responseData['category'];
            } else {
                die("Failed to process the image. Error: " . $response);
            }
            curl_close($curl);

            $data = [
                'bmi' => round($bmi,2),
                'kategori' => $kategori,
            ];
        }else{
            $data = [
                'bmi' => '',
                'kategori' => '',
            ];
        }
            return view('try-app-bmi', $data);
    }

}

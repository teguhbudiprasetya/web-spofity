<?php

namespace App\Models;

use CodeIgniter\Model;

// $db      = \Config\Database::connect();
class AppModel extends Model
{
    protected $AppModel;

    public function getEquipment($id)
    {
        $jsonString = file_get_contents('data/guide.json');
        $guideList = json_decode($jsonString, true);
        // header('Content-Type: application/json');
        // die($json_string = json_encode($jsonString, JSON_PRETTY_PRINT));
        // dd(count($p));
        // dd($p);
        return $guideList[$id];
    }
}

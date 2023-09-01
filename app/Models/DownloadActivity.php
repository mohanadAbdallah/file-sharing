<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadActivity extends Model
{
    use HasFactory;
    protected $fillable = ['user_agent','ip_address','address','country','file_id'];

}

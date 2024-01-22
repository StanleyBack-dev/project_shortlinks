<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    protected $fillable = ['url_original', 'url_modifify'];
    protected $table = 'short_links';


    // Adicione outros métodos ou relações conforme necessário
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllKey extends Model
{
    protected $table = 'csvdatas';

    public $timestamps = true;

    protected $fillable = [
        'check_date',
        'grc_site_name', 
        'grc_site_url', 
        'grc_keyword', 
        'y_rank', 
        'y_change', 
        'y_count', 
        'y_url',
        'g_rank',
        'g_change',
        'g_count',
        'g_url',
        
        ];
    
}

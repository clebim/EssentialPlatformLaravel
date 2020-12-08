<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    function section() {
        return $this->belongsTo(SectionMenu::class, 'section_id', 'id');
    }
}

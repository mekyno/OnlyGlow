<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'icon',
        'member_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(MemberCategory::class, 'member_category_id');
    }

    public static function create10members()
    {
        Member::factory()->count(10)->create();
    }
}

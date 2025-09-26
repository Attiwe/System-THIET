<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteMnagement extends Model
{
    protected $fillable = [
       'name',
       'type',
       'description',
    ];
    public static array $enumType = [
        ['value' => 'institute', 'label' => ' وكيل المعهد و الشؤون الادارية '],
        ['value' => 'management', 'label' => ' عميد المعهد'],
        ['value' => 'other', 'label' => 'رئيسي مجلس ادارة'],
    ];

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'institute' => '  وكيل المعهد و الشؤون الادارية ',
            'management' => '  عميد المعهد',
            'other' => '  رئيسي مجلس ادارة',
            default => $this->type,
        };
    }

}

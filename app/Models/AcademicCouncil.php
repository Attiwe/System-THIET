<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicCouncil extends Model
{
    use HasFactory;
    
    protected $fillable = ['pdf'];
    
    protected $table = 'academic_councils';
    
    public $timestamps = true;
    
    /**
     * Get the PDF file URL
     */
    public function getPdfUrlAttribute()
    {
        return $this->pdf ? asset('storage/academic_councils/' . $this->pdf) : null;
    }
}

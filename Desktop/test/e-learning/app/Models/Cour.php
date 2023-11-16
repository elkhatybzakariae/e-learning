<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;

    protected $table = 'cours';
    protected $primaryKey = 'id_C';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_C',
        'title',
        'info',
        'description',
        'Prerequisites',
        'price',
        'lastmodi',
        'coupon',
        'valider',
        'id_U',
        'id_Sj',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_U');
    }
    public function section()
    {
        return $this->hasMany(Section::class);
    }
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
    public function sujet()
    {
        return $this->belongsTo(Sujet::class, 'id_Sj');
    }

    public function coursesByCategory()
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        $coursesByCategory = Cour::with('sujet', 'sujet.souscategorie', 'sujet.souscategorie.categorie')
            ->where('valider', 1)
            ->get()
            ->groupBy('sujet.souscategorie.categorie_id_Cat');
        $coursesGroupedByCategory = [];
        foreach ($categorie as $category) {
            $categoryId = $category->id_Cat;
            $courses = Cour::whereHas('sujet.souscategorie.categorie', function ($query) use ($categoryId) {
                $query->where('id_Cat', $categoryId);
            })->where('valider', 1)->get();                   
            $coursesGroupedByCategory[$category->id_Cat]['category'] = $category;
            $coursesGroupedByCategory[$category->id_Cat]['courses'] = $courses;
        }
        return $coursesGroupedByCategory;
    }
}

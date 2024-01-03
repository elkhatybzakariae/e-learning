<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cour extends Model
{
    use HasFactory;

    protected $table = 'cours';
    protected $primaryKey = 'id_C';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'id_C',
        'photo',
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
        return $this->hasMany(Section::class, 'id_C');
    }
    public function wishlist()
    {
        return $this->hasOne(WishList::class, 'id_C');
    }
    public function panier()
    {
        return $this->hasOne(Panier::class, 'id_C');
    }
    // public function certificate()
    // {
    //     return $this->hasOne(Certificate::class, 'id_C');
    // }
    public function sujet()
    {
        return $this->belongsTo(Sujet::class, 'id_Sj');
    }

    public function coursesByCategory()
    {
        $categorie = Categorie::all();
        $souscategorie = SousCategorie::all();
        $sujets = Sujet::all();
        $coursesGroupedByCategory = [];
        foreach ($categorie as $category) {
            $categoryId = $category->id_Cat;
            $courses = Cour::with('user')->whereHas('sujet.souscategorie.categorie', function ($query) use ($categoryId) {
                $query->where('id_Cat', $categoryId);
            })->where('valider', 1)->get();
            $coursesGroupedByCategory[$category->id_Cat]['category'] = $category->CatName;
            $coursesGroupedByCategory[$category->id_Cat]['courses'] = $courses;
        }
        return [
            'coursesGroupedByCategory' => $coursesGroupedByCategory,
            'categorie' => $categorie,
            'souscategorie' => $souscategorie,
            'sujets' => $sujets
        ];
    }

    public function show($id){
        $cour = Cour::where('id_C', $id)
            ->with([
                'section' => function ($query) {
                    $query->with([
                        'session' => function ($query) {
                            $query->with(['video' => function ($query) {
                                $query->orderBy('created_at', 'asc')->with(['videoterminer' => function ($query) {
                                    $query->where('id_U',Auth::id());
                                }]);
                            }]);
                        },
                        'quiz',
                    ]);
                },
                'sujet.souscategorie.categorie','certificate',
            ])
            ->first();
            return $cour;
    }

    public function certificate()
    {
        return $this->morphMany(Certificate::class, 'certificatetable');
    }
}

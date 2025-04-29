<?php


namespace App\Models;


class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'creator_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('is_admin')->withTimestamps();
    }

    public function admins()
    {
        return $this->belongsToMany(User::class)->wherePivot('is_admin', true);
    }
}

<?php

class Interest extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}

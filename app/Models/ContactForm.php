<?php

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message', 'read'];

    protected $casts = [
        'read' => 'boolean',
    ];
}

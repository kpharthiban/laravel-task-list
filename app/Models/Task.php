<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description']; // This makes sure these value for the keys are fillable
    // protected $guarded = ['secret'];

    public function toggleComplete() {
        $this->completed = !$this->completed;
        $this->save();
    }
}

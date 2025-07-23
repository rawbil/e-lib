<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    public function searchFilter($query, array $filters)
    {
        //search
        if ($filters['search'] ?? false) {
            $query->where('tags', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%')
                ->orWhere('author', 'like', '%' . request('search') . '%');
        }

        //tags
        if ($filters['tags'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tags'] . '%');
        }
    }
}
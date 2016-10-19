<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public static function getAll()
    {
        return self::orderBy('created_at', 'desc')->get();
    }

    public static function deleteReviewById($id)
    {
        return self::where('id', $id)->delete();
    }

    public static function changeStatusById($id)
    {
        $review = self::whereId($id)->first();
        $review->status = ($review->status)? 0 : 1;
        return $review->update();
    }
}

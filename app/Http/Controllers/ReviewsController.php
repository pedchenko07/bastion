<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::getAll();
        return view('admin.reviews.index', [
            'reviews' => $reviews,
        ]);
    }

    public function status($id)
    {
        $result = Review::changeStatusById($id);

        if (!$result) {
            Session::flash('error', 'При изменении статуса отзыва что-то пошло не так');
        }

        return redirect()->route('reviews.index');
    }

    public function delete($id)
    {
        $result = Review::deleteReviewById($id);

        if ($result) {
            Session::flash('success', 'Отзыв успешно удален');
        } else {
            Session::flash('error', 'При удалении отзыва что-то пошло не так');
        }

        return redirect()->route('reviews.index');
    }
}

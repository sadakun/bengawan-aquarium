<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use DateTime;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function show()
    {
        $users = User::all();
        $role = auth()->check() ? auth()->user()->roles->pluck('name')->first() : ('');
        $comments = Comment::all();
        $posts = Post::all();
        $chartArea = $this->getMonthlyPostData();
        $chartMonths = $chartArea['months'];
        $chartPostCount = $chartArea['post_count_data'];
        $totalCurrentPost = $this->getTotalPostThisMonth();
        $totalCurrentComment = $this->getTotalCommentThisMonth();
        // dd($totalCurrentPost);
        return view('admin.dashboards.index',[
            'users'=>$users,
            'role'=>$role,
            'comments'=>$comments,
            'posts'=>$posts,
            'chartMonths'=>$chartMonths,
            'chartPostCount'=>$chartPostCount,
            'totalCurrentPost'=>$totalCurrentPost,
            'totalCurrentComment'=>$totalCurrentComment,
        ]);
    }

    public function userDashboard()
    {
        $users = User::all();
        $role = auth()->check() ? auth()->user()->roles->pluck('name')->first() : ('');
        $comments = Comment::all();
        $posts = Post::all();
        $chartArea = $this->getMonthlyPostData();
        $chartMonths = $chartArea['months'];
        $chartPostCount = $chartArea['post_count_data'];
        $totalCurrentPost = $this->getTotalPostThisMonth();
        $totalCurrentComment = $this->getTotalCommentThisMonth();
        // dd($totalCurrentPost);
        return view('admin.dashboards.index',[
            'users'=>$users,
            'role'=>$role,
            'comments'=>$comments,
            'posts'=>$posts,
            'chartMonths'=>$chartMonths,
            'chartPostCount'=>$chartPostCount,
            'totalCurrentPost'=>$totalCurrentPost,
            'totalCurrentComment'=>$totalCurrentComment,
        ]);
    }

    public function getTotalPostThisMonth() {
        $year = date('yy');
        $month = date('m');
        
        $postCurrentMonth = Post::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get()->count();
        return $postCurrentMonth;
    }

    public function getTotalCommentThisMonth() {
        $year = date('yy');
        $month = date('m');
        
        $commentCurrentMonth = Comment::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get()->count();
        return $commentCurrentMonth;
    }

    public function getAllMonths(){
        $month_array = array();
        $posts_date = Post::orderBy('created_at', 'ASC')->pluck('created_at');
        // convert into json
        $posts_date = json_decode($posts_date);
        if(!empty($posts_date)){
            foreach($posts_date as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    public function getMonthlyPostCount($month) {
       
        $monthly_post_count = Post::whereMonth('created_at', $month)->get()->count();
        return $monthly_post_count;
    }

    public function getMonthlyPostData() {
        $monthly_post_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if(!empty($month_array)) {
            foreach( $month_array as $month_no => $month_name) {
                $monthly_post_count = $this->getMonthlyPostCount($month_no);
                array_push($monthly_post_count_array, $monthly_post_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no = max($monthly_post_count_array);
        $max_no = round(($max_no + 10/2) / 10) * 10;
        // return $monthly_post_count_array;
        $month_array = $this->getAllMonths();
        $monthly_post_data_array = array(
            'months' => $month_name_array,
            'post_count_data' => $monthly_post_count_array,
            'max' => $max_no,
        );
        return $monthly_post_data_array;
    }
}

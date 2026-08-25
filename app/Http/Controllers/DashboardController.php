<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Category;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {
        $totalBatches = Batch::count();
        $totalInstructor = Instructor::count();
        $totalStudents = Student::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();

        return view('dashboard.index', compact('totalBatches', 'totalInstructor', 'totalStudents', 'totalCategories', 'totalUsers'));
    }
}

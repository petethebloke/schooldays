<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $school;
    private $client;

    function __construct(){
        $this->client = new \Wonde\Client(env('TOKEN'));
        $this->school = env('SCHOOLID');
    }

    public function index()
    {
        $staff = [];
        $school = $this->client->school($this->school);
        // Get employees
        foreach ($school->employees->all() as $employee) {
            $staff[] = ['id' => $employee->id, 'forename' => $employee->forename, 'surname' => $employee->surname];
        }
        // Sort lastname firstname
        usort($staff, function($a, $b) {
            return [$a['surname'], $a['forename']] <=> [$b['surname'], $b['forename']];
        });
        return view('home', ['title' => 'Lesson Attendance', 'staff' => $staff]);
    }

    public function classes(Request $request)
    {
        $students = [];
        $school = $this->client->school($this->school);
        // Get classes
        $includes = ['classes'];
        $classes = $school->employees->get($request->employee, $includes);
        // Next get students by class
        $includes = ['students'];
        foreach ($classes->classes->data as $class) {
            $students[$class->name] = [];
            $attendees = $school->classes->get($class->id, $includes);
            foreach ($attendees->students->data as $attendee) {
                $students[$class->name][] = $attendee->forename . ' ' . $attendee->surname;
            }
        }
        return view('classes', ['title' => "$classes->forename $classes->surname", 'students' => $students]);
    }
}





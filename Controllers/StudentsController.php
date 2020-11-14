<?php

namespace Controllers;

use Core\Model;
use Core\Controller;
use Models\StudentsModel;

class StudentsController extends Controller
{
    public function index()
    {
        // $students = new StudentsModel();
        // $data['grades'] = $students->getAllGrades();
        // $data['students'] = $students->getAllStudents();
        // $this->set($data);
        $this->render('index');
    }

    public function create()
    {
        if (isset($_POST['name']))
        {
            $students = new StudentsModel();

            if ($students->create($_POST['student_name'], $_POST['school'])) {
                header("Location: " . WEBROOT . 'students/index');
            }

            $this->render('create');
        }
    }

    public function addGrade($id, $grade)
    {

    }

    public function student($id)
    {
        $students = new StudentsModel();

        $data['student'] = $students->getStudent($id);
        $data['grades'] = $students->getStudentGrades($id);

        $this->calculateResult(&$data);

        $this->set($data);
        $this->render('student');

    }

    public function calculateResult(&$data)
    {
        $school = $data['student']['school'];

        if ($school == 'CSM') {
            $average = array_sum($data['grades']) / count($data['grades']);
            $data['student']['average'] = $average;
            $data['student']['result'] = ($average >= 7) ? 1 : 0;
        }
        
        if ($school == 'CSMB') {
            $max = max($data['grades']);
            $data['student']['result'] = ($max && count($data['grades']) >= 2) > 8 ? 1 : 0;
        }
    }
}
<?php

namespace Models;

use \Core\Model;
use \Core\Database;

class UsersModel extends Model
{
    public function create($name, $school)
    {
        $sql = "INSERT INTO students (student_name, school, created_at, updated_at
                VALUES (:student_name, :desciption, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);
        $data = [
            'student_name' => $name,
            'school' => $school
        ];

        return $req->execute($data);
    }

    public function getAllStudents()
    {
        $sql = "SELECT * FROM students";

        $req = Database::getBdd()->preapre($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getStudentGrades($id)
    {
        $sql = "SELECT grade FROM grades WHERE student_id = " . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute($sql);
        return $req->fetchAll();
    }

    public function getStudent($id)
    {
        $sql = "SELECT * FROM student WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute($sql);
        return $req->fetch();
    }

}
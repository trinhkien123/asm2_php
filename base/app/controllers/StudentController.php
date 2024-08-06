<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController extends BaseController
{
    protected $students;
    public function __construct()
    {
        $this->students = new Student();
    }
    public function index()
    {
        $std = new Student();
        $students = $std->getListStudent();
        return $this->render('student.list', compact('students'));
    }
    public function create()
    {
        return $this->render('student.create');
    }
    public function store()
    {
        if (isset($_POST['btn-submit'])) {
            echo "124";
            // validate
            $error = []; // chữa lỗi
            if (empty($_POST['name'])) {
                $error[] = "Bạn phải nhập tên";
            }
            if (empty($_POST['phone_number'])) {
                $error[] = "Bạn phải nhập số điện thoại";
            }
            if (empty($_POST['year_of_birth'])) {
                $error[] = "Bạn phải nhập năm sinh";
            }
            if (count($error)) {
                redirect('errors', $error, 'create');
            } else {
                $check = $this->students->insertStudent(null, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check) {
                    redirect('success', 'Thêm thành công', 'index');
                } else {
                    redirect('errors', 'Thêm thất bại', 'create');
                }
            }
        }
    }
    public function delete($id){
        $check = $this->students->deleteStudent($id);
        if($check){
            redirect('success', 'Xóa thành công','index');
        }
    }
}

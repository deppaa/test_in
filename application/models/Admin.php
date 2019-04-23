<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function login($post)
    {
        $arr = require 'application/config/admin.php';
        foreach ($post as $value)
        {
            foreach ($arr as $val)
            {
                if ($val != $value)
                {
                    $this->error = 'Не верный логин или пароль';
                    return false;
                }
            }
        }

        $_SESSION['admin'] = $post['login'];
        return true;
    }

    public function numberCours()
    {
        $params = [];
        return count($this->db->row('SELECT * FROM course', $params));
    }

    public function numberTask()
    {
        $params = [];
        return count($this->db->row('SELECT * FROM task', $params));
    }

    public function numberStud()
    {
        $params = [];
        return count($this->db->row('SELECT * FROM moder', $params));
    }

    public function numberModer()
    {
        $params = [];
        return count($this->db->row( 'SELECT * FROM account', $params));
    }

    public function courseList()
    {
        $params = [];
        return $this->db->row('SELECT * FROM course ORDER BY id DESC', $params);
    }

    public function istaskExist($id)
    {
        $params = [
            'id' => $id,
        ];

        return $this->db->column('SELECT id FROM course WHERE id = :id', $params);
    }

    public function taskDelate($id)
    {
        $params = [
            'id' => $id,
        ];

        $del_id = $this->db->row('SELECT id FROM task WHERE course_id = :id', $params);

        $this->db->query('DELETE FROM course WHERE id = :id', $params);

        $filename = 'public/preview/' . $id . '.jpg';

        if (file_exists($filename)) {
                unlink($filename);
            }

        $dir = 'public/userCode';
        foreach ($del_id as $val) {
                foreach (glob($dir . '/' . $val['id'] . '_*.txt') as $file) {
                        if (file_exists($file)) {
                                unlink($file);
                            }
                    }
            }
    }

    public function editTask($id)
    {
        $params = [
            'course_id' => $id,
        ];

        return $this->db->row('SELECT * FROM task WHERE course_id = :course_id', $params);
    }

    public function editCourse($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM course WHERE id = :id', $params);
    }

    public function updateCourse($post, $id)
    {
        $params = [
            'id' => $id,
            'number_group' => $post['task-number_group'],
            'title' => $post['task-name'],
            'description' => $post['task-desk'],
            'lang' => $post['lang'],
            'date' => date("Y-m-d H:i:s"),
        ];

        $this->db->query('UPDATE course SET number_group = :number_group, title = :title, description = :description, lang = :lang, date = :date WHERE id = :id', $params);

        $progres = $this->editTask($id);

        if (is_array($progres)) {
                for ($i = 1; $i <= count($progres); $i++) {
                        $params = [
                            'id' => $progres[$i - 1]['id'],
                            'ball' => $post['task-ball' . $i],
                            'title' => $post['task-title' . $i],
                            'text' => $post['task-text' . $i],
                            'test1_in' => $post['input-text1-' . $i],
                            'test1_out' => $post['output-text1-' . $i],
                            'test2_in' => $post['input-text2-' . $i],
                            'test2_out' => $post['output-text2-' . $i],
                            'test3_in' => $post['input-text3-' . $i],
                            'test3_out' => $post['output-text3-' . $i],
                            'solved' => '0',
                        ];

                        $this->db->query('UPDATE task SET ball = :ball, title = :title, text = :text, test1_in = :test1_in, test1_out = :test1_out, test2_in = :test2_in, test2_out = :test2_out, test3_in = :test3_in, test3_out = :test3_out, solved = :solved WHERE id = :id', $params);
                    }
                $this->taskSelect($id, $post, count($progres) + 1);
            } else {
                $this->taskSelect($id, $post, 1);
            }

        return true;
    }

    public function taskSelect($id, $post, $path)
    {
        for ($i = $path; $i <= $post['count']; $i++) {
                $params = [
                    'id' => '',
                    'course_id' => $id,
                    'ball' => $post['task-ball' . $i],
                    'title' => $post['task-title' . $i],
                    'text' => $post['task-text' . $i],
                    'test1_in' => $post['input-text1-' . $i],
                    'test1_out' => $post['output-text1-' . $i],
                    'test2_in' => $post['input-text2-' . $i],
                    'test2_out' => $post['output-text2-' . $i],
                    'test3_in' => $post['input-text3-' . $i],
                    'test3_out' => $post['output-text3-' . $i],
                    'solved' => '0',
                ];

                $this->db->query('INSERT INTO task VALUES (:id, :course_id, :ball, :title, :text, :test1_in, :test1_out, :test2_in, :test2_out, :test3_in, :test3_out, :solved)', $params);
            }
    }
}

?>
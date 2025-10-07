<?php

namespace Core;

class Table
{
    private $db;
    private $dbName;
    // private $errors;
    // public $err = [];

    public function __construct(Database $db, $dbName)
    {
        $this->db = $db;
        $this->dbName = $dbName;

    }

    //rules for validation
    public function rules()
    {
        return [
            'numMin' => 6,
            'numMax' => 9999,
            'strMin' => 3,
            'strMax' => 155,
        ];
    }

    // method for validate inputs and get errors
    public function validateField($value, array $rules)
    {
        $errors = [];
        foreach ($value as $key => $validate) {

            if (!Validator::stringMin($validate, $rules['strMin'])) {
                $errors[$key][] = 'Too few characters';
            }

            if (!Validator::stringMax($validate, $rules['strMax'])) {
                $errors[$key][] = 'Too much characters';
            }

            if ($key === 'email') {
                if (!Validator::email($validate)) {
                    $errors[$key][] = 'Please provide a valid email address';
                }
            }

            if (Validator::number($validate)) {
                if (!Validator::numberMin($validate, $rules['numMin'])) {
                    $errors[$key][] = 'Number must be higher';
                }

                if (!Validator::numberMax($validate, $rules['numMax'])) {
                    $errors[$key][] = 'Number is too high';
                }
            }
        }
        return $errors;
    }

    //method for add inputs and validate
    public function addField($value, array $rules)
    {
        $errors = $this->validateField($value, $rules);

        if(!empty($errors)){
            return $errors;
        }
        
        $columnName = [];
        $params = [];
        foreach ($value as $fieldName => $fieldValue) {
            if ($fieldName == 'passwordcheck') {
                continue;
            }
            $columnName[] = "$fieldName";
            $dataValue[] = ":$fieldName";
            $params[":$fieldName"] = $fieldValue;
        }
        $sql = "INSERT INTO $this->dbName (" . implode(', ', $columnName) . ") VALUES (" . implode(', ', $dataValue) . ")";
        $post = $this->db->query($sql, $params);
        return [];
    }



    //method for edit exists record
    public function updateField($value, array $rules, $id)
    {
        $errors = $this->validateField($value, $rules, $id);

        if(!empty($errors)){
            return $errors;
        }
        
        $data = [];
        $params = [':id' => $id];
        foreach ($value as $fieldName => $fieldValue) {
            if ($fieldName === 'id') {
                continue;
            }
            $data[] = "$fieldName = :$fieldName";
            $params[":$fieldName"] = $fieldValue;
        }
        $sql = "UPDATE $this->dbName SET " . implode(', ', $data) . " WHERE id = :id";
        $post = $this->db->query($sql, $params);
        return [];
    }

    //render table view
    public function render($table, $actions = true)
    {
        // table name
        $dbName = $this->dbName;

        // get column names for sql
        $sqlColumns = Validator::sanitizeKeys($table);

        // table content request
        $result = $this->db->query("select {$sqlColumns} from {$dbName}")->fetchAll();

        //check for table content
        if (empty($result)) {
            echo '<p>No data to display.</p>';
            return;
        }

        // table column names
        $fields = array_keys($result[0]);

        // table rendering
        echo '<table id="table">';
        echo '<thead><tr>';
        foreach ($table as $key => $names) {
            if ($key === 'id') {
                continue;
            }
            echo '<th>' . htmlspecialchars($names) . '</th>';
        }
        if ($actions) {
            echo '<th>Delete</th>';
            echo '<th>Edit</th>';
        }
        echo '</tr></thead><tbody>';

        foreach ($result as $row) {
            echo '<tr>';
            foreach ($fields as $fieldName) {
                if ($fieldName === 'id') {
                    continue;
                }
                echo '<td>' . htmlspecialchars($row[$fieldName]) . '</td>';
            }
            if ($actions) {
                echo '<td><a href="?remove=' . htmlspecialchars($row['id']) . '" class="text-red-500">Delete</a></td>';
                echo '<td><a href="edit?id=' . htmlspecialchars($row['id']) . '" class="text-blue-500">Edit</a></td>';
            }
        }
        echo '</tbody></table>';
    }

    public function removeItem($id)
    {
        //table name
        $dbName = $this->dbName;

        //delete query
        $delete = $this->db->query("delete from {$dbName} where id = {$id}");
    }

    public function refreshView()
    {
        header("Location: /");
        exit();
    }
}
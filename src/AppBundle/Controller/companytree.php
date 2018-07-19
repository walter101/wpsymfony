<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 6-3-2018
 * Time: 20:51
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class companytree
 * @package AppBundle\Controller
 */
class companytree extends Controller
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "1234";
    private $dbname = "wpsymfony";

    private $conn;


    public function __construct(){
        // Set the mysqli conn property
        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    /**
     * Returns the departmentname using the departmentID
     *
     * @param integer $departmentID
     * @return string
     */
    public function getCurrentDepartmentname($departmentID){

        if($departmentID == 0) return 'Root';
        $sql = "SELECT * FROM departments where dept_no = $departmentID";
        $result = $this->conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        return $row['dept_name'];
    }

    /**
     * Get an array with all the departments belonging to this departmentID
     * @param integer $DepartmentID
     * @return array
     */
    public function getCurrentDepartments($DepartmentID){

        $currentDepartments = array();

        $sql = "SELECT * FROM departments where dept_parent = $DepartmentID";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $currentDepartments[] = $row;
        }

        return $currentDepartments;
    }

    /**
     * Returns the ID for the parentdepartment
     * @param DepartmentID
     * @return mixed
     */
    public function getParentID($DepartmentID){

        $sql = "SELECT dept_parent FROM departments where dept_no = $DepartmentID";
        $result = $this->conn->query($sql);
        $parentID = mysqli_fetch_assoc($result);

        return $parentID['dept_parent'];
    }

    public function getCurrectEmployees($DepartmentID){
        $currentEmployees = array();

        $sql = "SELECT * FROM current_dept_emp
                  inner join employees on current_dept_emp.emp_no = employees.emp_no
                  where current_dept_emp.dept_no = $DepartmentID";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $currentEmployees[] = $row;
        }

        return $currentEmployees;

    }

    /**
     * @Route("manage/{DepartmentID}", name="managetree")
     */
    public function manageCompanyTreeAction($DepartmentID = 0){

        return $this->render('companytree/companytree.html.twig', [
            'DepartmentID' => $DepartmentID,
            'parentCurrentDepartment' => $this->getParentID($DepartmentID),
            'currentDepartments' => $this->getCurrentDepartments($DepartmentID),
            'currentEmployees' => $this->getCurrectEmployees($DepartmentID),
            'departmentname' => $this->getCurrentDepartmentname($DepartmentID),
        ]);

    }


    /**
     * @Route("add_department/{DepartmentID}", name="add_department")
     * @Method
     * ({"GET", "POST"})
     */
    public function AddDepartmentAction($DepartmentID = 0){

        // Get the department from FORM or set as null (default)
        $FormValues['department'] = isset($_GET['department']) ? $_GET['department'] : null;

        // Process form AddDepartment id submitted
        if(isset($_GET['submitAddDepartment'])) {

            // Insert the new department
            $sql = "INSERT INTO departments ( dept_no, dept_name, dept_parent) VALUES ( 1, '".$FormValues['department']."', $DepartmentID) ";
            if(!$this->conn->query($sql)) echo $this->conn->error;

            // update the dept_no to match auto increment value ID
            $sql="UPDATE departments set dept_no = ".$this->conn->insert_id." where id = ".$this->conn->insert_id;
            if(!$this->conn->query($sql)) echo $this->conn->error;

        }


        // Create view
        return $this->render('companytree/companytree.html.twig', [
            'DepartmentID' => $DepartmentID,
            'parentCurrentDepartment' => $this->getParentID($DepartmentID),
            'currentDepartments' => $this->getCurrentDepartments($DepartmentID),
            'currentEmployees' => $this->getCurrectEmployees($DepartmentID),
            'departmentname' => $this->getCurrentDepartmentname($DepartmentID),
            'FormValues' => $FormValues,
            'action' => 'Add_Department',
        ]);

    }

    /**
     * @Route("add_employee/{DepartmentID}", name="add_employee")
     * @Method({"GET", "POST"})
     */
    public function AddEmployeeAction($DepartmentID = 0){

        // Default form values to prevent errors
        $FormValues['firstname'] = isset($_GET['firstname']) ? $_GET['firstname'] : null;
        $FormValues['lastname'] = isset($_GET['lastname']) ? $_GET['lastname'] : null;
        $FormValues['gender'] = isset($_GET['gender']) ? $_GET['gender'] : null;

        echo $FormValues['gender'];

        if(isset($_GET['submitAddEmployee'])) {

            $newEmployeeID = $this->saveNewEmployee($FormValues['firstname'], $FormValues['lastname'], $FormValues['gender']);
            echo 'newEmployeeID'.$newEmployeeID .'<br>';
            $this->connectEmployeeToDepartment($newEmployeeID, $DepartmentID);
        }


        return $this->render('companytree/companytree.html.twig', [
            'DepartmentID' => $DepartmentID,
            'parentCurrentDepartment' => $this->getParentID($DepartmentID),
            'currentDepartments' => $this->getCurrentDepartments($DepartmentID),
            'currentEmployees' => $this->getCurrectEmployees($DepartmentID),
            'departmentname' => $this->getCurrentDepartmentname($DepartmentID),
            'FormValues' => $FormValues,
            'action' => 'Add_Employee',
        ]);

    }


    public function connectEmployeeToDepartment($newEmployeeID, $DepartmentID){

        $sql = "INSERT INTO current_dept_emp (emp_no, dept_no, from_date) VALUES ($newEmployeeID, $DepartmentID, '".date("Y-m-d")."') ";
        if(!$this->conn->query($sql)) echo $this->conn->error;

    }

    public function saveNewEmployee($firstname, $lastname, $gender){
        // Insert the new employee
        $sql = "INSERT INTO employees ( emp_no, firstname, lastname, birthdate, hiredate, gender) VALUES ( 1, '".$firstname."', '".$lastname."', '".date("Y-m-d")."', '".date("Y-m-d")."', '".$gender."' ) ";
        if(!$this->conn->query($sql)) echo $this->conn->error;

        $InsertedEmployeeID = $this->conn->insert_id;

        // update the dept_no to match auto increment value ID
        $sql="UPDATE employees set emp_no = ".$this->conn->insert_id." where id = ".$this->conn->insert_id;
        if(!$this->conn->query($sql)) echo $this->conn->error;

        return $InsertedEmployeeID;
    }


}
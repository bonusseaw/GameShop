<?php
class MemberController {

/**
 * handleRequest จะทำการตรวจสอบ action และพารามิเตอร์ที่ส่งเข้ามาจาก Router
 * แล้วทำการเรียกใช้เมธอดที่เหมาะสมเพื่อประมวลผลแล้วส่งผลลัพธ์กลับ
 *
 * @param string $action ชื่อ action ที่ผู้ใช้ต้องการทำ
 * @param array $params พารามิเตอร์ที่ใช้เพื่อในการทำ action หนึ่งๆ
 */
public function handleRequest(string $action="index", array $params) {
    switch ($action) {
        case "login":
            $username = $params["POST"]["username"]??"";
            $pass = md5($params["POST"]["password"]??"");
            if ($username !== "" && $pass !== "") {
                $this->$action($username, $pass);
            }
            break;
        case "addNew":
            $name = $params["POST"]["name"];
            $surname = $params["POST"]["surname"];
            $username = $params["POST"]["username"];
            $password = md5($params["POST"]["password"]);
            $email = $params["POST"]["email"];
            $this->$action($name,$surname,$username,$password,$email);
            break;
        case "signUp":
            $a = 1;
            $this->$action($a);
            break;
        case "profile":
            $b = 5;
            $this->$action($b);
            break;
        case "backhome":
            $c = 8;
            $this->$action($c);
            break;
        case "backpage":
            $d = 8;
            $this->$action($d);
            break;
        case "index":
            $this->index();
            break;
        default:
            break;
    }
}

    private function signUp ($a){
        include Router::getSourcePath()."Views/regis.inc.php";
    }
    private function profile($b){
        include Router::getSourcePath()."Views/member.inc.php";
    }
    private function backhome($c){
        session_start();
        include Router::getSourcePath()."Views/menu.inc.php";
    }
    private function backpage($d){
        include Router::getSourcePath()."Views/approve.inc.php";
    }
    private function addNew ($name,$surname,$username,$password,$email){
        $member = new Member();
        $member->setName($name);
        $member->setSurname($surname);
        $member->setUser($username);
        $member->setPasswd($password);
        $member->setEmail($email);
        $member->insert();
        header("Location: ".Router::getSourcePath()."index.php?");

    }
    private function login(string $username, string $password) {
            $member = Member::findByAccount($username,$password) ;
        if ($member !== null){
            session_start();
            $_SESSION['member'] = $member;
            $_SESSION['username'] = $member->getUser();
            $_SESSION['name'] = $member->getName();
            $_SESSION['surname'] = $member->getSurname();
            $_SESSION['id'] = $member->getId();
            $_SESSION['password'] = $member->getPasswd();
            $_SESSION['email'] = $member->getEmail();
            include Router::getSourcePath()."Views/menu.inc.php";
        }
        else {
            header("Location: ".Router::getSourcePath()."index.php?msg=invalid username or password");
        }
        
    }
    private function index() {
        
    }
}
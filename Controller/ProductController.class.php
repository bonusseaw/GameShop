<?php
class ProductController {

/**
 * handleRequest จะทำการตรวจสอบ action และพารามิเตอร์ที่ส่งเข้ามาจาก Router
 * แล้วทำการเรียกใช้เมธอดที่เหมาะสมเพื่อประมวลผลแล้วส่งผลลัพธ์กลับ
 *
 * @param string $action ชื่อ action ที่ผู้ใช้ต้องการทำ
 * @param array $params พารามิเตอร์ที่ใช้เพื่อในการทำ action หนึ่งๆ
 */
public function handleRequest(string $action="index", array $params) {
    switch ($action) {
        case "index":
            $this->index();
            break;
        case "checkOut":
            $this->checkOut();
             break;
        default:
            break;
    }
}

    private function index() {
        $pro = Product::findAll();  
    }
    private function checkOut() {
        session_start();
        include Router::getSourcePath()."Views/checkout.inc.php";
            
    }
}
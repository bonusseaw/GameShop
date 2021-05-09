<?php

class CheckoutController {

    public function handleRequest(string $action="index", array $params) {
        switch ($action) {
        case "index":
            $this->index();
            break;
        default:
            break;
        }
    }


    private function index() {
        include Router::getSourcePath()."Views/menu.inc.php";
    }

}
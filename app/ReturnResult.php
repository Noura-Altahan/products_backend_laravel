<?php

namespace App;

/**
 * Used to return a standard result object
 * Codes are:
 * 200 - Success
 * 403 - Validation Error
 * 404 - Not Found
 * 405 - Session Timeout
 * 500 - Server Error
 */
class ReturnResult
{
    public $isSuccess = true;
    public $code = "";
    public $status = 200;
    public $message = "";
    public $data = [];
    public $filter = "";
    public $email = "";
    public $description = "";




    public function setError($message, $code = "ERROR", $status = 400)
    {
        $this->isSuccess = false;
        $this->status = $status;
        $this->message = $message;
        $this->code = $code;
    }

    public function setError403($message) //for validation errors
    {
        $this->isSuccess = false;
        $this->status = 403;
        $this->message = $message;
        $this->code = "VALIDATION_ERROR";
    }

    public function setError404($message) //for not found
    {
        $this->isSuccess = false;
        $this->status = 404;
        $this->code = "NOT_FOUND";
        $this->message = $message;
    }

    public function setError500($message) // server error
    {
        $this->isSuccess = false;
        $this->status = 500;
        $this->message = $message;
        $this->code = "SERVER_ERROR";
    }
}

<?php

namespace App\Helpers;

trait ResponseHelper
{
    /**
     * @var array
     */
    protected $body;

    /**
     * Set response data.
     *
     * @param $data
     * @return $this
     */
    public function setData($data):void
    {
        $this->body['data'] = $data;
       
    }

    public function setStatus($status):void
    {
        $this->body['status'] = $status;
    }

    public function setCode($code):void
    {
        $this->body['code'] = $code;
    }

    public function setMessage($message):void
    {
        $this->body['message'] = $message;

    }

    public function setError($error):void
    {
        $this->body['errors'] = is_array($error) ? $error : array($error);
       
    }

    public function apiJson($code, $status, $data, $message)
    {
        $this->setCode($code);
        $this->setStatus($status);
        $this->setData($data);
        $this->setMessage($message);
        return response()->json($this->body, $code);
    }

    public function error($code, $status, $errors, $message = '')
    {
        $this->setCode($code);
        $this->setStatus($status);
        $this->setError($errors);
        $this->setMessage($message);
        return response()->json($this->body, $code);
    }

    public function reFormatValidationErr($validationObj)
    {
        $response = [];
        $errorsArr = $validationObj->toArray();
        if (count($errorsArr) > 0) {
            foreach ($errorsArr as $errs) {
                foreach ($errs as $oneError) {
                    $response[] = $oneError;
                }
            }
        }
        return $response;
    }
}
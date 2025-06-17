<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends CreateTodoRequest
{
   // since the validation rules are the same as CreateTodoRequest, extending it is sufficient
   public function rules(): array
    {
        return parent::rules();
    }
}

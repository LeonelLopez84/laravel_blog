<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->user);
        
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name'     => 'min:5|max:100|required',
                    'email'    => 'min:10|max:120|required|email|unique:users',
                    'password' => 'min:8|max:20|required|confirmed',
                    'type'     => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'     => 'min:5|max:100|required',
                    'email'    => 'min:10|max:120|required|email|unique:users,email,'.$user->id,
                    'password' => 'min:8|max:20|confirmed',
                    'type'     => 'required'
                ];
            }
            default:break;
        }
    }
}

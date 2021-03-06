<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class CategoryRequest extends FormRequest
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
        $category= Category::find($this->category);


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
                    'name'=>'min:2|required|unique:categories',
                    'category_id'=>'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                   'name'=> 'min:2|required|unique:categories,name,'.$category->id,
                   'category_id'=>'required',
                   'statu_id'=>'required'
                ];
            }
            default:break;
        }
    }
}

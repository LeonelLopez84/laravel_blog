<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Tag;

class TagsRequest extends FormRequest
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
        $tag = Tag::find($this->tag);


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
                    'name'=>'min:2|required|unique:tags'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                   'name'=> 'min:2|required|unique:tags,name,'.$tag->id,
                   'statu_id'=>'required'
                ];
            }
            default:break;
        }
    }
}

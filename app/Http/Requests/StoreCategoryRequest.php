<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        return [
            'name' => 'required|min:2|max:255|unique:category,name,'.($this->id ?? '')
        ];
    }
    public function messsages(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute phải đủ từ 2-255 ký tự',
            'max' => ':attribute phải đủ từ 2-255 ký tự',
            'unique' => ':attribute đã tồn tại trong hệ thống'
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên danh mục sản phẩm',
        ];
    }
}

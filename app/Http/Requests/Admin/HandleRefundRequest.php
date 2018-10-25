<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

// 校验运营人员处理退款的请求
class HandleRefundRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'agree'  => ['required','boolean'],
            'reason' => ['required_if:agree,false'], // 拒绝退款时需要输入拒绝理由
        ];
    }
}

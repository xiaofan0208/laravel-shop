<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class SendReviewRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     "reviews" => array:1 [▼
        0 => array:3 [▼
          "id" => "9"
          "rating" => "5"
          "review" => null
        ]
      ]
     */
    public function rules()
    {
        return [
            'reviews'      => ['required', 'array'],
            'reviews.*.id' => [
                'required',
                // $this->route('order') 可以获得当前路由对应的 order 订单对象
                // Rule::exists() 判断用户提交的 ID 是否属于此订单。
                Rule::exists('order_items','id')->where('order_id' , $this->route('order')->id )
            ],
            'reviews.*.rating' => ['required', 'integer', 'between:1,5'],
            'reviews.*.review' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'reviews.*.rating' => '评分',
            'reviews.*.review' => '评价',
        ];
    }
}

<?php

namespace Modules\Profile\Http\Library\Services;

Class PaymentService
{
    public function pay($payment, $user, $request)
    {
        $status = rand(0, 2);

        if($status != 1) {

            $user->balance += $request->value;
            $user->save();

            $payment->create([
                'value' => $request->value,
                'user_id' => $user->id,
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect('profile/' . $user->id . '/payment/result')->with('success', 'Ваш счет успешно пополнен!');

        } else {

            return redirect('profile/' . $user->id . '/payment/result')->with('error', 'Ваш счет не пополнен! Проверьте данные');
        }
    }
}
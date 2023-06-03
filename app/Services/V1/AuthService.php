<?php


namespace App\Services\V1;



use App\Events\UserLogin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthService
{

    public function login(Request $request)
    {
        $user = User::where([
            ['mobile','=',$request->mobile],
            ['verifyCode','=',$request->code],
        ])->first();
        if ($user != null)
        {
            auth()->loginUsingId($user->id);
            return true;
        }
        else
            return  false;

    }

    /***
     * @param $mobile
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function register($mobile)
    {
        if (!User::where('mobile',$mobile)->exists())
        {
           $user = $this->createUser($mobile);
           event(new UserLogin($user));
           return  $user;
        }
        else
        {
            $user = User::where('mobile',$mobile)->first();
            event(new UserLogin($user));
            return  $user;
        }
    }

    /***
     * @param $mobile
     * @return User
     */
    public function createUser($mobile)
    {
        $user = new User();
        $user->mobile = $mobile;
        $user->verifyCode = $this->generateVerifyCode();
        $user->codeExpireTime = Carbon::now()->addMinutes(30);
        $user->save();
        return $user;
    }

    /***
     * @return int
     */
    public function generateVerifyCode()
    {
        return 11111;
    }
}
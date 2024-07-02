<?php

namespace App\Http\Controllers\Client;

use App\Functions\WhatsApp;
use App\Http\Controllers\BasicController;
use App\Http\Requests\Client\ForgetRequest;
use App\Http\Requests\Client\LoginRequest;
use App\Http\Requests\Client\ProfileRequest;
use App\Http\Requests\Client\RegisterRequest;
use App\Http\Requests\Client\UpdateProfileRequest;
use App\Mail\ResetPassword;
use App\Rules\PhoneLength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\Address\Entities\Model;
use Modules\Client\Entities\Model as Client;
use Modules\Order\Entities\Model as Order;
use Modules\Address\Entities\Model as Address;

class AuthController extends BasicController
{

    public function orderView(Request $request)
    {
        $Order = Order::with(['client', 'address', 'address.country', 'address.region', 'Delivery', 'Payment', 'OrderProducts', 'OrderProducts'])->where('id', $request->orderId)->first();
        // dd($Order);
        return response()->json(['order' => $Order]);
    }


    public function login(LoginRequest $request)
    {
        if (auth('client')->attempt(['phone_code' => '+'.$request['phone_code'], 'phone' => $request['phone'], 'password' => $request['password'], 'status' => 1])) {

            $this->convertGuestDataToClient();

            session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.loginSuccessfully')]);
            return redirect()->route('Client.home');
        }

        session()->flash('toast_message', ['type' => 'error', 'message' => __('trans.invalid_login_credentials')]);
        return redirect()->back();
    }


    public function register(RegisterRequest $request)
    {
        $client = Client::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_code' => '+'.$request->register_phone_code,
            'country_code' => $request->register_country_code,
            'phone' => $request->register_phone,
            'password' => bcrypt($request->password),
        ]);

        auth('client')->login($client);
        $this->convertGuestDataToClient();

        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.loginSuccessfully')]);
        return redirect()->route('Client.login');
    }




    public function account(ProfileRequest $request)
    {
        $client_id = client_id();
        Client::where('id', auth('client')->id())->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'phone_code' => $request->get('phone_code'),
            'country_code' => $request->get('country_code'),
            // 'password' => bcrypt($request->get('password')),
        ]);
        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.profile_updated_successfully')]);
            // return redirect()->route('Client.home');
        return redirect()->route('Client.account');
    }

    /*** get account page ***/
    public function getAccountPage()
    {
        $client_id = client_id();
        $Orders = Order::query()->where('client_id', client_id())->get();
        $addresses=Address::where('client_id', $client_id)->get();
        return view('client.login.my-account', compact('Orders','addresses'));
    }


    // To convert [wishlist, orders, addresses, cart] of guest to client
    public function convertGuestDataToClient()
    {
        $guest_id = session()->get('client_id');
        if ($guest_id) {
            DB::table('wishlist')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
//            DB::table('orders')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
//            DB::table('addresses')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
//            DB::table('cart')->where('client_id', $guest_id)->update(['client_id' => auth('client')->id()]);
        }
    }


    public function updateAccountDetails(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        // Update email if provided
        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        // Update password if provided
        if ($request->filled('password')) {
            // Validate current password
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => __('trans.provided_password_does_not_match')]);
            }

            // Update password
            $user->password = Hash::make($request->password);
        }
        $user->save();

        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.profile_updated_successfully')]);

        return redirect()->back();
    }


    public function sendResetLinkEmail(Request $request)
    {
        $client = Client::where('email', $request->nameOrEmail)->orWhere('name', $request->nameOrEmail)->first();

        if (!$client) {
            session()->flash('toast_message', ['type' => 'error', 'message' => __('trans.invalid_data_credentials')]);
            return redirect()->back();
        }


        // Generate a password reset token and save it in the database
        $token = app('auth.password.broker')->createToken($client);

        // Send the email with the password reset link
        Mail::to(['apps@emcan-group.com', setting('email'), $client->email])->send(new ResetPassword($token));


        //        Mail::send('emails.password_reset', ['token' => $token], function ($message) use ($client) {
        //            $message->to($client->email)->subject('Password Reset');
        //        });


        return 'f';

        return response()->json(['message' => 'Password reset email sent']);
    }


    // public function forget(ForgetRequest $request)
    // {
    //     Client::where('phone', $request->phone)->update(['password' => Hash::make($request->password)]);
    //     $Client = Client::where('phone', $request->phone)->first();
    //     auth('client')->login($Client);
    //     toast(__('trans.loginSuccessfully'), 'success');

    //     return redirect()->route('Client.home');
    // }


    // public function logout()
    // {
    //     if (auth('client')->check()) {
    //         auth('client')->logout();
    //     }
    //     session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.logoutSuccessfully')]);

    //     return redirect()->route('Client.login');
    // }


    // Determine username or email
    public function usernameOrEmail($credentials)
    {
        // Check if the provided input is a valid email address
        $isEmail = filter_var($credentials['username_or_email'], FILTER_VALIDATE_EMAIL);

        // Attempt authentication using email or username
        if ($isEmail) {
            $field = 'email';
        } else {
            $field = 'name';
        }
        return $field;
    }


    public function profile(Request $request)
    {
        $client_id = client_id();
        Client::where('id', auth('client')->id())->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        toast(__('trans.updatedSuccessfully'), 'success');

        return redirect()->route('client.profile');
    }
    public function otpPage($id, Request $request)
    {

        //    dd(decrypt($id));
        return view('client.login.otpPage', ['id' => $id]);
    }
    public function Resend(Request $request)
    {
        $Client = Client::where('id', decrypt($request->ssh))->first();
        $Client->update([
            'otp' => WhatsApp::SendOTP($Client->phone_code . $Client->phone)
        ]);
    }
    public function restPasswordPage($id, Request $request)
    {
        return view('client.login.restPasswordPage', ['id' => $id]);
    }

    public function restPassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $Client = Client::where('id', decrypt($request->ssh))->first();

        if (Hash::check($request->password, $Client->password)) {
            session()->flash('toast_message', ['type' => 'error', 'message' => __('trans.New Password must be different from Current Password')]);
            return redirect()->back();
        }
        $Client->update([
            "password" => bcrypt($request->password),
            "password_confirmation" => bcrypt($request->password_confirmation),
        ]);
        
        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.Reset password successfully')]);

        return redirect()->route('Client.login');
    }



    public function sendOtp(Request $request)
    {
        $Client = Client::where('id', decrypt($request->ssh))->first();
        if ($Client->otp == $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4 . $request->digit5 . $request->digit6) {
            return redirect(route('Client.restPasswordPage', encrypt($Client->id)));
        } else {
            toast(__('trans.invaild otp'), 'error');

            return redirect()->back();
        }
    }



    public function forget(Request $request)
    {
        $this->validate($request, [
            'phone' => ["required", new PhoneLength($request->input('country_code'), $max = 8), "exists:clients,phone"],
        ]);

        $Client = Client::where('phone', $request->phone)->where('country_code', $request->country_code)->first();

        $Client->update([
            'otp' => WhatsApp::SendOTP('+'.$request->phone_code . $request->phone)
        ]);

        return redirect(route('Client.otpPage', encrypt($Client->id)));
    }

    public function logout(Request $request)
    {
        if (auth('client')->check()) {
            auth('client')->logout();
            $request->session()->flush();
            // $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        toast(__('trans.logoutSuccessfully'), 'success');

        return redirect()->route('Client.home');
    }

    public function updateLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,ar', // Add other languages as needed
        ]);
    
        $user = Auth::guard('client')->user();
        $user->language = $request->language;
        $user->save();
        session()->flash('toast_message', ['type' => 'success', 'message' => __('trans.Language preference updated successfully.')]);

        return redirect()->back();
    }
    
}//end of class

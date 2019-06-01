<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function redirectProvider($social){
        return Socialite::driver($social)->redirect();
    }
    public function handleProviderCallback($social){
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return back()->with('thongbao','Đăng nhập thành công');
    }
    private function findOrCreateUser($user){
        $authUser = User::where('social_id',$user->id)->first();
        if($authUser){
            return $authUser;
        }else{
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'social_id' => $user->id,
                'ruler' => 0,
                'status' => 0,
                'avatar' => $user->avatar,
            ]); 
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return back(->)with('thongbao','Đăng xuất thành công');
        }
    }
    public function updatePassClient(Request $request){
        $this->validate($request,
            [
                'password' => 'required|min:6|max:255',
                're_password' => 'required|same:password',
            ],
            [
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
                'password.max' => 'Mật khẩu tối đa có 255 ký tự',
                're_password.required' => 'Không được bỏ trống',
                're_password.same' => 'Nhập không đúng với trường mật khẩu',
            ]
        );
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('thongbao','Đã cập nhật thành công mật khẩu');
    }
    public function loginClient(Request $request){
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            return back()->with('thongbao','Đăng nhập thành công');
        }else{
            return back()->with('error','Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }
    public function registerClient(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:255',
                're_password' => 'required|same:password',
            ],
            [
                'name.required' => 'Họ và tên không được bỏ trống',
                'name.min' => 'Họ và tên phải có tối thiểu 2 ký tự',
                'name.max' => 'Họ và tên tối đa có 255 ký tự',
                'email.required' => 'Địa chỉ email không được bỏ trống',
                'email.email' => 'Địa chỉ email nhập không đúng định dạng',
                'email.unique' => 'Đã tồn tại địa chỉ email trong hệ thống',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
                'password.max' => 'Mật khẩu tối đa có 255 ký tự',
                're_password.required' => 'Không được bỏ trống',
                're_password.same' => 'Nhập không đúng với trường mật khẩu',
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return back()->with('thongbao','Đăng ký tài khoản thành công');
    }
}

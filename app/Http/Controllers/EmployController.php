<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use App\Models\employ;

class EmployController extends Controller
{
    public function index(Request $req){
        if($req->query('like')){
            $like = $req->query('like');
            
            return response(Employ::where('name','like',"%{$like}%")->orWhere('country','like',"%{$like}%")->get())
            ->header('access-control-allow-origin','*');
        }
        if($req->query('id')){
            $id = $req->query('id');
            return response(Employ::where('id',$id)->get())->header('access-control-allow-origin','http://localhost:801/api_on_laravel/public/');
        }
        $data = 'ab';
        return response(Employ::all())->header('access-control-allow-origin','*');
    }

    public function create(Request $req){
        
        $data = json_decode(file_get_contents("php://input"),true);
        if(!empty($data['name']) &&!empty($data['country']) &&!empty($data['phone']) &&!empty($data['address']) ){
        $name = $data['name'];
        $phone = $data['phone'];
        $address = $data['address'];
        $country = $data['country'];
            employ::create([
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'country' => $country,
            ]);
            return response(['message'=>"Data Inserted Successfully",'status'=>'Ok']);

        }else{
            return response(['message'=>"Data Cannot be Inserted",'status'=>'Fail']);
        }
    
        }
        public function update(Request $req){
        
            $data = json_decode(file_get_contents("php://input"),true);
            if(!empty($data['id']) && !empty($data['name']) &&!empty($data['country']) &&!empty($data['phone']) &&!empty($data['address']) ){
                $id = $data['id'];
            $name = $data['name'];
            $phone = $data['phone'];
            $address = $data['address'];
            $country = $data['country'];
                employ::where('id',$id)->update([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'country' => $country
                ]);
                return response(['message'=>"Data Updated Successfully",'status'=>'Ok']);
    
            }else{
                return response(['message'=>"Data Cannot be Inserted",'status'=>'Fail']);
            }
        
    }

    public function delete(Request $req,$id){
            employ::destroy($id);
         return response(["message"=>"Employ Deleted Successfully"]);
        }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function getUsers(Request $request) {

        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc

        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')
            ->where('is_active', 1)
            ->where(function ($totalRecordswithFilter) use ($request) {
                $privilege = json_decode(json_encode($request->get('columns')[0]))->search->value;
                $name = json_decode(json_encode($request->get('columns')[1]))->search->value;
                $email = json_decode(json_encode($request->get('columns')[2]))->search->value;

                if(!empty($privilege)) {
                    $totalRecordswithFilter->where('privilege_id', $privilege);
                }

                if(!empty($name)) {
                    $totalRecordswithFilter->where('name', 'LIKE', '%' . $name . '%');
                }

                if(!empty($email)) {
                    $totalRecordswithFilter->where('email', 'LIKE', '%' . $email . '%');
                }
            })
            ->count();

        // Fetch records
        $users = User::orderBy($columnName, $columnSortOrder)
            ->where('is_active', 1)
            ->where(function ($records) use ($request) {
                $privilege = json_decode(json_encode($request->get('columns')[0]))->search->value;
                $name = json_decode(json_encode($request->get('columns')[1]))->search->value;
                $email = json_decode(json_encode($request->get('columns')[2]))->search->value;

                if(!empty($privilege)) {
                    $records->where('privilege_id', $privilege);
                }

                if(!empty($name)) {
                    $records->where('name', 'LIKE', '%' . $name . '%');
                }

                if(!empty($email)) {
                    $records->where('email', 'LIKE', '%' . $email . '%');
                }
            })
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach($users as $user){

            $user->date = explode(' ', $user->created_at)[0];

            $datas = array(
                "id" => $user->id,
                "name" => $user->name,
                "privilege" => $user->privilege->nm_privilege,
                "email" => $user->email,
                "date" => $user->date,
            );

            array_push($data_arr, $datas);
        }

        $response = array(
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $data_arr
        );

        return response()->json($response, 200);
    }
}

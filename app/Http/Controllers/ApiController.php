<?php

namespace App\Http\Controllers;

use App\Models\CustomWebinarName;
use App\Models\ExtensionScanResults;
use App\Models\TokenGroupExtension;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function GroupGetData(Request $request): \Illuminate\Http\JsonResponse
    {
        $t = $request->input();
        if (isset($t['t'])) {
            $token = TokenGroupExtension::where('token', $t['t'])->first();
            if (isset($token->group_id)) {
                $users = User::where('group_id', $token->group_id)->get(['id', 'sname', 'name', 'vk_id']);
                $data = [];
                foreach ($users as $user) {
                    if (CustomWebinarName::where('user_id', $user['id'])->exists()) {
                        array_push($data, ['id' => $user['id'], 'name' => CustomWebinarName::where('user_id', $user['id'])->first('name')->name, 'vk_id' => $user['vk_id']]);
                    } else {
                        array_push($data, ['id' => $user['id'], 'name' => ($user->sname . " " . $user->name), 'vk_id' => $user['vk_id']]);
                    }
                }
                return response()->json($data);
            }
        }
        return response()->json(['status' => 'error', 'msg' => 'Invalid token']);
    }

    public function ObtainData(Request $request): \Illuminate\Http\JsonResponse
    {
        $t = $request->input();
        if (isset($t['t'])) {
            if (isset($t['data']) and mb_strlen($t['data']) > 1) {
                $token = TokenGroupExtension::where('token', $t['t'])->first();
                if (isset($token->group_id)) {

                    $scan = new ExtensionScanResults();
                    $scan->group_id = $token->group_id;
                    $scan->data = $t['data'];
                    $scan->save();
//                    return response()->json(json_decode($scan->data));
                    return response()->json(['status' => 'ok', 'msg' => 'Save successfully', 'data' => $scan->id]);
                }
            } else {
                return response()->json(['status' => 'error', 'msg' => 'Data missing']);
            }
        }
        return response()->json(['status' => 'error', 'msg' => 'Invalid token']);
    }
    public function NotifyUser(Request $request): \Illuminate\Http\JsonResponse
    {
        $t = $request->input();
        if (isset($t['t'])) {
                $token = TokenGroupExtension::where('token', $t['t'])->first();
                return response()->json(['status' => 'ok', 'msg' => 'Notification sent successfully']);
//                if (isset($token->group_id)) {
//                    $scan = new ExtensionScanResults();
//                    $scan->group_id = $token->group_id;
//                    $scan->data = $t['data'];
//                    $scan->save();
////                    return response()->json(json_decode($scan->data));
//                    return response()->json(['status' => 'ok', 'msg' => 'Save successfully']);
//                }
        }
        return response()->json(['status' => 'error', 'msg' => 'Invalid token']);
//        return response()->json(['status' => 'error', 'msg' => 'Too many requests']);
    }
}

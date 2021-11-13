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
                $users = User::where('group_id', $token->group_id)->get(['id', 'sname', 'name']);
                $data = [];
                foreach ($users as $user) {
                    if (CustomWebinarName::where('user_id', $user['id'])->exists()) {
                        array_push($data, ['id' => $user['id'], 'name' => CustomWebinarName::where('user_id', $user['id'])->first('name')->name]);
                    } else {
                        array_push($data, ['id' => $user['id'], 'name' => ($user->sname . " " . $user->name)]);
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
            if (isset($t['data'])) {
                $token = TokenGroupExtension::where('token', $t['t'])->first();
                if (isset($token->group_id)) {
                    $scan = new ExtensionScanResults();
                    $scan->group_id = $token->group_id;
                    $scan->data = $t['data'];
                    $scan->save();
                    return response()->json(['status' => 'ok', 'msg' => '']);
                }
            }
        }
        return response()->json(['status' => 'error', 'msg' => 'Invalid token']);
    }
}

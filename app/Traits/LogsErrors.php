<?php

namespace App\Traits;

use App\Models\ErrorLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait LogsErrors
{
    public function logError($module, $action, \Throwable $e, $input = [])
    {
        try {
            ErrorLog::create([
                'module' => $module,
                'action' => $action,
                'message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'input' => json_encode(collect($input)->except(['_token', '_method'])),
                'user_id' => Auth::id(),
                'status' => 'Needs Fix',
            ]);
        } catch (\Throwable $logError) {
            Log::error("Failed to log error to DB: " . $logError->getMessage());
        }
    }
}

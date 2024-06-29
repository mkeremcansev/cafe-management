<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class AutoDeployController extends Controller
{
    public function autoDeploy(Request $request): void
    {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');     $localToken = config('app.auto-deploy-secret');
        $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);     if (hash_equals($githubHash, $localHash)) {
        $root_path = base_path();
        $process = new Process([
            'cd ' . $root_path . '; ./deploy.sh'
        ]);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });
    }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeployController extends Controller
{
    public function deploy(Request $request){
        $migration = new Process("git pull origin master");

        $migration->setWorkingDirectory(base_path());

        $migration->run();

        if($migration->isSuccessful()){
            return response()->json(['success' => 'Repositorio actualizado sastifactoriamente...']);
        } else {
            return response()->json(['error' => $migration]);
            //throw new ProcessFailedException($migration);
        }
    }
}

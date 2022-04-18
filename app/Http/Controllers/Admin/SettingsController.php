<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }
    public function postHome(Request $request)
    {
        if( !file_exists(config_path().'/madecms.php')){
            fopen(config_path().'/madecms.php','w');
        }
        $file = fopen(config_path().'/madecms.php','w');
        fwrite($file, "<?php ".PHP_EOL);
        fwrite($file, "return [".PHP_EOL);
        foreach ($request->except('_token') as $key => $value) {
            if(is_null($value)){
                fwrite($file, '\'' . $key . '\'=>' . '\'\',' . PHP_EOL);
            } else {
                fwrite($file, '\'' . $key . '\'=>' . '\'' . $value . '\',' . PHP_EOL);
            }
        }
        fwrite($file, "];".PHP_EOL);

        fclose($file);
        return redirect()->back()->with('success','Configuraciones guardadas con exito');
    }
}

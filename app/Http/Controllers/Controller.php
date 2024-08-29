<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

      
    /**
     * @var string for validation
     */
    protected $pageTitleValidate = 'nullable|min:3';
    protected $metadescValidate = 'nullable|min:50|max:150';
    protected $statusValidate = 'sometimes|in:on';
    protected $metakeywordsValidate = 'nullable|min:3';

    protected function slugValidate(string $tableName, $ignoreId = null): string
    {
        $uniqueRule = Rule::unique($tableName);

        if ($ignoreId !== null) {
            $uniqueRule->ignore($ignoreId);
        }

        return 'required|' . $uniqueRule . '|min:3|regex:/^[a-z0-9-]+$/';
    }



    /**
     * @param $value = $request->slug
     * return ('active' || 'inactive')
     */
    protected function status($value): String
    {
        return $value == 'on' ? "active" : "inactive";
    }


    public function uploadImage($location = 'upload/', $image)
    {
        $filename = Str::uuid()->toString() . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($location, $filename);

        return $filename;
    }

}

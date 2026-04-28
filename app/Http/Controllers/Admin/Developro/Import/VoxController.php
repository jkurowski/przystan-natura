<?php

namespace App\Http\Controllers\Admin\Developro\Import;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

// CMS
use App\Services\Vox\RealEstateParser;

class VoxController extends Controller
{
    protected $parser;

    public function __construct(RealEstateParser $parser)
    {
        $this->parser = $parser;
    }

    public function index(Request $request, Investment $investment)
    {
        $vox_url = $investment->vox_url;
        $type = $request->input('type');

        if (!$vox_url) {
            return response()->json(['error' => 'VOX URL does not exist'], 404);
        }

        try {
            // Fetch XML content from the provided URL
            $xmlContent = file_get_contents($vox_url);

            if (!$xmlContent) {
                throw new \Exception('Failed to retrieve XML content from the URL');
            }

            // Parse the XML content
            $parsedData = $this->parser->parse($xmlContent);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch or parse XML',
                'message' => $e->getMessage(),
            ], 500);
        }

        if ($type === 'json') {
            return response()->json($parsedData);
        } elseif ($type === 'import') {
            // Import the properties into the database
            //$imported = $this->parser->importProperties($parsedData, $investment);

            //return redirect(route('admin.developro.investment.index'))->with('success', "Ilość lokali zaimportowanych: {$imported}");
            return redirect(route('admin.developro.investment.index'))->with('success', "Ilość lokali zaimportowanych");

        } else {
            // For the default case (view rendering)
            return view('admin.developro.vox.index', [
                'parsedData' => $parsedData,
                'investment' => $investment,
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Repositories\ImportRepository;
use App\Services\ImportService;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Http\Request;


class ImportController extends Controller
{
    /**
     * @var ImportService
     */
    private $importService;

    public function __construct(ImportService $importService)
    {
        $this->importService = $importService;
    }

    public function index()
    {
        return view('import');
    }


    public function run(Request $request)
    {
        if ($request->isMethod('post')) {

            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $filename = $file->move(public_path() . '/path', 'filename.xml');
            }
        }

        $xml = simplexml_load_file(public_path() . '/path/filename.xml');

//        $this->importRepository->parseXML($xml);
        $this->importService->parseXML($xml);

        return redirect(route('staff.index'));
    }
}

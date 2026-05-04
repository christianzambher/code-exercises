<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class UploadController extends Controller
{
    public function index(){
        return view('upload_form');
    }

    public function store() {
        $file = $this->request->getFile('file');

        if(!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'Archivo Invalido');
        }

        if ($file->hasMoved()) {
            return redirect()->back()->with('error', 'Archivo ya Procesado');
        }

        $validationRule = [
            'file' => [
                'label' => 'Archivo',
                'rules' => [
                    'uploaded[file]',
                    'max_size[file,2048]',
                    'ext_in[file,jpg,png,pdf]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            return redirect()->back()
                ->with('error', $this->validator->getError('file'));
        }

        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);

        return redirect()->back()->with('success', 'Archivo subido correctamente');
    }

    public function show($filename) {
        $path = WRITEPATH. 'uploads/'. $filename;
        if (!is_file($path)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Archivo no encontrado');
        }
        return $this->response->download($path, null);
    }
}
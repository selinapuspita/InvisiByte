<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class SteganografiController extends Controller
{
    public function encode(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:png',
            'message' => 'required|string',
        ]);

        // Pastikan folder uploads ada
        Storage::makeDirectory('public/uploads');

        // Buat nama file unik
        $fileName = time() . '_' . uniqid() . '.png';

        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $imageFullPath = storage_path("app/public/$filePath");

        // dd($imageFullPath, file_exists($imageFullPath));

        // Nama output juga harus unik
        $outputFileName = 'output_' . time() . '_' . uniqid() . '.png';
        $outputPath = storage_path('app/public/uploads/' . $outputFileName);


        // Path Python dari .env (Pastikan ada di .env: PYTHON_PATH="C:\\path\\to\\python.exe")
        $pythonPath = env('PYTHON_PATH', 'python');

        // Buat command
        $command = sprintf(
            '%s %s encode %s %s %s',
            escapeshellarg($pythonPath),
            escapeshellarg(base_path('python/steganografi.py')),
            escapeshellarg($imageFullPath),
            escapeshellarg($request->message),
            escapeshellarg($outputPath)
        );

        // Jalankan proses
        $process = Process::fromShellCommandline($command);
        $process->run();

        // Cek apakah berhasil
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Simpan nama file ke session untuk pesan sukses
        session()->flash('success', 'The message has been successfully encoded and downloaded.');

        // download otomatis output encode dan hapus file nya di storage
        // return response()->download($outputPath)->deleteFileAfterSend(true);

        // download otomatis output
        // return response()->download($outputPath);

        // Kembalikan JSON Response dengan URL file hasil encode
    return response()->json([
        'success' => true,
        'downloadUrl' => asset('storage/uploads/' . $outputFileName)
    ]);


    }

    


    public function decode(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:png',
        ]);

        // Pastikan folder uploads ada
        Storage::makeDirectory('public/uploads');
        
        $fileName = time() . '_' . uniqid() . '.png';

        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $imageFullPath = storage_path("app/public/$filePath");

        // Path Python dari .env
        $pythonPath = env('PYTHON_PATH', 'python');

        // Buat command
        $command = sprintf(
            '%s %s decode %s',
            escapeshellarg($pythonPath),
            escapeshellarg(base_path('python/steganografi.py')),
            escapeshellarg($imageFullPath)
        );

        // Jalankan proses
        $process = Process::fromShellCommandline($command);
        $process->run();

        // Cek apakah berhasil
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return response()->json(['message' => trim($process->getOutput())]);

    }

}

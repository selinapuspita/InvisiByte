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
    \Log::info("Mulai proses encoding...");
    \Log::info("Password untuk encoding: " . $request->password);

    try {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:png',
            'message' => 'required|string',
        ]);

        Storage::makeDirectory('public/uploads');

        $fileName = time() . '_' . uniqid() . '.png';
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
        $imageFullPath = storage_path("app/public/$filePath");

        \Log::info("Gambar disimpan di: " . $imageFullPath);

        // Kunci enkripsi
        $encryptionKey = env('APP_KEY');
        $cipher = 'aes-256-cbc';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));

        // Enkripsi pesan
        $encryptedMessage = openssl_encrypt($request->message, $cipher, $encryptionKey, 0, $iv);
        $encryptedMessageWithIV = base64_encode($iv . $encryptedMessage);

        \Log::info("Pesan terenkripsi: " . $encryptedMessageWithIV);

        $outputFileName = 'output_' . time() . '_' . uniqid() . '.png';
        $outputPath = storage_path('app/public/uploads/' . $outputFileName);

        \Log::info("Output file: " . $outputPath);

        $pythonPath = env('PYTHON_PATH', 'python');

        // Kirim pesan yang sudah dienkripsi ke Python
        $command = sprintf(
            '%s %s encode %s %s %s',
            escapeshellarg($pythonPath),
            escapeshellarg(base_path('python/steganografi.py')),
            escapeshellarg($imageFullPath),
            escapeshellarg($encryptedMessageWithIV),
            escapeshellarg($outputPath)
        );

        \Log::info("Perintah Python: " . $command);

        $process = Process::fromShellCommandline($command);
        $process->run();

        if (!$process->isSuccessful()) {
            \Log::error("Python gagal: " . $process->getErrorOutput());
            throw new ProcessFailedException($process);
        }

        \Log::info("Python sukses, hasil file: " . $outputPath);

        // Simpan nama file ke session untuk pesan sukses
        session()->flash('success', 'The message has been successfully encoded and downloaded.');
        
        return response()->json([
            'success' => true,
            'downloadUrl' => asset('storage/uploads/' . $outputFileName)
        ]);
    } catch (\Exception $e) {
        \Log::error("Error di encode: " . $e->getMessage());
        return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
    }
}



    public function decode(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:png',
    ]);

    \Log::info("=== DECODING MULAI ===");

    Storage::makeDirectory('public/uploads');

    $fileName = time() . '_' . uniqid() . '.png';
    $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
    $imageFullPath = storage_path("app/public/$filePath");

    \Log::info("File gambar disimpan di: " . $imageFullPath);

    $pythonPath = env('PYTHON_PATH', 'python');

    $command = sprintf(
        '%s %s decode %s',
        escapeshellarg($pythonPath),
        escapeshellarg(base_path('python/steganografi.py')),
        escapeshellarg($imageFullPath)
    );

    \Log::info("Perintah yang dijalankan: " . $command);

    $process = Process::fromShellCommandline($command);
    $process->run();

    if (!$process->isSuccessful()) {
        \Log::error("Error saat menjalankan script Python: " . $process->getErrorOutput());
        throw new ProcessFailedException($process);
    }

    // Pesan terenkripsi dikembalikan dari Python
    $encryptedMessageWithIV = trim($process->getOutput());
    \Log::info("Pesan terenkripsi dari gambar: " . $encryptedMessageWithIV);

    // Dekripsi pesan
    $encryptionKey = env('APP_KEY'); 
    $cipher = 'aes-256-cbc';
    $data = base64_decode($encryptedMessageWithIV);
    
    if (!$data) {
        \Log::error("Gagal decode base64 dari pesan terenkripsi!");
        return response()->json(['success' => false, 'message' => 'Gagal decode base64']);
    }

    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $ivLength);
    $encryptedMessage = substr($data, $ivLength);

    \Log::info("IV: " . base64_encode($iv));
    \Log::info("Pesan terenkripsi tanpa IV: " . base64_encode($encryptedMessage));

    $decryptedMessage = openssl_decrypt($encryptedMessage, $cipher, $encryptionKey, 0, $iv);

    if (!$decryptedMessage) {
        \Log::error("Gagal mendekripsi pesan! Kunci mungkin salah.");
        return response()->json(['success' => false, 'message' => 'Password salah atau terjadi kesalahan saat decoding.']);
    }

    \Log::info("Pesan setelah dekripsi: " . $decryptedMessage);

    return response()->json(['success' => true, 'message' => $decryptedMessage]);
}



}

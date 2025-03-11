<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller {
    public function index() {
    }
    public function show(string $id) {
        $reader = Reader::with('books')->find($id);
        $bookCount = $this->getBookCount($id);
        return view('reader', compact('reader', 'bookCount'));
    }
    public function getBookCount($readerId) {
        $count = DB::select('SELECT COUNT(*) as count FROM deliveries WHERE reader_id = ?', [$readerId]);
        return $count[0]->count ?? 0;
    }
}

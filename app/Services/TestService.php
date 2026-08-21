<?php

use Illuminate\Support\Facades\Log;

class TestService{
    public function public(){
        Log::info('This is a public function');
    }
    private function private(){
        Log::info('This is a private function');
    }
}

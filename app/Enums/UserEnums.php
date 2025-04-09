<?php

namespace App\Enums;

enum UserEnums: string {
    case USER = 'user';
    case ADMIN = 'admin';

    public function label(){
        return match($this){
            UserEnums::USER => 'User',
            UserEnums::ADMIN => 'Admin',
        };
    }
}

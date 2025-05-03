<?php

namespace App\Enums;

enum PostStatusEnum: string {
    case DRAFT = 'draft';
    case PUBLISHED = 'published';

    public function label(){
        return match($this){
            PostStatusEnum::DRAFT => 'Draft',
            PostStatusEnum::PUBLISHED => 'Published',
        };
    }

}

<?php

namespace App\Enums;

enum PostStatusEnum: string {
    case PUBLISHED = 'published';
    case DRAFT = 'draft';

    public function label() {
        return match ($this) {
            PostStatusEnum::PUBLISHED => 'Published',
            PostStatusEnum::DRAFT => 'Draft',
        };
    }

}

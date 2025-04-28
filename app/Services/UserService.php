<?php

namespace App\Services;

use App\Models\User;

class UserService {

    public function store(array $data, $image = null) {
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if ($image) {
            $user->addMedia($image)->toMediaCollection();
        }

    }

    public function update(array $data, User $user, $image = null) {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        if ($image) {
            if ($user->hasMedia()) {
                $user->clearMediaCollection();
            }
            $user->addMedia($image)->toMediaCollection();
        }

    }
}

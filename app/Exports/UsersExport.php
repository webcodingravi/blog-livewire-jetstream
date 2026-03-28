<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return User::role(['user', 'author'])->get();
    }

    public function map($user): array
    {

        return [
            $user->id,
            $user->name,
            $user->email,
            $user->profile_photo_path ?? 'N/A',
            $user->getRoleNames()->implode(', '),

        ];

    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Email', 'Profile Photo', 'Role'];
    }
}

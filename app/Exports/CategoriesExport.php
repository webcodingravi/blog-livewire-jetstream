<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Category::all();
    }

    public function map($category): array
    {
        return [
            $category->id,
            $category->name,
            $category->slug,
            $category->status ? 'Active' : 'Inactive',
            $category->created_at->format('Y-m-d'),
        ];
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Slug', 'Status', 'Created Date'];
    }
}

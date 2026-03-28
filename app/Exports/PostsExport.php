<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return Collection
     */
    public function collection()
    {
        return Post::with(['category:id,name', 'user:id,name'])->get();
    }

    public function map($post): array
    {

        return [
            $post->id,
            $post->title,
            $post->slug,
            $post->image ?? 'N/A',
            $post->category->name ?? 'N/A',
            $post->user->name ?? 'N/A',
            $post->status == 'draft' ? 'Draft' : 'Published',
            $post->created_at->format('Y-m-d'),

        ];

    }

    public function headings(): array
    {
        return ['ID', 'Title', 'Slug', 'Image', 'Category', 'Created By', 'Status', 'Created Date'];
    }
}

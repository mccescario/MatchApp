<?php

namespace App\Orchid\Screens\Sports;

use App\Models\SportCategory;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class SportCategoryFormScreen extends Screen
{
    public $category;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(SportCategory $sportCategory): iterable
    {
        return [
            'category' => $sportCategory,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ?
            _('Edit ') . $this->category->name :
            _('Register New Sport Category');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Delete')
                ->icon('trash')
                ->class('btn btn-danger')
                ->method('deleteCategory')
                ->canSee($this->category->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('category.name')
                    ->title('Category Name'),
                Button::make('Save')
                    ->class('btn btn-success')
                    ->method('createOrUpdateCategory'),
            ])
        ];
    }

    public function createOrUpdateCategory(SportCategory $sportCategory, Request $request)
    {
        $request->validate([
            'category.name' => 'required|max:255'
        ]);

        if ($sportCategory->id) {
            $sportCategory->update($request->get('category'));
            Toast::success('You have successfully updated sports category');
        } else {
            SportCategory::create($request->get('category'));
            Toast::success('You have successfully created sports category');
        }

        return redirect()->route('sports.category.list');
    }

    public function deleteCategory(SportCategory $sportCategory)
    {
        if ($sportCategory->sports()->count() > 0) {
            Toast::error('Category has sports, delete sports under category first');
            return;
        } else {
            $sportCategory->delete();

            Toast::success('Category has been deleted');

            return redirect()->route('sports.category.list');
        }
    }

    public function permission(): ?iterable
    {
        return [
            'admin'
        ];
    }
}

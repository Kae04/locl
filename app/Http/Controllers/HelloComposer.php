<php

namepace App\Http\composers;

use Illuminate\View\View;

class Hello Composer
{
    public function compose(View $view)
    {
        $view->with('msg', $view->getName() . 'です');
    }
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Models\Category;
use App\Models\Post;
use App\Models\Person;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()

    {
        $cate_total = Category::all()->count();
        $post_total = Post::all()->count();
        $person_total = Person::all()->count();

        $post_new_footer = Post::where('status',1)->orderBy('date_update', 'DESC')->paginate(3);
        $post_hot_footer = Post::where('post_hot',1)->where('status',1)->orderBy('date_update', 'DESC')->paginate(3);
        $post_hot = Post::where('post_hot',1)->where('status',1)->orderBy('date_update', 'DESC')->paginate(4);
        $post_random = Post::where('status', 1)->inRandomOrder()->take(4)->get();


        View::share([
            'post_new_footer'=>$post_new_footer,
            'post_hot_footer'=>$post_hot_footer,
            'post_random'=>$post_random,
            'post_hot'=>$post_hot,

            'cate_total'=>$cate_total,
            'post_total'=>$post_total,
            'person_total'=>$person_total,
        ]);

        Blade::directive('tableOfContents', function ($expression) {
            return "<?php echo app('App\Http\Controllers\PostController')->generateTableOfContents($expression); ?>";
});

}
}
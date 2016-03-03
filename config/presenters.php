<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Presenters
    |--------------------------------------------------------------------------
    |
    | Define your objects and their corrosponding presenters here to have them
    | automatically decorated when resolved in a view. The array key should
    | be your object and the value will be the presenter. Remember to use
    | the class names and not actual instances.
    |
    */

    emutoday\Page::class => emutoday\Presenters\PagePresenter::class,
    emutoday\Post::class => emutoday\Presenters\PostPresenter::class,
    emutoday\User::class => emutoday\Presenters\UserPresenter::class,


];

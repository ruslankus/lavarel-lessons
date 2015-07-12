<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        Hello {!! $user->name !!} <span class="caret"></span>
    </a>

    <ul class="dropdown-menu">
        <li><?=link_to_action('AdminController@getLogout','Logout'); ?></li>

    </ul>
</li>
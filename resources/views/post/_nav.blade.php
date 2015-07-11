<nav>
    <ul style="display: table-row; list-style: none">
        <li style="display: table-cell; padding: 20px;" ><?php echo link_to_route('post_main','Main');?></li>
        <li style="display: table-cell; padding: 20px;">
            {!! link_to_action('PostController@show','List Posts') !!}
        </li>
        <li style="display: table-cell; padding: 20px;">{!! link_to_route('post.create','Form') !!}</li>
    </ul>
</nav>
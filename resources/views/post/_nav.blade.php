<nav>
    <ul style="display: table-row; list-style: none">
        <li style="display: table-cell; padding: 20px;" ><?php echo link_to_route('post','Main');?></li>
        <li style="display: table-cell; padding: 20px;">
            <?php echo link_to('post/show','List','')?>
        </li>
        <li style="display: table-cell; padding: 20px;">{!! link_to_route('post.create','Form') !!}</li>
    </ul>
</nav>
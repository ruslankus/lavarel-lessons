
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null,['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    <?=Form::label('body', 'Article text')?>
    <?=Form::textarea('body',null,['class' => 'form-control'] ) ?>
</div>

<div class="form-group">
    {!! Form::label('tag_list','Tags:') !!}
    {!! Form::select('tag_list[]',$tags,null,['id' => 'tags_list', 'class' => 'form-control','multiple']) !!}
</div>


<div class="form-group">
    <?=Form::label('published_at', 'Published on')?>
    <?=Form::input('date',"published_at",date("Y-m-d"),['class' => 'form-control'] ) ?>
</div>

<div class="form-group">

    <?=Form::submit($buttonText ,['class' => 'btn btn-primary form-control'] ) ?>
</div>
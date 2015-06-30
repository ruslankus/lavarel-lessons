<h4>Leave feedback</h4>
<table>
    <tr>
        <td>From</td>
        <td>
            <?=Form::text('name',$request->input('name'), ['class' => 'form-control']) ?>
            @if(!empty($messages))
            <?=$messages->first('name','<p>:message</p>')?>
            @endif
        </td>
    </tr>
    <tr>
        <td>Mail</td>
        <td>
            <?=Form::text('mail',$request->input('mail'), ['class' => 'form-control']) ?>
            @if(!empty($messages))
                <?=$messages->first('mail','<p>:message</p>')?>
            @endif
        </td>
    </tr>

    <tr>
        <td>City</td>
        <td>
            {!! Form::select('city', $citySelect, ['class' => 'form-control']);!!}</td>
    </tr>

    <tr>
        <td>Mood</td>
        <td>
            <?php $i=0; foreach($moodSelect as $key => $value):

                $checked = ($i == 0)? 'checked': '';
            ?>
            <label><?=$value ?></label>
            <?=Form::radio('mood', $key,$checked)  ?>
            <?php $i++; endforeach;?>
        </td>
    </tr>

    <tr>
        <td>Feedback text</td>
        <td>
            <?=Form::textarea('content',$request->input('content'), ['class' => 'form-control']) ?>
            @if(!empty($messages))
                <?=$messages->first('content','<p>:message</p>')?>
            @endif
        </td>
    </tr>
    <tr>
        <td></td>
        <td>{!! Form::submit() !!}</td>
    </tr>
</table>
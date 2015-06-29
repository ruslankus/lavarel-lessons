@extends('main')


@section('content')

<section id="list">
    <h3>Feedback list</h3>
    <div class="list">
        <div class="item">
            <p>From: Vasia Pupkin</p>
            <p>Date : 2015 10 34</p>
            <p>Text fdsfdsf, fdfds,,dfdsfds,, ,fdsfds,fdsfds, ,dfdsf</p>
            <hr />
        </div>

        <div class="item">
            <p>From: Vasia Pupkin</p>
            <p>Date : 2015 10 34</p>
            <p>Text fdsfdsf, fdfds,,dfdsfds,, ,fdsfds,fdsfds, ,dfdsf</p>
            <hr />
        </div>

        <div class="item">
            <p>From: Vasia Pupkin</p>
            <p>Date : 2015 10 34</p>
            <p>Text fdsfdsf, fdfds,,dfdsfds,, ,fdsfds,fdsfds, ,dfdsf</p>
            <hr/>
        </div>
    </div>
</section>

<section id="form">
    <form method="post" action="#">
        <table>
            <tr>
                <td>From</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="text" /></td>
            </tr>
            <tr>
                <td>Feedback text</td>
                <td><textarea></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" /></td>
            </tr>
        </table>
    </form>
</section>
@stop

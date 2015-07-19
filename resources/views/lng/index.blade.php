@include('lng._panel')
<h3>Index</h3>
<a href="<?=action('LangController@getShow',['lng' => App::getLocale()])?>">Link to show</a>
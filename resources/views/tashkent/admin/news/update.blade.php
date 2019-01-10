{{ Form::model(\App\tashkent\Article::class) }}

{{ Form::text('title', $article->title) }}

{{ Form::text('link', $article->link) }}

{{ Form::submit() }}

{{ Form::close() }}
@extends('layout')

@section('link')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="congratulations-page">
                <div class="title-congratulation-page">
                    <span>Поздравления</span>
                </div>
                <div class="congratulations-page-content">
                    <div class="tags">
                        <span class="title-tags">Годы выпуска</span>
                        <div class="tags-content">
                            <?php for ($i=1940;$i<2020;$i+=10) {
                                $next = $i + 10; $next = substr($next, 2);
                                if($next == 20){
                                    $next = 18;
                                }?>
                                <span class="item-tag"><?php echo $i.' - '.$next; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">
                        <?php for ($i=0;$i<8;$i++) { ?>
                        <div class="item-congratulations-page">
                            <img class="img-item-congratulations img-thumbnail" src="http://img.over-blog-kiwi.com/1/54/00/21/20160804/ob_83b112_025pikachu-xy-anime-3.png" alt="">
                            <div class="content-item-congratulations">
                                <span class="title-item-congratulations">Заголовок заголовок Заголовок заголовок<br></span>
                                <span class="text-item-congratulations">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur assumenda doloribus minus necessitatibus quibusdam quidem repellendus repudiandae.</span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
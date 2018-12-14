@extends('layout')

@section('link')
@endsection

@section('content')
    <div class="container" style="padding-bottom: 100px;">
        <div class="row">
            <div class="congratulations-page  col-xl-12">
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
                        @foreach($congratulations as $element)
                            <div class="item-congratulations-page">
                                <img class="img-item-congratulations img-thumbnail" src={{ $element->mainPhoto->path }} alt="">
                                <div class="content-item-congratulations">
                                    <span class="title-item-congratulations">{{ $element->title }}<br></span>
                                    <span class="text-item-congratulations">{{ $element->content }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    3
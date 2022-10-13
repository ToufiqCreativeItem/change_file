<div class="suggest-wrap d-flex gap-3 flex-wrap my-3">
    @foreach ($suggestedpages as $suggestedpage)
        <div class="card sugg-card p-2 rounded">
            <a href="#" class="mb-2 thumbnail-110-106" style="background-image: url('{{ get_page_logo($suggestedpage->pageData->logo, 'logo') }}')"></a>
            <h4><a href="#">{{ ellipsis($suggestedpage->pageData->title,10) }}</a></h4>
            @php
               $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->count();
            @endphp
            <span class="small text-muted">{{ $likecount }} {{ ('likes') }}</span>


            @php
                $likecount = \App\Models\Page_like::where('page_id',$suggestedpage->id)->where('user_id',auth()->user()->id)->count();
            @endphp
            @if ($likecount>0)
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.dislike',$suggestedpage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ ('Liked') }}</a>
            @else
                <a href="javascript:void(0)" onclick="ajaxAction('<?php echo route('page.like',$suggestedpage->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{ __('Like') }}</a>
            @endif
        </div>
    @endforeach
</div>
@extends('layout.app')
@section('content')
    <!-- Begin Hiraola's Blog Column Three Area -->
    <div class="hiraola-blog_area hiraola-blog_area-2 grid-view_area blog-column-three_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row blog-item_wrap">

                        @forelse ($blogs as $blog)
                        <div class="col-lg-4">
                            <x-front.blog-item :blog="$blog"> </x-front.blog-item>
                        </div>
                        @empty
                           list of blogs is empty
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-12 mb-2 d-flex flex-row-reverse">
                            @if ($blogs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{ $blogs->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hiraola's Blog Column Three Area End Here -->
@endsection

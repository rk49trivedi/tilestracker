<div class="filters-section">
    <div class="form-box default-form filter-form wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <form method="post" action="{{url('/search-image')}}" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="field-label">Category</div>
                    <div class="field-inner">
                    <select class="form-control border-0" name="category_name">
                        <option value="">All</option>
                        @foreach($categories as $categoriesDetail)
                        <option value="{{str_replace(' ','_',strtolower($categoriesDetail->display_name))}}" @if(isset($currentCat) && $currentCat == str_replace(' ','_',strtolower($categoriesDetail->display_name))) selected @endif >{{$categoriesDetail->display_name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="field-label">Search by Image</div>
                    <div class="field-inner">
                        <input class="upload-img" type="file" name="searchimagefile" id="searchImageFile" accept=".jpg" placeholder="">
                        <!-- <label for="depart-date" class="icon flaticon-down-arrow"></label> -->
                    </div>
                </div>

                <div class="form-group col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="field-label e-label">&nbsp;</div>
                    <div class="field-inner">
                        <button class="theme-btn btn-style-one btnsearchsimillar_img"><span class="btn-title">Check Availability</span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
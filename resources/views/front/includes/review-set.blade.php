<div class="modal fade fade-up" id="review_set" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content border-0 rounded">
            <div class="modal-body p-0">
                <div class="w-100 d-flex text-white rounded-top-14"
                     style="background-image:url({{asset('images/static/new/review-modal-header.png')}});height:60px;background-size:cover">
                    <span class="h4 m-auto">نظر من درباره این کسب وکار</span>
                </div>

                <div class="col-12 mt-4 px-0 px-md-3">
                    <div class="container">
                        <div class="position-relative">
                            <textarea placeholder="نظر من ..." class="form-control h-auto rounded border-0 py-3 mb-4 pr-5" style="color:black;box-shadow:0 0 5px lightgray;"></textarea>
                            <img src="{{ asset('svg/user-comment.svg') }}" width="37" class="user-comment-icon">
                        </div>
                        <div class="col-12 row mx-0 px-0 px-md-3">
                            <div class="col-md-6 pl-md-5">
                                <div class="row mx-0 col-12 px-1 pt-1">قیمت
                                    <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                </div>
                                <div class="row mx-0 col-12 px-1 pt-1">مکان
                                    <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                </div>
                                <div class="row mx-0 col-12 px-1 pt-1">برخورد
                                    <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-5">
                                <div class="row mx-0 col-12 px-1 pt-1">خدمات
                                    <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                </div>
                                <div class="row mx-0 col-12 px-1 pt-1">کیفیت
                                    <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                </div>
                            </div>
                            <div class="col-md-12 text-muted text-right">
                                <hr class="mb-1"><small>میانگین امتیاز: 4.3</small>
                            </div>
                            <div class="col-12 my-3 text-center">
                                <span class="btn-gradient-blue btn px-5">ثبت</span>
                                <span class="btn-light border rounded btn px-5" data-dismiss="modal">انصراف</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
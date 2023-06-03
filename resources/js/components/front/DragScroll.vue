<template>
    <div v-dragscroll class="table-responsive mt-4">
        <div class="cat-draggable">
            <div class="d-inline-flex pb-4 pr-lg-3">

                <div class="single-thumbnail position-relative px-3 noselect">
                    <div class="w-100 pb-4 pt-5">
                        <div class="bg-white shadow border-radius custom-card">
                            <div class="w-100 row mx-0">
                                <div class="w-100">
                                    <div class="img-container border-radius shadow-sm" style="background-image: url('/images/bg3.png')"></div>
                                </div>
                                <div class="text-center w-100 pt-2">
                                    <a href="/show">
                                        <div class="text-truncate px-1 text-dark">سوپرمارکت آرش</div>
                                    </a>
                                    <div class="col-12 px-0 row mx-0 py-0">
                                        <div class="col-9 text-truncate text-right text-info small">استان <span>تهران</span></div>
                                        <div class="col-3 pr-0 text-left">
                                            <span class="pl-1" style="color:orange">4</span>
                                            <img src="/images/static/star.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *** -->
            </div>
        </div>
    </div>
</template>

<style>
    .cat-draggable{
        white-space: nowrap;
    }
    .table-responsive::-webkit-scrollbar{
        display: none;
    }
    .table-responsive .single-thumbnail{
        width: 18vw;
    }
    .table-responsive .single-thumbnail img{
        border-radius: 30px;
    }
    @media(max-width:998px){
        .table-responsive .single-thumbnail{
            width: 45vw;
        }
    }
    .table-responsive{
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
        cursor: grab;
    }
</style>
<script>
    import { dragscroll } from 'vue-dragscroll';
    export default {
        name: 'drag-scroll',
        directives: {
            'dragscroll': dragscroll
        },
        mounted() {
            $('img,a').on('dragstart', function(event) { event.preventDefault(); });
        }
    }
</script>


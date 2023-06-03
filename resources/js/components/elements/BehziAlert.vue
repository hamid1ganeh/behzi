<template>
    <div>
        <div class="b-alert py-4 px-2 rounded">
            <div class="col-12 row mx-0 px-0">
                <div class="col-2">
                    <img id="alert-icon" width="35" height="35">
                </div>
                <div class="col-8 px-0 text-center my-auto" id="alert-message"></div>
                <div class="col-2 position-relative">
                    <span onclick="closeAlert()" class="px-3 pointer">
                        <svg id="close-alert" xmlns="http://www.w3.org/2000/svg" width="10" height="12"
                             viewBox="0 0 16.318 18.192">
                            <g id="Group_2" data-name="Group 2" transform="translate(-366.089 -211.089)">
                                <line id="Line_1" data-name="Line 1" x2="13.496" y2="15.37"
                                      transform="translate(367.5 212.5)" fill="none" stroke="#707070"
                                      stroke-linecap="round" stroke-width="3"/>
                                <line id="Line_2" data-name="Line 2" x1="13.496" y2="15.37"
                                      transform="translate(367.5 212.5)" fill="none" stroke="#707070"
                                      stroke-linecap="round" stroke-width="3"/>
                            </g>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BehziAlert",
    }
</script>
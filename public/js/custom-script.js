$(document).ready(function () {
    /** this code is related to province select option in map-section ,
     *  it will pass the value of select to the href of the `a` tag button
     */
    $('#province-btn').hide();
    $('select[name="map_province"]').change(function(){
        let province_submit = $('#province-btn');
        province_submit.show();
        let province_slug = $('select[name="map_province"]').val();
        province_submit.attr('href',province_slug);
        province_submit.css('opacity',1).css('margin-right','10px');
    })
});
/* open and close mobile menu */
function openMenu(){
    let body = $('body');
    $('.mobile-menu').css('right',0);
    body.append('<div id="dark-cover"></div>');
    body.css({'height':'100%','overflow':'hidden'});
    // for closing
    $('#dark-cover').click(function(){
        $('.mobile-menu').css('right','-100vw');
        $(this).fadeOut(100, function() { $(this).remove(); });
        $('body').removeAttr("style");
    });
}

function doToggle(){
    $('.dropdown').css('display','block');
    setTimeout(function(){
        $('.dropdown').css('transform','scale(1,1)');
    },10);
    //close dropdown
    $(document).mouseup(function(e)
    {
        let container = $(".dropdown,.user-panel-link");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $('.dropdown').css('transform','scale(0.8,0.8)');
            setTimeout(function(){
                $('.dropdown').css('display','none');
            },40);
        }
    });
}

function showAlert(type, message, duration) {
    $('.b-alert').css('display', 'block').addClass(type);
    $('#alert-icon').attr('src',"/images/static/"+type+".svg");
    $('#alert-message').text(message);
    setTimeout(() => {
        $('.b-alert').css('transform', 'scale(1,1)');
    }, 10);
    if (duration > 1) {
        setTimeout(() => {
            closeAlert();
        }, duration);
    }
}

function closeAlert() {
    $('.b-alert').css('transform', 'scale(0.5,0.5)').removeClass('success').removeClass('danger').removeClass('info');
    setTimeout(function () {
        $('#alert-icon').attr('src','');
        $('.b-alert').css('display', 'none');
    }, 80);
}

/* This function shows login modal in small size window that triggers from side menu */
function showLoginModal(){
    // for closing side menu
    $('.mobile-menu').css('right','-100vw');
    $('body').removeAttr("style");
    $('#dark-cover').fadeOut(100, function() { $(this).remove(); });
    setTimeout(function(){
        $('#loginModal').modal('show');
    },500)
}

function editingComment(el) {
    console.log(el);
    $(el).addClass('mb-4 mb-lg-3');
    $(el).append(`<div class="position-absolute col-12 bg-white rounded" style="top:0;right:0;z-index:2">
            <form action="">
                <textarea style="height:${el.offsetHeight + 'px'};resize: none;" class="form-control p-1">${el.innerText}</textarea>
                <div class="col-12"><input type="submit" class="btn btn-gradient-blue py-0 my-1 px-4" value="ذخیره"></div>
            </form>
        </div>`);
}
function linkTo(ev) {
    ev.preventDefault();
    let link = ev.target;
    $(link).attr('href');
    window.location.href = $(link).attr('href');
}
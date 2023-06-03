@extends('front.layouts.main')
@section('content')
    @include('front.layouts.header')

    <div id="particle-canvas"></div>
    <div class="w-100" style="margin-top: -93vh;font-family: 'iransansdn';">
        <div class="col-12 d-flex px-2 justify-content-center">
            <div class="col-lg-8 bg-white shadow rounded row mx-0 pt-lg-4 pb-lg-5">
                <div class="col-12 my-3 px-lg-4 text-center">
                    <h1>بهزی</h1>
                    <p class="text-muted">سامانه جامع اطلاعات مشاغل</p>
                </div>
                <div class="text-dark" style="line-height: 2.2">
                    <p class="px-lg-5 text-justify">رعایت کلیه قوانین جمهوری اسلامی ایران هرگونه محتوای منتشر شده که به استناد فهرست مصادیق محتوای مجرمانه ، خلاف قوانین تشخیص داده شود ، بدون اطلاع قبلی حذف خواهد شد. محتوای تحت مدیریت شما در صفحه اختصاصی و وب سایت شما منتشر خواهد شود؛ از آنجایی که مسئولیت آن محتوا بر عهده شماست لطفا دقت لازم را به عمل آورید. – لطفا پیش از انجام معامله و هر نوع پرداخت وجه، از صحت کالا یا خدمات ارائه شده، به صورت حضوری اطمینان حاصل نموده و در قبال دریافت هر سند و مدرکی از اصالت آن اطمینان حاصل کنید. سامانه سراسری بهزی هیچ‌گونه منفعت و مسئولیتی در قبال معامله شما ندارد. – طبق ماده ۳ آیین نامه اجرایی ماده ۷ قانون حمایت از مصرف کنندگان مسئولیت تبلیغ خلاف واقع بر عهده سفارش دهنده و سازنده آگهی است . – در صورت بروز هر گونه مشکل مسئولیت آگهی با آگهی دهنده و مصرف کننده ای است که به هشدار ها توجه ننموده و از اصالت آگهی دهنده به نحو مقتضی مطلع نشده است. – مدت زمان آگهی ها در سامانه سراسری بهزی یکسال می باشد. – آگهی دهنده می تواند نامحدود تصویر در آگهی خود داشته باشد. -مسئولیت تصاویر ارسالی از سوی کاربر متوجه ایشان خواهد بود. – بعد از انقضا آگهی در صورت  عدم تمایل به تمدید ؛ بصورت اتوماتیک حذف می گردد. – در صورتیکه صاحب آگهی اعلام نماید آگهی با خدمات ویژه نمایش داده شود مستلزم پرداخت هزینه طبق تعرفه می باشد. -در صورتیکه صاحب آگهی اعلام نماید آگهی از شبکه حذف می گردد . – پس از تسویه حساب صاحب آگهی وبسایتی تک صفحه با آدرس مورد نظر ایشان راه اندازی می شود که محتوای سفارش داده شده ایشان در آن منتشر می شود </p>
                </div>
            </div>
        </div>
    </div>

@stop
@push('css')
    <style>
        #particle-canvas{
            width: 100%;
            height: 100vh;
            min-height: 500px;
            z-index: -1;
        }
        .logo-img{
            width: 100px;
            height:100px
        }
    </style>
@endpush

@push('js')
    <script>
        //
        !function(a){var b="object"==typeof self&&self.self===self&&self||"object"==typeof global&&global.global===global&&global;"function"==typeof define&&define.amd?define(["exports"],function(c){b.ParticleNetwork=a(b,c)}):"object"==typeof module&&module.exports?module.exports=a(b,{}):b.ParticleNetwork=a(b,{})}(function(a,b){var c=function(a){this.canvas=a.canvas,this.g=a.g,this.particleColor=a.options.particleColor,this.x=Math.random()*this.canvas.width,this.y=Math.random()*this.canvas.height,this.velocity={x:(Math.random()-.5)*a.options.velocity,y:(Math.random()-.5)*a.options.velocity}};return c.prototype.update=function(){(this.x>this.canvas.width+20||this.x<-20)&&(this.velocity.x=-this.velocity.x),(this.y>this.canvas.height+20||this.y<-20)&&(this.velocity.y=-this.velocity.y),this.x+=this.velocity.x,this.y+=this.velocity.y},c.prototype.h=function(){this.g.beginPath(),this.g.fillStyle=this.particleColor,this.g.globalAlpha=.7,this.g.arc(this.x,this.y,1.5,0,2*Math.PI),this.g.fill()},b=function(a,b){this.i=a,this.i.size={width:this.i.offsetWidth,height:this.i.offsetHeight},b=void 0!==b?b:{},this.options={particleColor:void 0!==b.particleColor?b.particleColor:"rgba(255,255,255,0)",background:void 0!==b.background?b.background:"#ffffff",interactive:void 0!==b.interactive?b.interactive:!0,velocity:this.setVelocity(b.speed),density:this.j(b.density)},this.init()},b.prototype.init=function(){if(this.k=document.createElement("div"),this.i.appendChild(this.k),this.l(this.k,{position:"absolute",top:0,left:0,bottom:0,right:0,"z-index":1}),/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.background))this.l(this.k,{background:this.options.background});else{if(!/\.(gif|jpg|jpeg|tiff|png)$/i.test(this.options.background))return console.error("Please specify a valid background image or hexadecimal color"),!1;this.l(this.k,{background:'url("'+this.options.background+'") no-repeat center',"background-size":"cover"})}if(!/(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(this.options.particleColor))return console.error("Please specify a valid particleColor hexadecimal color"),!1;this.canvas=document.createElement("canvas"),this.i.appendChild(this.canvas),this.g=this.canvas.getContext("2d"),this.canvas.width=this.i.size.width,this.canvas.height=this.i.size.height,this.l(this.i,{position:"relative"}),this.l(this.canvas,{"z-index":"20",position:"relative"}),window.addEventListener("resize",function(){return this.i.offsetWidth===this.i.size.width&&this.i.offsetHeight===this.i.size.height?!1:(this.canvas.width=this.i.size.width=this.i.offsetWidth,this.canvas.height=this.i.size.height=this.i.offsetHeight,clearTimeout(this.m),void(this.m=setTimeout(function(){this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&this.o.push(this.p),requestAnimationFrame(this.update.bind(this))}.bind(this),500)))}.bind(this)),this.o=[];for(var a=0;a<this.canvas.width*this.canvas.height/this.options.density;a++)this.o.push(new c(this));this.options.interactive&&(this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p),this.canvas.addEventListener("mousemove",function(a){this.p.x=a.clientX-this.canvas.offsetLeft,this.p.y=a.clientY-this.canvas.offsetTop}.bind(this)),this.canvas.addEventListener("mouseup",function(a){this.p.velocity={x:(Math.random()-.5)*this.options.velocity,y:(Math.random()-.5)*this.options.velocity},this.p=new c(this),this.p.velocity={x:0,y:0},this.o.push(this.p)}.bind(this))),requestAnimationFrame(this.update.bind(this))},b.prototype.update=function(){this.g.clearRect(0,0,this.canvas.width,this.canvas.height),this.g.globalAlpha=1;for(var a=0;a<this.o.length;a++){this.o[a].update(),this.o[a].h();for(var b=this.o.length-1;b>a;b--){var c=Math.sqrt(Math.pow(this.o[a].x-this.o[b].x,2)+Math.pow(this.o[a].y-this.o[b].y,2));c>120||(this.g.beginPath(),this.g.strokeStyle=this.options.particleColor,this.g.globalAlpha=(120-c)/120,this.g.lineWidth=.7,this.g.moveTo(this.o[a].x,this.o[a].y),this.g.lineTo(this.o[b].x,this.o[b].y),this.g.stroke())}}0!==this.options.velocity&&requestAnimationFrame(this.update.bind(this))},b.prototype.setVelocity=function(a){return"fast"===a?1:"slow"===a?.33:"none"===a?0:.66},b.prototype.j=function(a){return"high"===a?5e3:"low"===a?2e4:isNaN(parseInt(a,10))?1e4:a},b.prototype.l=function(a,b){for(var c in b)a.style[c]=b[c]},b});
        // Initialisation

        let canvasDiv = document.getElementById('particle-canvas');
        let options = {
            particleColor: '#84c0ae',
            interactive: false,
            speed: 'medium',
            density: 'medium'
        };
        let particleCanvas = new ParticleNetwork(canvasDiv, options);
    </script>
@endpush
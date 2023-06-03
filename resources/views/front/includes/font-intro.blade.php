<style>
    /**
*
*   Name:           IRAN Sans-Serif Font
*   Version:        5.0
*   Author:         Moslem Ebrahimi (moslemebrahimi.com)
*   Created on:     Dec 25, 2012
*   Updated on:     Sep 01, 2017
*   Website:                     http://fontiran.com
*   Copyright:      Commercial/Proprietary Software
--------------------------------------------------------------------------------------
فونت های ایران سن سریف یک نرم افزار مالکیتی محسوب می شود. جهت آگاهی از قوانین استفاده از این فونت ها لطفا به وب سایت (فونت ایران دات کام) مراجعه نمایید
--------------------------------------------------------------------------------------
IRAN Sans-serif fonts are considered a proprietary software. To gain information about the laws regarding the use of these fonts, please visit www.fontiran.com
--------------------------------------------------------------------------------------
This set of fonts are used in this project under the license: (NMS57M)
--------------------------------------------------------------------------------------
*
**/
    @font-face {
        font-family: 'iransansweb';
        src:
        url({{ asset('fonts/iransans.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/iransans.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/iransans.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/iransans.ttf') }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'iraban';
        src:url({{ asset('fonts/iraban.ttf') }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'homa';
        src:url({{ asset('fonts/irhoma.ttf') }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'iransansdn';
        src:url({{ asset('fonts/iransansdnweb.ttf') }}) format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: "Vazir";
        font-style: normal;
        font-weight: bold;
        src: url({{ asset('fonts/vazir-font/vazir-bold.eot') }});
        src: url({{ asset('fonts/vazir-font/vazir-bold.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/vazir-font/vazir-bold.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/vazir-font/vazir-bold.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/vazir-font/vazir-bold.ttf') }}) format('truetype');
    }
    @font-face {
        font-family: "Vazir";
        font-weight: 500;
        src: url({{ asset('fonts/vazir-font/vazir-medium.eot') }});
        src: url({{ asset('fonts/vazir-font/vazir-medium.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/vazir-font/vazir-medium.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/vazir-font/vazir-medium.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/vazir-font/vazir-medium.ttf') }}) format('truetype');
    }
    @font-face {
        font-family: "Vazir";
        font-weight: 300;
        src: url({{ asset('fonts/vazir-font/vazir-light.eot') }});
        src: url({{ asset('fonts/vazir-font/vazir-light.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/vazir-font/vazir-light.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/vazir-font/vazir-light.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/vazir-font/vazir-light.ttf') }}) format('truetype');
    }
    @font-face {
        font-family: "Vazir";
        font-weight: 200;
        src: url({{ asset('fonts/vazir-font/vazir-thin.eot') }});
        src: url({{ asset('fonts/vazir-font/vazir-thin.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/vazir-font/vazir-thin.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/vazir-font/vazir-thin.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/vazir-font/vazir-thin.ttf') }}) format('truetype');
    }
    @font-face {
        font-family: "Vazir";
        font-weight: 100;
        src: url({{ asset('fonts/vazir-font/vazir.eot') }});
        src: url({{ asset('fonts/vazir-font/vazir.eot?#iefix') }}) format('embedded-opentype'),  /* IE6-8 */
        url({{ asset('fonts/vazir-font/vazir.woff2') }}) format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
        url({{ asset('fonts/vazir-font/vazir.woff') }}) format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url({{ asset('fonts/vazir-font/vazir.ttf') }}) format('truetype');
    }

</style>
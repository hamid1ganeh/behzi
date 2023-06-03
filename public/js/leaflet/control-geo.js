this.L=this.L||{},this.L.Control=this.L.Control||{},this.L.Control.Geocoder=function(e){"use strict";e=e&&e.hasOwnProperty("default")?e.default:e;var t=0,o=/[&<>"'`]/g,s=/[&<>"'`]/,n={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#x27;","`":"&#x60;"};function i(e){return n[e]}function r(o,s,n,i,r){var a="_l_geocoder_"+t++;s[r||"callback"]=a,window[a]=e.Util.bind(n,i);var l=document.createElement("script");l.type="text/javascript",l.src=o+c(s),l.id=a,document.getElementsByTagName("head")[0].appendChild(l)}function a(e,t,o){var s=new XMLHttpRequest;s.onreadystatechange=function(){if(4===s.readyState){var e;if(200!==s.status&&304!==s.status)e="";else if("string"==typeof s.response)try{e=JSON.parse(s.response)}catch(t){e=s.response}else e=s.response;o(e)}},s.open("GET",e+c(t),!0),s.responseType="json",s.setRequestHeader("Accept","application/json"),s.send(null)}function l(e,t){return e.replace(/\{ *([\w_]+) *\}/g,function(e,n){var r,a=t[n];return void 0===a?a="":"function"==typeof a&&(a=a(t)),null==(r=a)?"":r?(r=""+r,s.test(r)?r.replace(o,i):r):r+""})}function c(t,o,s){var n=[];for(var i in t){var r=encodeURIComponent(s?i.toUpperCase():i),a=t[i];if(e.Util.isArray(a))for(var l=0;l<a.length;l++)n.push(r+"="+encodeURIComponent(a[l]));else n.push(r+"="+encodeURIComponent(a))}return(o&&-1!==o.indexOf("?")?"&":"?")+n.join("&")}var d=e.Class.extend({options:{service_url:"https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer"},initialize:function(t,o){e.setOptions(this,o),this._accessToken=t},geocode:function(t,o,s){var n={SingleLine:t,outFields:"Addr_Type",forStorage:!1,maxLocations:10,f:"json"};this._key&&this._key.length&&(n.token=this._key),a(this.options.service_url+"/findAddressCandidates",e.extend(n,this.options.geocodingQueryParams),function(t){var n,i,r,a=[];if(t.candidates&&t.candidates.length)for(var l=0;l<=t.candidates.length-1;l++)n=t.candidates[l],i=e.latLng(n.location.y,n.location.x),r=e.latLngBounds(e.latLng(n.extent.ymax,n.extent.xmax),e.latLng(n.extent.ymin,n.extent.xmin)),a[l]={name:n.address,bbox:r,center:i};o.call(s,a)})},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){var i={location:encodeURIComponent(t.lng)+","+encodeURIComponent(t.lat),distance:100,f:"json"};a(this.options.service_url+"/reverseGeocode",i,function(t){var o,i=[];t&&!t.error&&(o=e.latLng(t.location.y,t.location.x),i.push({name:t.address.Match_addr,center:o,bounds:e.latLngBounds(o,o)})),s.call(n,i)})}});var u=e.Class.extend({initialize:function(e){this.key=e},geocode:function(t,o,s){r("https://dev.virtualearth.net/REST/v1/Locations",{query:t,key:this.key},function(t){var n=[];if(t.resourceSets.length>0)for(var i=t.resourceSets[0].resources.length-1;i>=0;i--){var r=t.resourceSets[0].resources[i],a=r.bbox;n[i]={name:r.name,bbox:e.latLngBounds([a[0],a[1]],[a[2],a[3]]),center:e.latLng(r.point.coordinates)}}o.call(s,n)},this,"jsonp")},reverse:function(t,o,s,n){r("//dev.virtualearth.net/REST/v1/Locations/"+t.lat+","+t.lng,{key:this.key},function(t){for(var o=[],i=t.resourceSets[0].resources.length-1;i>=0;i--){var r=t.resourceSets[0].resources[i],a=r.bbox;o[i]={name:r.name,bbox:e.latLngBounds([a[0],a[1]],[a[2],a[3]]),center:e.latLng(r.point.coordinates)}}s.call(n,o)},this,"jsonp")}});var h=e.Class.extend({options:{serviceUrl:"https://maps.googleapis.com/maps/api/geocode/json",geocodingQueryParams:{},reverseQueryParams:{}},initialize:function(t,o){this._key=t,e.setOptions(this,o),this.options.serviceUrl=this.options.service_url||this.options.serviceUrl},geocode:function(t,o,s){var n={address:t};this._key&&this._key.length&&(n.key=this._key),n=e.Util.extend(n,this.options.geocodingQueryParams),a(this.options.serviceUrl,n,function(t){var n,i,r,a=[];if(t.results&&t.results.length)for(var l=0;l<=t.results.length-1;l++)n=t.results[l],i=e.latLng(n.geometry.location),r=e.latLngBounds(e.latLng(n.geometry.viewport.northeast),e.latLng(n.geometry.viewport.southwest)),a[l]={name:n.formatted_address,bbox:r,center:i,properties:n.address_components};o.call(s,a)})},reverse:function(t,o,s,n){var i={latlng:encodeURIComponent(t.lat)+","+encodeURIComponent(t.lng)};i=e.Util.extend(i,this.options.reverseQueryParams),this._key&&this._key.length&&(i.key=this._key),a(this.options.serviceUrl,i,function(t){var o,i,r,a=[];if(t.results&&t.results.length)for(var l=0;l<=t.results.length-1;l++)o=t.results[l],i=e.latLng(o.geometry.location),r=e.latLngBounds(e.latLng(o.geometry.viewport.northeast),e.latLng(o.geometry.viewport.southwest)),a[l]={name:o.formatted_address,bbox:r,center:i,properties:o.address_components};s.call(n,a)})}});var p=e.Class.extend({options:{geocodeUrl:"https://geocoder.api.here.com/6.2/geocode.json",reverseGeocodeUrl:"https://reverse.geocoder.api.here.com/6.2/reversegeocode.json",app_id:"<insert your app_id here>",app_code:"<insert your app_code here>",geocodingQueryParams:{},reverseQueryParams:{},reverseGeocodeProxRadius:null},initialize:function(t){e.setOptions(this,t)},geocode:function(t,o,s){var n={searchtext:t,gen:9,app_id:this.options.app_id,app_code:this.options.app_code,jsonattributes:1};n=e.Util.extend(n,this.options.geocodingQueryParams),this.getJSON(this.options.geocodeUrl,n,o,s)},reverse:function(t,o,s,n){var i=this.options.reverseGeocodeProxRadius?this.options.reverseGeocodeProxRadius:null,r=i?","+encodeURIComponent(i):"",a={prox:encodeURIComponent(t.lat)+","+encodeURIComponent(t.lng)+r,mode:"retrieveAddresses",app_id:this.options.app_id,app_code:this.options.app_code,gen:9,jsonattributes:1};a=e.Util.extend(a,this.options.reverseQueryParams),this.getJSON(this.options.reverseGeocodeUrl,a,s,n)},getJSON:function(t,o,s,n){a(t,o,function(t){var o,i,r,a=[];if(t.response.view&&t.response.view.length)for(var l=0;l<=t.response.view[0].result.length-1;l++)o=t.response.view[0].result[l].location,i=e.latLng(o.displayPosition.latitude,o.displayPosition.longitude),r=e.latLngBounds(e.latLng(o.mapView.topLeft.latitude,o.mapView.topLeft.longitude),e.latLng(o.mapView.bottomRight.latitude,o.mapView.bottomRight.longitude)),a[l]={name:o.address.label,properties:o.address,bbox:r,center:i};s.call(n,a)})}});var g=e.Class.extend({options:{next:void 0,sizeInMeters:1e4},initialize:function(t){e.Util.setOptions(this,t)},geocode:function(t,o,s){var n,i;if((n=t.match(/^([NS])\s*(\d{1,3}(?:\.\d*)?)\W*([EW])\s*(\d{1,3}(?:\.\d*)?)$/))?i=e.latLng((/N/i.test(n[1])?1:-1)*parseFloat(n[2]),(/E/i.test(n[3])?1:-1)*parseFloat(n[4])):(n=t.match(/^(\d{1,3}(?:\.\d*)?)\s*([NS])\W*(\d{1,3}(?:\.\d*)?)\s*([EW])$/))?i=e.latLng((/N/i.test(n[2])?1:-1)*parseFloat(n[1]),(/E/i.test(n[4])?1:-1)*parseFloat(n[3])):(n=t.match(/^([NS])\s*(\d{1,3})°?\s*(\d{1,3}(?:\.\d*)?)?['′]?\W*([EW])\s*(\d{1,3})°?\s*(\d{1,3}(?:\.\d*)?)?['′]?$/))?i=e.latLng((/N/i.test(n[1])?1:-1)*(parseFloat(n[2])+parseFloat(n[3]/60)),(/E/i.test(n[4])?1:-1)*(parseFloat(n[5])+parseFloat(n[6]/60))):(n=t.match(/^(\d{1,3})°?\s*(\d{1,3}(?:\.\d*)?)?['′]?\s*([NS])\W*(\d{1,3})°?\s*(\d{1,3}(?:\.\d*)?)?['′]?\s*([EW])$/))?i=e.latLng((/N/i.test(n[3])?1:-1)*(parseFloat(n[1])+parseFloat(n[2]/60)),(/E/i.test(n[6])?1:-1)*(parseFloat(n[4])+parseFloat(n[5]/60))):(n=t.match(/^([NS])\s*(\d{1,3})°?\s*(\d{1,2})['′]?\s*(\d{1,3}(?:\.\d*)?)?["″]?\W*([EW])\s*(\d{1,3})°?\s*(\d{1,2})['′]?\s*(\d{1,3}(?:\.\d*)?)?["″]?$/))?i=e.latLng((/N/i.test(n[1])?1:-1)*(parseFloat(n[2])+parseFloat(n[3]/60+parseFloat(n[4]/3600))),(/E/i.test(n[5])?1:-1)*(parseFloat(n[6])+parseFloat(n[7]/60)+parseFloat(n[8]/3600))):(n=t.match(/^(\d{1,3})°?\s*(\d{1,2})['′]?\s*(\d{1,3}(?:\.\d*)?)?["″]\s*([NS])\W*(\d{1,3})°?\s*(\d{1,2})['′]?\s*(\d{1,3}(?:\.\d*)?)?["″]?\s*([EW])$/))?i=e.latLng((/N/i.test(n[4])?1:-1)*(parseFloat(n[1])+parseFloat(n[2]/60+parseFloat(n[3]/3600))),(/E/i.test(n[8])?1:-1)*(parseFloat(n[5])+parseFloat(n[6]/60)+parseFloat(n[7]/3600))):(n=t.match(/^\s*([+-]?\d+(?:\.\d*)?)\s*[\s,]\s*([+-]?\d+(?:\.\d*)?)\s*$/))&&(i=e.latLng(parseFloat(n[1]),parseFloat(n[2]))),i){var r=[{name:t,center:i,bbox:i.toBounds(this.options.sizeInMeters)}];o.call(s,r)}else this.options.next&&this.options.next.geocode(t,o,s)}});var m=e.Class.extend({options:{serviceUrl:"https://api.mapbox.com/geocoding/v5/mapbox.places/",geocodingQueryParams:{},reverseQueryParams:{}},initialize:function(t,o){e.setOptions(this,o),this.options.geocodingQueryParams.access_token=t,this.options.reverseQueryParams.access_token=t},geocode:function(t,o,s){var n=this.options.geocodingQueryParams;void 0!==n.proximity&&void 0!==n.proximity.lat&&void 0!==n.proximity.lng&&(n.proximity=n.proximity.lng+","+n.proximity.lat),a(this.options.serviceUrl+encodeURIComponent(t)+".json",n,function(t){var n,i,r,a=[];if(t.features&&t.features.length)for(var l=0;l<=t.features.length-1;l++){n=t.features[l],i=e.latLng(n.center.reverse()),r=n.bbox?e.latLngBounds(e.latLng(n.bbox.slice(0,2).reverse()),e.latLng(n.bbox.slice(2,4).reverse())):e.latLngBounds(i,i);for(var c={text:n.text,address:n.address},d=0;d<(n.context||[]).length;d++){c[n.context[d].id.split(".")[0]]=n.context[d].text,n.context[d].short_code&&(c.countryShortCode=n.context[d].short_code)}a[l]={name:n.place_name,bbox:r,center:i,properties:c}}o.call(s,a)})},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){a(this.options.serviceUrl+encodeURIComponent(t.lng)+","+encodeURIComponent(t.lat)+".json",this.options.reverseQueryParams,function(t){var o,i,r,a=[];if(t.features&&t.features.length)for(var l=0;l<=t.features.length-1;l++)o=t.features[l],i=e.latLng(o.center.reverse()),r=o.bbox?e.latLngBounds(e.latLng(o.bbox.slice(0,2).reverse()),e.latLng(o.bbox.slice(2,4).reverse())):e.latLngBounds(i,i),a[l]={name:o.place_name,bbox:r,center:i};s.call(n,a)})}});var v=e.Class.extend({options:{serviceUrl:"https://www.mapquestapi.com/geocoding/v1"},initialize:function(t,o){this._key=decodeURIComponent(t),e.Util.setOptions(this,o)},_formatName:function(){var e,t=[];for(e=0;e<arguments.length;e++)arguments[e]&&t.push(arguments[e]);return t.join(", ")},geocode:function(t,o,s){a(this.options.serviceUrl+"/address",{key:this._key,location:t,limit:5,outFormat:"json"},e.bind(function(t){var n,i,r=[];if(t.results&&t.results[0].locations)for(var a=t.results[0].locations.length-1;a>=0;a--)n=t.results[0].locations[a],i=e.latLng(n.latLng),r[a]={name:this._formatName(n.street,n.adminArea4,n.adminArea3,n.adminArea1),bbox:e.latLngBounds(i,i),center:i};o.call(s,r)},this))},reverse:function(t,o,s,n){a(this.options.serviceUrl+"/reverse",{key:this._key,location:t.lat+","+t.lng,outputFormat:"json"},e.bind(function(t){var o,i,r=[];if(t.results&&t.results[0].locations)for(var a=t.results[0].locations.length-1;a>=0;a--)o=t.results[0].locations[a],i=e.latLng(o.latLng),r[a]={name:this._formatName(o.street,o.adminArea4,o.adminArea3,o.adminArea1),bbox:e.latLngBounds(i,i),center:i};s.call(n,r)},this))}});var f=e.Class.extend({options:{userId:"<insert your userId here>",apiKey:"<insert your apiKey here>",serviceUrl:"https://neutrinoapi.com/"},initialize:function(t){e.Util.setOptions(this,t)},geocode:function(t,o,s){a(this.options.serviceUrl+"geocode-address",{apiKey:this.options.apiKey,userId:this.options.userId,address:t.split(/\s+/).join(".")},function(t){var n,i,r=[];t.locations&&(t.geometry=t.locations[0],n=e.latLng(t.geometry.latitude,t.geometry.longitude),i=e.latLngBounds(n,n),r[0]={name:t.geometry.address,bbox:i,center:n}),o.call(s,r)})},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){a(this.options.serviceUrl+"geocode-reverse",{apiKey:this.options.apiKey,userId:this.options.userId,latitude:t.lat,longitude:t.lng},function(o){var i,r,a=[];200==o.status.status&&o.found&&(i=e.latLng(t.lat,t.lng),r=e.latLngBounds(i,i),a[0]={name:o.address,bbox:r,center:i}),s.call(n,a)})}});var _=e.Class.extend({options:{serviceUrl:"https://nominatim.openstreetmap.org/",geocodingQueryParams:{},reverseQueryParams:{},htmlTemplate:function(e){var t,o=e.address,s=[];return(o.road||o.building)&&s.push("{building} {road} {house_number}"),(o.city||o.town||o.village||o.hamlet)&&(t=s.length>0?"leaflet-control-geocoder-address-detail":"",s.push('<span class="'+t+'">{postcode} {city} {town} {village} {hamlet}</span>')),(o.state||o.country)&&(t=s.length>0?"leaflet-control-geocoder-address-context":"",s.push('<span class="'+t+'">{state} {country}</span>')),l(s.join("<br/>"),o)}},initialize:function(t){e.Util.setOptions(this,t)},geocode:function(t,o,s){a(this.options.serviceUrl+"search",e.extend({q:t,limit:5,format:"json",addressdetails:1},this.options.geocodingQueryParams),e.bind(function(t){for(var n=[],i=t.length-1;i>=0;i--){for(var r=t[i].boundingbox,a=0;a<4;a++)r[a]=parseFloat(r[a]);n[i]={icon:t[i].icon,name:t[i].display_name,html:this.options.htmlTemplate?this.options.htmlTemplate(t[i]):void 0,bbox:e.latLngBounds([r[0],r[2]],[r[1],r[3]]),center:e.latLng(t[i].lat,t[i].lon),properties:t[i]}}o.call(s,n)},this))},reverse:function(t,o,s,n){a(this.options.serviceUrl+"reverse",e.extend({lat:t.lat,lon:t.lng,zoom:Math.round(Math.log(o/256)/Math.log(2)),addressdetails:1,format:"json"},this.options.reverseQueryParams),e.bind(function(t){var o,i=[];t&&t.lat&&t.lon&&(o=e.latLng(t.lat,t.lon),i.push({name:t.display_name,html:this.options.htmlTemplate?this.options.htmlTemplate(t):void 0,center:o,bounds:e.latLngBounds(o,o),properties:t})),s.call(n,i)},this))}});var b=e.Class.extend({options:{OpenLocationCode:void 0,codeLength:void 0},initialize:function(t){e.setOptions(this,t)},geocode:function(t,o,s){try{var n=this.options.OpenLocationCode.decode(t),i={name:t,center:e.latLng(n.latitudeCenter,n.longitudeCenter),bbox:e.latLngBounds(e.latLng(n.latitudeLo,n.longitudeLo),e.latLng(n.latitudeHi,n.longitudeHi))};o.call(s,[i])}catch(e){console.warn(e),o.call(s,[])}},reverse:function(t,o,s,n){try{var i={name:this.options.OpenLocationCode.encode(t.lat,t.lng,this.options.codeLength),center:e.latLng(t.lat,t.lng),bbox:e.latLngBounds(e.latLng(t.lat,t.lng),e.latLng(t.lat,t.lng))};s.call(n,[i])}catch(e){console.warn(e),s.call(n,[])}}});var y=e.Class.extend({options:{serviceUrl:"https://api.opencagedata.com/geocode/v1/json",geocodingQueryParams:{},reverseQueryParams:{}},initialize:function(t,o){e.setOptions(this,o),this._accessToken=t},geocode:function(t,o,s){var n={key:this._accessToken,q:t};n=e.extend(n,this.options.geocodingQueryParams),a(this.options.serviceUrl,n,function(t){var n,i,r,a=[];if(t.results&&t.results.length)for(var l=0;l<t.results.length;l++)r=t.results[l],n=e.latLng(r.geometry),i=r.annotations&&r.annotations.bounds?e.latLngBounds(e.latLng(r.annotations.bounds.northeast),e.latLng(r.annotations.bounds.southwest)):e.latLngBounds(n,n),a.push({name:r.formatted,bbox:i,center:n});o.call(s,a)})},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){var i={key:this._accessToken,q:[t.lat,t.lng].join(",")};i=e.extend(i,this.options.reverseQueryParams),a(this.options.serviceUrl,i,function(t){var o,i,r,a=[];if(t.results&&t.results.length)for(var l=0;l<t.results.length;l++)r=t.results[l],o=e.latLng(r.geometry),i=r.annotations&&r.annotations.bounds?e.latLngBounds(e.latLng(r.annotations.bounds.northeast),e.latLng(r.annotations.bounds.southwest)):e.latLngBounds(o,o),a.push({name:r.formatted,bbox:i,center:o});s.call(n,a)})}});var L=e.Class.extend({options:{serviceUrl:"https://api.geocode.earth/v1",geocodingQueryParams:{},reverseQueryParams:{}},initialize:function(t,o){e.Util.setOptions(this,o),this._apiKey=t,this._lastSuggest=0},geocode:function(t,o,s){var n=this;a(this.options.serviceUrl+"/search",e.extend({api_key:this._apiKey,text:t},this.options.geocodingQueryParams),function(e){o.call(s,n._parseResults(e,"bbox"))})},suggest:function(t,o,s){var n=this;a(this.options.serviceUrl+"/autocomplete",e.extend({api_key:this._apiKey,text:t},this.options.geocodingQueryParams),e.bind(function(e){e.geocoding.timestamp>this._lastSuggest&&(this._lastSuggest=e.geocoding.timestamp,o.call(s,n._parseResults(e,"bbox")))},this))},reverse:function(t,o,s,n){var i=this;a(this.options.serviceUrl+"/reverse",e.extend({api_key:this._apiKey,"point.lat":t.lat,"point.lon":t.lng},this.options.reverseQueryParams),function(e){s.call(n,i._parseResults(e,"bounds"))})},_parseResults:function(t,o){var s=[];return e.geoJson(t,{pointToLayer:function(t,o){return e.circleMarker(o)},onEachFeature:function(t,n){var i,r,a={};n.getBounds?r=(i=n.getBounds()).getCenter():n.feature.bbox?(r=n.getLatLng(),i=e.latLngBounds(e.GeoJSON.coordsToLatLng(n.feature.bbox.slice(0,2)),e.GeoJSON.coordsToLatLng(n.feature.bbox.slice(2,4)))):(r=n.getLatLng(),i=e.latLngBounds(r,r)),a.name=n.feature.properties.label,a.center=r,a[o]=i,a.properties=n.feature.properties,s.push(a)}}),s}});function x(e,t){return new L(e,t)}var U=L,C=x,k=L,w=x,D=k.extend({options:{serviceUrl:"https://api.openrouteservice.org/geocode"}});var P=e.Class.extend({options:{serviceUrl:"https://photon.komoot.de/api/",reverseUrl:"https://photon.komoot.de/reverse/",nameProperties:["name","street","suburb","hamlet","town","city","state","country"]},initialize:function(t){e.setOptions(this,t)},geocode:function(t,o,s){var n=e.extend({q:t},this.options.geocodingQueryParams);a(this.options.serviceUrl,n,e.bind(function(e){o.call(s,this._decodeFeatures(e))},this))},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){var i=e.extend({lat:t.lat,lon:t.lng},this.options.reverseQueryParams);a(this.options.reverseUrl,i,e.bind(function(e){s.call(n,this._decodeFeatures(e))},this))},_decodeFeatures:function(t){var o,s,n,i,r,a,l=[];if(t&&t.features)for(o=0;o<t.features.length;o++)n=(s=t.features[o]).geometry.coordinates,i=e.latLng(n[1],n[0]),a=(r=s.properties.extent)?e.latLngBounds([r[1],r[0]],[r[3],r[2]]):e.latLngBounds(i,i),l.push({name:this._decodeFeatureName(s),html:this.options.htmlTemplate?this.options.htmlTemplate(s):void 0,center:i,bbox:a,properties:s.properties});return l},_decodeFeatureName:function(e){return(this.options.nameProperties||[]).map(function(t){return e.properties[t]}).filter(function(e){return!!e}).join(", ")}});var E=e.Class.extend({options:{serviceUrl:"https://api.what3words.com/v2/"},initialize:function(e){this._accessToken=e},geocode:function(t,o,s){a(this.options.serviceUrl+"forward",{key:this._accessToken,addr:t.split(/\s+/).join(".")},function(t){var n,i,r=[];t.geometry&&(n=e.latLng(t.geometry.lat,t.geometry.lng),i=e.latLngBounds(n,n),r[0]={name:t.words,bbox:i,center:n}),o.call(s,r)})},suggest:function(e,t,o){return this.geocode(e,t,o)},reverse:function(t,o,s,n){a(this.options.serviceUrl+"reverse",{key:this._accessToken,coords:[t.lat,t.lng].join(",")},function(t){var o,i,r=[];200==t.status.status&&(o=e.latLng(t.geometry.lat,t.geometry.lng),i=e.latLngBounds(o,o),r[0]={name:t.words,bbox:i,center:o}),s.call(n,r)})}});var R=Object.freeze({ArcGis:d,arcgis:function(e,t){return new d(e,t)},Bing:u,bing:function(e){return new u(e)},Google:h,google:function(e,t){return new h(e,t)},HERE:p,here:function(e){return new p(e)},LatLng:g,latLng:function(e){return new g(e)},Mapbox:m,mapbox:function(e,t){return new m(e,t)},MapQuest:v,mapQuest:function(e,t){return new v(e,t)},Neutrino:f,neutrino:function(e){return new f(e)},Nominatim:_,nominatim:function(e){return new _(e)},OpenLocationCode:b,openLocationCode:function(e){return new b(e)},OpenCage:y,opencage:function(e,t){return new y(e,t)},Pelias:L,pelias:x,GeocodeEarth:U,geocodeEarth:C,Mapzen:k,mapzen:w,Openrouteservice:D,openrouteservice:function(e,t){return new D(e,t)},Photon:P,photon:function(e){return new P(e)},What3Words:E,what3words:function(e){return new E(e)}}),T=e.Control.extend({options:{showUniqueResult:!0,showResultIcons:!1,collapsed:!0,expand:"touch",position:"topright",placeholder:"Search...",errorMessage:"Nothing found.",iconLabel:"Initiate a new search",queryMinLength:1,suggestMinLength:3,suggestTimeout:250,defaultMarkGeocode:!0},includes:e.Evented.prototype||e.Mixin.Events,initialize:function(t){e.Util.setOptions(this,t),this.options.geocoder||(this.options.geocoder=new _),this._requestCount=0},addThrobberClass:function(){e.DomUtil.addClass(this._container,"leaflet-control-geocoder-throbber")},removeThrobberClass:function(){e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-throbber")},onAdd:function(t){var o,s="leaflet-control-geocoder",n=e.DomUtil.create("div",s+" leaflet-bar"),i=e.DomUtil.create("button",s+"-icon",n),r=this._form=e.DomUtil.create("div",s+"-form",n);return this._map=t,this._container=n,i.innerHTML="&nbsp;",i.type="button",i.setAttribute("aria-label",this.options.iconLabel),(o=this._input=e.DomUtil.create("input","",r)).type="text",o.value=this.options.query||"",o.placeholder=this.options.placeholder,e.DomEvent.disableClickPropagation(o),this._errorElement=e.DomUtil.create("div",s+"-form-no-error",n),this._errorElement.innerHTML=this.options.errorMessage,this._alts=e.DomUtil.create("ul",s+"-alternatives leaflet-control-geocoder-alternatives-minimized",n),e.DomEvent.disableClickPropagation(this._alts),e.DomEvent.addListener(o,"keydown",this._keydown,this),this.options.geocoder.suggest&&e.DomEvent.addListener(o,"input",this._change,this),e.DomEvent.addListener(o,"blur",function(){this.options.collapsed&&!this._preventBlurCollapse&&this._collapse(),this._preventBlurCollapse=!1},this),this.options.collapsed?"click"===this.options.expand?e.DomEvent.addListener(n,"click",function(e){0===e.button&&2!==e.detail&&this._toggle()},this):"touch"===this.options.expand?e.DomEvent.addListener(n,e.Browser.touch?"touchstart mousedown":"mousedown",function(e){this._toggle(),e.preventDefault(),e.stopPropagation()},this):(e.DomEvent.addListener(n,"mouseover",this._expand,this),e.DomEvent.addListener(n,"mouseout",this._collapse,this),this._map.on("movestart",this._collapse,this)):(this._expand(),e.Browser.touch?e.DomEvent.addListener(n,"touchstart",function(){this._geocode()},this):e.DomEvent.addListener(n,"click",function(){this._geocode()},this)),this.options.defaultMarkGeocode&&this.on("markgeocode",this.markGeocode,this),this.on("startgeocode",this.addThrobberClass,this),this.on("finishgeocode",this.removeThrobberClass,this),this.on("startsuggest",this.addThrobberClass,this),this.on("finishsuggest",this.removeThrobberClass,this),e.DomEvent.disableClickPropagation(n),n},setQuery:function(e){return this._input.value=e,this},_geocodeResult:function(t,o){if(!o&&this.options.showUniqueResult&&1===t.length)this._geocodeResultSelected(t[0]);else if(t.length>0){this._alts.innerHTML="",this._results=t,e.DomUtil.removeClass(this._alts,"leaflet-control-geocoder-alternatives-minimized"),e.DomUtil.addClass(this._container,"leaflet-control-geocoder-options-open");for(var s=0;s<t.length;s++)this._alts.appendChild(this._createAlt(t[s],s))}else e.DomUtil.addClass(this._container,"leaflet-control-geocoder-options-error"),e.DomUtil.addClass(this._errorElement,"leaflet-control-geocoder-error")},markGeocode:function(t){return t=t.geocode||t,this._map.fitBounds(t.bbox),this._geocodeMarker&&this._map.removeLayer(this._geocodeMarker),this._geocodeMarker=new e.Marker(t.center).bindPopup(t.html||t.name).addTo(this._map).openPopup(),this},_geocode:function(e){var t=this._input.value;if(e||!(t.length<this.options.queryMinLength)){var o=++this._requestCount,s=e?"suggest":"geocode",n={input:t};this._lastGeocode=t,e||this._clearResults(),this.fire("start"+s,n),this.options.geocoder[s](t,function(t){o===this._requestCount&&(n.results=t,this.fire("finish"+s,n),this._geocodeResult(t,e))},this)}},_geocodeResultSelected:function(e){this.fire("markgeocode",{geocode:e})},_toggle:function(){e.DomUtil.hasClass(this._container,"leaflet-control-geocoder-expanded")?this._collapse():this._expand()},_expand:function(){e.DomUtil.addClass(this._container,"leaflet-control-geocoder-expanded"),this._input.select(),this.fire("expand")},_collapse:function(){e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-expanded"),e.DomUtil.addClass(this._alts,"leaflet-control-geocoder-alternatives-minimized"),e.DomUtil.removeClass(this._errorElement,"leaflet-control-geocoder-error"),e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-options-open"),e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-options-error"),this._input.blur(),this.fire("collapse")},_clearResults:function(){e.DomUtil.addClass(this._alts,"leaflet-control-geocoder-alternatives-minimized"),this._selection=null,e.DomUtil.removeClass(this._errorElement,"leaflet-control-geocoder-error"),e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-options-open"),e.DomUtil.removeClass(this._container,"leaflet-control-geocoder-options-error")},_createAlt:function(t,o){var s=e.DomUtil.create("li",""),n=e.DomUtil.create("a","",s),i=this.options.showResultIcons&&t.icon?e.DomUtil.create("img","",n):null,r=t.html?void 0:document.createTextNode(t.name);return i&&(i.src=t.icon),s.setAttribute("data-result-index",o),t.html?n.innerHTML=n.innerHTML+t.html:n.appendChild(r),e.DomEvent.addListener(s,"mousedown touchstart",function(o){this._preventBlurCollapse=!0,e.DomEvent.stop(o),this._geocodeResultSelected(t),e.DomEvent.on(s,"click touchend",function(){this.options.collapsed?this._collapse():this._clearResults()},this)},this),s},_keydown:function(t){var o=this,s=function(t){o._selection&&(e.DomUtil.removeClass(o._selection,"leaflet-control-geocoder-selected"),o._selection=o._selection[t>0?"nextSibling":"previousSibling"]),o._selection||(o._selection=o._alts[t>0?"firstChild":"lastChild"]),o._selection&&e.DomUtil.addClass(o._selection,"leaflet-control-geocoder-selected")};switch(t.keyCode){case 27:this.options.collapsed?this._collapse():this._clearResults();break;case 38:s(-1);break;case 40:s(1);break;case 13:if(this._selection){var n=parseInt(this._selection.getAttribute("data-result-index"),10);this._geocodeResultSelected(this._results[n]),this._clearResults()}else this._geocode();break;default:return}e.DomEvent.preventDefault(t)},_change:function(){var t=this._input.value;t!==this._lastGeocode&&(clearTimeout(this._suggestTimeout),t.length>=this.options.suggestMinLength?this._suggestTimeout=setTimeout(e.bind(function(){this._geocode(!0)},this),this.options.suggestTimeout):this._clearResults())}});return e.Util.extend(T,R),e.Util.extend(e.Control,{Geocoder:T,geocoder:function(e){return new T(e)}}),T}(L);
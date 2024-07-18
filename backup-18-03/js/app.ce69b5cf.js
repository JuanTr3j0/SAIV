(function(){"use strict";var e={3217:function(e,t,n){var o=n(9242),r=n(3396);function a(e,t){const n=(0,r.up)("router-view");return(0,r.wg)(),(0,r.j4)(n,null,{default:(0,r.w5)((({Component:e})=>[(0,r.Wm)(o.uT,{name:"fade"},{default:(0,r.w5)((()=>[((0,r.wg)(),(0,r.j4)((0,r.LL)(e)))])),_:2},1024)])),_:1})}var i=n(89);const c={},s=(0,i.Z)(c,[["render",a]]);var u=s,l=n(1120),f=n(4239),d=n(3636),m=n(3095);(0,o.ri)(u).use(f.Z).use(l.Z).use(m.$).component("v-select",d.Z).mount("#app")},1120:function(e,t,n){var o=n(2483);const r=[{path:"/",name:"index",component:()=>n.e(449).then(n.bind(n,8449))},{path:"/saiv/acceso",name:"acceso",component:()=>Promise.all([n.e(874),n.e(9),n.e(753)]).then(n.bind(n,1970))},{path:"/saiv",name:"app",component:()=>Promise.all([n.e(874),n.e(533),n.e(500)]).then(n.bind(n,6418)),children:[{path:"/saiv/usuarios",name:"usuarios",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(426),n.e(329)]).then(n.bind(n,5039))},{path:"/saiv/casos",name:"registroCasos",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(426),n.e(249)]).then(n.bind(n,4169))},{path:"/saiv/seguimiento/juridico",name:"seguimientoJuridico",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(426),n.e(965)]).then(n.bind(n,6580))},{path:"/saiv/ludoteca",name:"ludoteca",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(426),n.e(413)]).then(n.bind(n,6361))},{path:"/saiv/camara/gessell/programacion",name:"camaraGessellProgramacion",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(576)]).then(n.bind(n,8288))},{path:"/saiv/camara/gessell/menores/edad",name:"camaraGessellMenoresEdad",component:()=>Promise.all([n.e(874),n.e(9),n.e(533),n.e(523),n.e(186)]).then(n.bind(n,4767))},{path:"/saiv/testeo",name:"testeo",component:()=>Promise.all([n.e(874),n.e(9),n.e(326)]).then(n.bind(n,2486))},{path:"/saiv/perfil",name:"perfil",component:()=>n.e(1).then(n.bind(n,9001))},{path:"/bitacora/errores",name:"bitacoraErrores",component:()=>n.e(910).then(n.bind(n,3910))}]}],a=(0,o.p7)({linkActiveClass:"_active",history:(0,o.PO)("/"),routes:r});t["Z"]=a},4239:function(e,t,n){var o=n(65);t["Z"]=(0,o.MT)({state:{SHOW_MENU:!0,USUARIO:{usuario:localStorage.getItem("usuario"),access_token:localStorage.getItem("access_token"),correo:localStorage.getItem("correo"),oficina:localStorage.getItem("oficina"),acceso:localStorage.getItem("acceso")},URL_SERVER:"https://www.saiv.solidar-suisse-sv.org/apiPublic/api/",HEADERS:null,Item:null,SubMenu:null},getters:{erroresResponse:()=>e=>e?0===e.status?"No existe conección verifique la red":404==e.status?"No se encontró la página solicitada [404]":401==e.status?"No autorizado [401]":419==e.status?"Su sesión expiró [419]":500==e.status?"Error interno del servidor [500].":"parsererror"===e.textStatus?"Error al analizar JSON solicitado.":"timeout"===e.textStatus?"Error de tiempo de espera.":"abort"===e.textStatus?"Solicitud de axios cancelada.":"Error no detectado: "+e.textStatus:null},mutations:{headerSesion:e=>{e.HEADERS={"Content-Type":"application/json","X-Requested-With":"XMLHttpRequest"}},headerSesionOk:e=>{e.HEADERS={"Content-Type":"application/json","X-Requested-With":"XMLHttpRequest",Authorization:"Bearer "+localStorage.getItem("access_token")}},sesion:(e,t)=>{e.USUARIO.correo=t.correo,e.USUARIO.usuario=t.usuario,e.USUARIO.oficina=t.oficina,e.USUARIO.access_token=t.access_token,e.USUARIO.acceso=t.acceso,localStorage.setItem("access_token",t.access_token),localStorage.setItem("usuario",t.usuario),localStorage.setItem("correo",t.correo),localStorage.setItem("oficina",t.oficina),localStorage.setItem("acceso",t.acceso)},item:(e,t)=>{e.SubMenu=null,e.Item=t.Item},menuItem:(e,t)=>{e.Item=t.Item,e.SubMenu=t.SubMenu}}})}},t={};function n(o){var r=t[o];if(void 0!==r)return r.exports;var a=t[o]={exports:{}};return e[o](a,a.exports,n),a.exports}n.m=e,function(){var e=[];n.O=function(t,o,r,a){if(!o){var i=1/0;for(l=0;l<e.length;l++){o=e[l][0],r=e[l][1],a=e[l][2];for(var c=!0,s=0;s<o.length;s++)(!1&a||i>=a)&&Object.keys(n.O).every((function(e){return n.O[e](o[s])}))?o.splice(s--,1):(c=!1,a<i&&(i=a));if(c){e.splice(l--,1);var u=r();void 0!==u&&(t=u)}}return t}a=a||0;for(var l=e.length;l>0&&e[l-1][2]>a;l--)e[l]=e[l-1];e[l]=[o,r,a]}}(),function(){n.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return n.d(t,{a:t}),t}}(),function(){n.d=function(e,t){for(var o in t)n.o(t,o)&&!n.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})}}(),function(){n.f={},n.e=function(e){return Promise.all(Object.keys(n.f).reduce((function(t,o){return n.f[o](e,t),t}),[]))}}(),function(){n.u=function(e){return"js/"+e+"."+{1:"1f3eee4b",9:"229d177b",186:"3c69c14b",249:"16bd625e",326:"91cd8907",329:"b46c0785",413:"a7667d1c",426:"7e2218f7",449:"0e613887",500:"ec999443",523:"a30f5110",533:"a45c63cf",576:"7daf7e49",753:"5d019dbf",874:"ce4a7138",910:"efa87d19",965:"ae3491ca"}[e]+".js"}}(),function(){n.miniCssF=function(e){return"css/"+e+"."+{186:"ec4a02ab",249:"cffc36cd",326:"28dc0db7",329:"2da401e1",413:"248b1a4f",449:"fdef6f16",500:"f088ee50",576:"ec4a02ab",753:"870503b0",965:"ad39d7e9"}[e]+".css"}}(),function(){n.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"===typeof window)return window}}()}(),function(){n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)}}(),function(){var e={},t="vue:";n.l=function(o,r,a,i){if(e[o])e[o].push(r);else{var c,s;if(void 0!==a)for(var u=document.getElementsByTagName("script"),l=0;l<u.length;l++){var f=u[l];if(f.getAttribute("src")==o||f.getAttribute("data-webpack")==t+a){c=f;break}}c||(s=!0,c=document.createElement("script"),c.charset="utf-8",c.timeout=120,n.nc&&c.setAttribute("nonce",n.nc),c.setAttribute("data-webpack",t+a),c.src=o),e[o]=[r];var d=function(t,n){c.onerror=c.onload=null,clearTimeout(m);var r=e[o];if(delete e[o],c.parentNode&&c.parentNode.removeChild(c),r&&r.forEach((function(e){return e(n)})),t)return t(n)},m=setTimeout(d.bind(null,void 0,{type:"timeout",target:c}),12e4);c.onerror=d.bind(null,c.onerror),c.onload=d.bind(null,c.onload),s&&document.head.appendChild(c)}}}(),function(){n.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}}(),function(){n.p="/"}(),function(){var e=function(e,t,n,o){var r=document.createElement("link");r.rel="stylesheet",r.type="text/css";var a=function(a){if(r.onerror=r.onload=null,"load"===a.type)n();else{var i=a&&("load"===a.type?"missing":a.type),c=a&&a.target&&a.target.href||t,s=new Error("Loading CSS chunk "+e+" failed.\n("+c+")");s.code="CSS_CHUNK_LOAD_FAILED",s.type=i,s.request=c,r.parentNode.removeChild(r),o(s)}};return r.onerror=r.onload=a,r.href=t,document.head.appendChild(r),r},t=function(e,t){for(var n=document.getElementsByTagName("link"),o=0;o<n.length;o++){var r=n[o],a=r.getAttribute("data-href")||r.getAttribute("href");if("stylesheet"===r.rel&&(a===e||a===t))return r}var i=document.getElementsByTagName("style");for(o=0;o<i.length;o++){r=i[o],a=r.getAttribute("data-href");if(a===e||a===t)return r}},o=function(o){return new Promise((function(r,a){var i=n.miniCssF(o),c=n.p+i;if(t(i,c))return r();e(o,c,r,a)}))},r={143:0};n.f.miniCss=function(e,t){var n={186:1,249:1,326:1,329:1,413:1,449:1,500:1,576:1,753:1,965:1};r[e]?t.push(r[e]):0!==r[e]&&n[e]&&t.push(r[e]=o(e).then((function(){r[e]=0}),(function(t){throw delete r[e],t})))}}(),function(){var e={143:0};n.f.j=function(t,o){var r=n.o(e,t)?e[t]:void 0;if(0!==r)if(r)o.push(r[2]);else{var a=new Promise((function(n,o){r=e[t]=[n,o]}));o.push(r[2]=a);var i=n.p+n.u(t),c=new Error,s=function(o){if(n.o(e,t)&&(r=e[t],0!==r&&(e[t]=void 0),r)){var a=o&&("load"===o.type?"missing":o.type),i=o&&o.target&&o.target.src;c.message="Loading chunk "+t+" failed.\n("+a+": "+i+")",c.name="ChunkLoadError",c.type=a,c.request=i,r[1](c)}};n.l(i,s,"chunk-"+t,t)}},n.O.j=function(t){return 0===e[t]};var t=function(t,o){var r,a,i=o[0],c=o[1],s=o[2],u=0;if(i.some((function(t){return 0!==e[t]}))){for(r in c)n.o(c,r)&&(n.m[r]=c[r]);if(s)var l=s(n)}for(t&&t(o);u<i.length;u++)a=i[u],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(l)},o=self["webpackChunkvue"]=self["webpackChunkvue"]||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))}();var o=n.O(void 0,[998],(function(){return n(3217)}));o=n.O(o)})();
//# sourceMappingURL=app.ce69b5cf.js.map
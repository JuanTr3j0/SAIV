"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[281],{7032:function(e,a,o){o.r(a),o.d(a,{default:function(){return ue}});var t=o(3396),s=o(7139),n=o(9242);const r=e=>((0,t.dD)("data-v-4088573e"),e=e(),(0,t.Cn)(),e),i={class:"layout-container"},l={class:"layout-page"},c={class:"content-wrapper"},d=(0,t.uE)('<footer class="content-footer footer bg-footer-theme" data-v-4088573e><div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column" data-v-4088573e><div class="mb-2 mb-md-0 justify-content-end" data-v-4088573e> Desarrollado por <a href="https://bitzide.com/" target="_blank" class="footer-link fw-bolder" data-v-4088573e>Bitzide Logic</a></div></div></footer><div class="content-backdrop fade" data-v-4088573e></div>',2),u=r((()=>(0,t._)("div",{class:"layout-overlay layout-menu-toggle"},null,-1)));function m(e,a,o,r,m,p){const x=(0,t.up)("MenuVue"),b=(0,t.up)("BarraSuperiorVue"),v=(0,t.up)("router-view");return(0,t.wg)(),(0,t.iD)("div",{class:(0,s.C_)(["layout-wrapper layout-content-navbar",{"layout-menu-expanded active":e.store.state.SHOW_MENU}])},[(0,t._)("div",i,[(0,t.Wm)(x),(0,t._)("div",l,[(0,t.Wm)(b),(0,t._)("div",c,[(0,t.Wm)(v,null,{default:(0,t.w5)((({Component:e})=>[(0,t.Wm)(n.uT,{name:"scale",mode:"out-in"},{default:(0,t.w5)((()=>[((0,t.wg)(),(0,t.j4)((0,t.LL)(e)))])),_:2},1024)])),_:1}),d])])]),u],2)}const p=e=>((0,t.dD)("data-v-047bff4b"),e=e(),(0,t.Cn)(),e),x={id:"layout-menu",class:"layout-menu menu-vertical menu bg-menu-theme collapse-horizontal"},b={class:"app-brand"},v={href:"javascript:void(0);",class:"app-brand-link border border-2 my-3 border-primary rounded py-2 px-4 mx-auto"},w=p((()=>(0,t._)("span",{class:"app-brand-logo demo"},[(0,t._)("img",{src:"https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png",alt:"user-avatar",class:"d-block rounded-3 mx-auto",height:"60",width:"60",id:"uploadedAvatar"})],-1))),f={class:"app-brand-text menu-text fw-bolder ms-2",style:{"font-size":"22px"}},g=p((()=>(0,t._)("i",{class:"bx bx-chevron-left bx-sm align-middle"},null,-1))),_=[g],h=p((()=>(0,t._)("div",{class:"menu-inner-shadow"},null,-1))),k={class:"menu-inner py-1"},y={class:"menu-header-text"},S={key:1,class:"menu-icon tf-icons bx bx-table"},U={"data-i18n":"Tables"};function C(e,a,o,n,r,i){const l=(0,t.up)("router-link");return(0,t.wg)(),(0,t.iD)("aside",x,[(0,t._)("div",b,[(0,t._)("a",v,[w,(0,t._)("span",f,"SAIV"+(0,s.zw)(e.store.state.USUARIO.oficina),1)]),(0,t._)("a",{href:"javascript:void(0);",class:"layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none",onClick:a[0]||(a[0]=a=>e.store.state.SHOW_MENU=!e.store.state.SHOW_MENU)},_)]),h,(0,t._)("ul",k,[((0,t.wg)(!0),(0,t.iD)(t.HY,null,(0,t.Ko)(e.menu,((a,o)=>((0,t.wg)(),(0,t.iD)(t.HY,null,[a.acceso.includes(e.store.state.USUARIO.acceso)?((0,t.wg)(),(0,t.iD)(t.HY,{key:0},["encabezado"===a.tipo?((0,t.wg)(),(0,t.iD)("li",{class:"menu-header small text-uppercase text-start",key:o},[(0,t._)("span",y,(0,s.zw)(a.text),1)])):(0,t.kq)("",!0),"item"===a.tipo?((0,t.wg)(),(0,t.iD)("li",{class:"menu-item",key:o},[(0,t.Wm)(l,{to:a.url,class:"menu-link"},{default:(0,t.w5)((()=>["undefined"!==typeof a.icono?((0,t.wg)(),(0,t.iD)("i",{key:0,class:(0,s.C_)(a.icono)},null,2)):((0,t.wg)(),(0,t.iD)("i",S)),(0,t._)("div",U,(0,s.zw)(a.text),1)])),_:2},1032,["to"])])):(0,t.kq)("",!0)],64)):(0,t.kq)("",!0)],64)))),256))])])}var D=o(4239),z=(0,t.aZ)({setup:()=>{const e=["Administrador","Super Administrador"],a=["Usuario","Super Administrador","Administrador"];return{menu:[{tipo:"encabezado",text:"Usuario",acceso:a},{tipo:"item",text:"Perfil",url:"/saiv/perfil",icono:"bx bx-user bx-sm mx-2",acceso:a},{tipo:"encabezado",text:"SIAV"+D.Z.state.USUARIO.oficina,acceso:a},{tipo:"item",text:"Registro Casos",url:"/saiv/casos",icono:"bx bxs-box bx-sm mx-2",acceso:a},{tipo:"item",text:"Seguimiento Jurídico",url:"/saiv/seguimiento/juridico",icono:"bx bxs-building-house bx-sm mx-2",acceso:a},{tipo:"item",text:"Atención Ludoteca",url:"/saiv/ludoteca",icono:"bx bxs-calendar-event bx-sm mx-2",acceso:a},{tipo:"encabezado",text:"Cámara Gesell",acceso:a},{tipo:"item",text:"Programación Cámara Gesell",url:"/saiv/camara/gessell/programacion",icono:"bx bxs-food-menu bx-sm mx-2",acceso:a},{tipo:"item",text:"Menores de Edad Cámara Gesell",url:"/saiv/camara/gessell/menores/edad",icono:"bx bxs-food-menu bx-sm mx-2",acceso:a},{tipo:"encabezado",text:"Administración",acceso:e},{tipo:"item",text:"Usuarias/os",url:"/saiv/usuarios",icono:"bx bx-group bx-sm mx-2",acceso:e},{tipo:"item",text:"Bitácora Errores",url:"/bitacora/errores",icono:"bx bxs-bug bx-sm mx-2",acceso:e}],store:D.Z}}}),A=o(89);const Z=(0,A.Z)(z,[["render",C],["__scopeId","data-v-047bff4b"]]);var I=Z;const O=e=>((0,t.dD)("data-v-37cf5e4e"),e=e(),(0,t.Cn)(),e),P={class:"layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme",id:"layout-navbar"},W={class:"layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"},j=O((()=>(0,t._)("i",{class:"bx bx-menu bx-sm"},null,-1))),H=[j],M={class:"navbar-nav-right d-flex align-items-center",id:"navbar-collapse"},E={class:"navbar-nav flex-row align-items-center ms-auto"},R={class:"nav-item lh-1"},V={class:"fw-semibold d-block",href:"#","data-icon":"octicon-star","data-size":"large","data-show-count":"true"},N=O((()=>(0,t._)("div",{class:"avatar avatar-online"},[(0,t._)("img",{src:"https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png",alt:"",class:"w-px-40 h-auto rounded-circle"})],-1))),B=[N],L={class:"dropdown-item",href:"#"},q={class:"d-flex"},G={class:"flex-grow-1 text-center"},Y={class:"fw-semibold d-block"},T={class:"text-muted"},F=O((()=>(0,t._)("div",{class:"dropdown-divider"},null,-1))),J=O((()=>(0,t._)("i",{class:"bx bx-user me-2"},null,-1))),K=O((()=>(0,t._)("span",{class:"align-middle"},"Mi Perfil",-1))),Q=O((()=>(0,t._)("div",{class:"dropdown-divider"},null,-1))),X=O((()=>(0,t._)("i",{class:"bx bx-power-off me-2"},null,-1))),$=O((()=>(0,t._)("span",{class:"align-middle"},"Cerrar Sesión",-1))),ee=[X,$];function ae(e,a,o,n,r,i){const l=(0,t.up)("router-link"),c=(0,t.up)("Popper");return(0,t.wg)(),(0,t.iD)("nav",P,[(0,t._)("div",W,[(0,t._)("a",{class:"nav-item nav-link px-0 me-xl-4",href:"javascript:void(0)",onClick:a[0]||(a[0]=a=>e.store.state.SHOW_MENU=!e.store.state.SHOW_MENU)},H)]),(0,t._)("div",M,[(0,t._)("ul",E,[(0,t._)("li",R,[(0,t._)("label",V,(0,s.zw)(e.store.state.USUARIO.acceso??"Desconocido"),1)])]),(0,t.Wm)(c,{class:"popper-theme text-start",arrow:"",show:e.showPopper},{content:(0,t.w5)((()=>[(0,t._)("button",L,[(0,t._)("div",q,[(0,t._)("div",G,[(0,t._)("span",Y,(0,s.zw)(e.store.state.USUARIO.usuario??"Desconocido"),1),(0,t._)("small",T,(0,s.zw)(e.store.state.USUARIO.correo??"Desconocido"),1)])])]),F,(0,t.Wm)(l,{to:{name:"perfil"},class:"dropdown-item"},{default:(0,t.w5)((()=>[J,K])),_:1}),Q,(0,t._)("button",{class:"dropdown-item",onClick:a[3]||(a[3]=(...a)=>e.cerrrarSesion&&e.cerrrarSesion(...a))},ee)])),default:(0,t.w5)((()=>[(0,t._)("a",{class:"nav-link dropdown-toggle hide-arrow",onClick:a[1]||(a[1]=a=>{e.showPopper=!e.showPopper}),onFocus:a[2]||(a[2]=(...a)=>e.falseShowPopper&&e.falseShowPopper(...a))},B,32)])),_:1},8,["show"])])])}var oe=o(3758),te=o(8419),se=o(4870),ne=o(1120),re={setup:()=>{const e=(0,se.iH)(!1),a=()=>{e.value=!1},o=async()=>{await te.Z.obtener("auth/logout"),localStorage.clear(),ne.Z.push({name:"acceso"})};return{cerrrarSesion:o,falseShowPopper:a,showPopper:e,store:D.Z}},components:{Popper:oe.Z}};const ie=(0,A.Z)(re,[["render",ae],["__scopeId","data-v-37cf5e4e"]]);var le=ie;null===localStorage.getItem("access_token")?(D.Z.commit("headerSesion"),ne.Z.push({name:"acceso"})):D.Z.commit("headerSesionOk");var ce=(0,t.aZ)({components:{MenuVue:I,BarraSuperiorVue:le},setup(){return{store:D.Z}}});const de=(0,A.Z)(ce,[["render",m],["__scopeId","data-v-4088573e"]]);var ue=de}}]);
//# sourceMappingURL=281.5e386782.js.map
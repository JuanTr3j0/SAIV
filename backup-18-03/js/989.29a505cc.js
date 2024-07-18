"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[989],{1787:function(e,a,l){l.d(a,{Z:function(){return h}});var o=l(3396),t=l(7139);const n={key:0,class:"input-group-text fw-bold text-primary"},i={key:0},s=["for"],r={key:0},d=["value","id","disabled"],u=(0,o._)("option",{value:null,selected:""},"Seleccione",-1),c=["value","selected"],p={key:3,class:"form-control text-primary fw-bold"};function g(e,a,l,g,b,m){return(0,o.wg)(),(0,o.iD)("div",{class:(0,t.C_)(e.clases??[])},[(e.clases??[]).includes("input-group")?((0,o.wg)(),(0,o.iD)("span",n,[e.obligatorio?((0,o.wg)(),(0,o.iD)("code",i,"*")):(0,o.kq)("",!0),(0,o.Uk)((0,t.zw)(e.nombre),1)])):((0,o.wg)(),(0,o.iD)("label",{key:1,class:"fw-semibold d-block",for:e.id},[e.obligatorio?((0,o.wg)(),(0,o.iD)("code",r,"*")):(0,o.kq)("",!0),(0,o.Uk)((0,t.zw)(e.nombre),1)],8,s)),!0!==(e.showVer??!1)?((0,o.wg)(),(0,o.iD)("select",{key:2,class:"form-select",value:e.opcion??"Seleccione",id:e.id,"aria-label":"Default select",onInput:a[0]||(a[0]=(...a)=>e.updatedOpcion&&e.updatedOpcion(...a)),disabled:(e.showVer??!1)||e.loading||e.opciones.length<1||e.disabled},[u,((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.opciones,(a=>((0,o.wg)(),(0,o.iD)("option",{key:a,value:"object"===typeof a?a.key:a,selected:"object"===typeof a?a.key===e.opcion:a===e.opcion},(0,t.zw)("object"===typeof a?a.opcion:a),9,c)))),128))],40,d)):((0,o.wg)(),(0,o.iD)("label",p,(0,t.zw)(e.getItem(e.opciones,e.opcion)),1))],2)}var b=(0,o.aZ)({props:["tipo","clases","opciones","nombre","id","opcion","showVer","loading","obligatorio","disabled"],setup(e,{emit:a}){const l=e=>{let l="Seleccione"===e.target.value?null:e.target.value;a("update:opcion",l)},o=(e,a)=>{if("undefined"===typeof a||null===a)return"No Ingresado";if(0===(e??[]).length)return"Error Opciones no Cargadas...";let l=e[0];return"string"===typeof l?a:"object"===typeof l?e.find((e=>e.key===a)).opcion:void 0};return{updatedOpcion:l,getItem:o}}}),m=l(89);const w=(0,m.Z)(b,[["render",g]]);var h=w},8910:function(e,a,l){l.d(a,{Z:function(){return v}});var o=l(3396),t=l(7139);const n={class:"row"},i={class:"col-md-6"},s={"aria-label":"..."},r={class:"font-medium"},d={class:"col-md-6"},u={"aria-label":"..."},c={class:"pagination _pagination justify-content-end"},p=["onClick"],g={key:0},b={key:1};function m(e,a,l,m,w,h){return(0,o.wg)(),(0,o.iD)("div",n,[(0,o._)("div",i,[(0,o._)("nav",s,[(0,o._)("span",r,[(0,o.Uk)("Mostrando "),(0,o._)("strong",null,(0,t.zw)(e.current_page??0),1),(0,o.Uk)(" a "),(0,o._)("strong",null,(0,t.zw)(e.last_page??0),1),(0,o.Uk)(" de "),(0,o._)("strong",null,(0,t.zw)(e.total??0),1),(0,o.Uk)(" Registros.")])])]),(0,o._)("div",d,[(0,o._)("nav",u,[(0,o._)("ul",c,[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.links,((a,l)=>((0,o.wg)(),(0,o.iD)("li",{key:l,class:(0,t.C_)(["page-item mt-1",[a.active&&!e.loading?"active":null,a.url&&!e.loading?"":"disabled"]])},[(0,o._)("button",{class:"page-link","aria-disabled":"true",onClick:l=>e.HandleClick(a)},["Siguiente"===e.linkLabel(a)||"Anterior"===e.linkLabel(a)?((0,o.wg)(),(0,o.iD)("strong",g,[(0,o._)("i",{class:(0,t.C_)(["tf-icon bx",{"bx-chevrons-right":"Siguiente"===e.linkLabel(a)," bx-chevrons-left":"Anterior"===e.linkLabel(a)}])},null,2)])):((0,o.wg)(),(0,o.iD)("strong",b,(0,t.zw)(e.linkLabel(a)),1))],8,p)],2)))),128))])])])])}var w=(0,o.aZ)({props:["links","total","loading","last_page","current_page"],setup(e,{emit:a}){const l=e=>e.label.includes("ext")?"Siguiente":e.label.includes("revious")?"Anterior":e.label,o=e=>{e.url&&a("PageChanged",e.url+"")};return{HandleClick:o,linkLabel:l}}}),h=l(89);const y=(0,h.Z)(w,[["render",m],["__scopeId","data-v-ac2e16e4"]]);var v=y},3989:function(e,a,l){l.d(a,{Z:function(){return O}});var o=l(3396),t=l(7139),n=l(9242);const i=e=>((0,o.dD)("data-v-59f06c82"),e=e(),(0,o.Cn)(),e),s={class:"row mb-1"},r={class:"col-12 d-inline-flex mb-2"},d={key:0,class:"spinner-border text-primary ms-auto",role:"status"},u=i((()=>(0,o._)("span",{class:"visually-hidden"},"Cargando...",-1))),c=[u],p={class:"col-sm-12 col-md-12 m-1 col-lg-4"},g={class:"input-group"},b=["disabled"],m=i((()=>(0,o._)("i",{class:"bx bx-search"},null,-1))),w=[m],h={key:0,class:"col-sm-12 col-md-12 m-1 col-lg-3"},y={class:"input-group border-primary flex justify-content-end"},v={class:"input-group-text border-primary bg-primary text-white text-center border-white",for:"tipo-caso"},_=i((()=>(0,o._)("i",{class:"bx bxs-label"},null,-1))),k=["value"],f={class:"row"},x={key:0,class:"ms-md-auto ms-lg-auto col-sm-auto col-md-auto col-lg-2 my-1"},D={class:"input-group input-group-sm"},C=i((()=>(0,o._)("span",{class:"input-group-text border-primary bg-primary fw-bold text-white text-center border-white",for:"tipo-caso"},[(0,o.Uk)(" Periodo"),(0,o._)("i",{class:"bx bxs-label"})],-1))),z={class:"input-group input-group-sm"},H=i((()=>(0,o._)("span",{class:"input-group-text border-primary bg-primary fw-bold text-white text-center border-white",for:"tipo-caso"},[(0,o.Uk)("Mostrar Registros"),(0,o._)("i",{class:"bx bxs-label"})],-1))),I=["value","selected"],U={class:"border border-primary rounded-3 overflow-auto tableFixHead"},S={class:"table table-responsive table-bordered table-striped m-0"},P=["disabled","onClick"],F={key:0},Z=["colspan"],q={class:"mt-2"};function A(e,a,l,i,u,m){const A=(0,o.up)("Pagination"),R=(0,o.Q2)("auto-animate");return(0,o.wg)(),(0,o.iD)("div",null,[(0,o._)("div",s,[(0,o._)("div",r,[(0,o.WI)(e.$slots,"button",{},void 0,!0),(0,o._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:a[0]||(a[0]=(...a)=>e.handleActualizarDatos&&e.handleActualizarDatos(...a))},[(0,o._)("i",{class:(0,t.C_)(["bx bx-flip-horizontal",e.loading?"bx-spin bx-loader-alt":" bx-refresh"]),style:{"font-size":"20px"}},null,2),(0,o.Uk)(" Actualizar ")]),(0,o.WI)(e.$slots,"buttons",{},void 0,!0),e.loading?((0,o.wg)(),(0,o.iD)("div",d,c)):(0,o.kq)("",!0)]),(0,o._)("div",p,[(0,o._)("div",g,[(0,o.wy)((0,o._)("input",{type:"search",class:"form-control",onKeyup:a[1]||(a[1]=(0,n.D2)(((...a)=>e.handleActualizarDatos&&e.handleActualizarDatos(...a)),["enter"])),placeholder:"Busqueda","aria-label":"Busqueda","onUpdate:modelValue":a[2]||(a[2]=a=>e.busqueda=a),"aria-describedby":"button-addon2"},null,544),[[n.nr,e.busqueda]]),(0,o._)("button",{class:"btn btn-primary",type:"button",onClick:a[3]||(a[3]=a=>{e.handleResetUrl(),e.handleActualizarDatos()}),disabled:e.loading},w,8,b)])]),(0,o.WI)(e.$slots,"col",{},void 0,!0),e.arrayFiltro&&e.titleFiltro?((0,o.wg)(),(0,o.iD)("div",h,[(0,o._)("div",y,[(0,o._)("span",v,[(0,o.Uk)((0,t.zw)(e.titleFiltro),1),_]),(0,o.wy)((0,o._)("select",{class:"form-select bg-primary text-white",id:"tipo-caso","onUpdate:modelValue":a[4]||(a[4]=a=>e.tipoFiltro=a),onChange:a[5]||(a[5]=a=>e.handleChangeFiltro(e.tipoFiltro))},[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.arrayFiltro,(e=>((0,o.wg)(),(0,o.iD)("option",{key:e,class:"bg-primary text-white",value:e},(0,t.zw)(e),9,k)))),128))],544),[[n.bM,e.tipoFiltro]])])])):(0,o.kq)("",!0)]),(0,o.wy)(((0,o.wg)(),(0,o.iD)("div",f,[(e.periodos??[]).length>0?((0,o.wg)(),(0,o.iD)("div",x,[(0,o._)("div",D,[C,(0,o.wy)((0,o._)("select",{class:"form-select bg-label-primary border-primary text-white",id:"table-opciones-id","onUpdate:modelValue":a[6]||(a[6]=a=>e.periodo=a),onChange:a[7]||(a[7]=a=>{e.handleChangePeriodo()})},[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.periodos??[],(e=>((0,o.wg)(),(0,o.iD)("option",{key:e,class:"bg-label-primary text-white fw-bold"},(0,t.zw)(e),1)))),128))],544),[[n.bM,e.periodo]])])])):(0,o.kq)("",!0),(0,o._)("div",{class:(0,t.C_)(["col-sm-auto col-md-auto col-lg-3 my-1",{"ms-md-auto ms-lg-auto col-sm-auto":!(e.periodos??[]).length>0}])},[(0,o._)("div",z,[H,(0,o.wy)((0,o._)("select",{class:"form-select bg-label-primary border-primary text-white",id:"table-opciones-id","onUpdate:modelValue":a[8]||(a[8]=a=>e.pageSize=a),onChange:a[9]||(a[9]=a=>{e.handleResetUrl(),e.handleActualizarDatos()})},[((0,o.wg)(),(0,o.iD)(o.HY,null,(0,o.Ko)([5,10,15,20,25,30,50,100],(a=>(0,o._)("option",{key:a,class:"bg-label-primary text-white fw-bold font-weight-bold",value:a,selected:a===e.pageSize},(0,t.zw)(a),9,I))),64))],544),[[n.bM,e.pageSize]])])],2)])),[[R]]),(0,o._)("div",U,[(0,o._)("table",S,[(0,o._)("thead",null,[(0,o._)("tr",null,[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.columnasProp??[],((a,l)=>((0,o.wg)(),(0,o.iD)("td",{key:l,style:{},class:(0,t.C_)([a.class,"text-nowrap"])},[(0,o.Uk)((0,t.zw)(a.nombre)+" ",1),a.sort?((0,o.wg)(),(0,o.iD)("button",{key:0,type:"button",disabled:e.loading,class:"btn btn-xs btn-primary border border-primary rounded-1",onClick:l=>{e.handlechangeSort(a)}},[(0,o._)("i",{class:(0,t.C_)(["bx",[a.sortIcon,"bx-minus"!==a.sortIcon?"bx-flashing":""]])},null,2)],8,P)):(0,o.kq)("",!0)],2)))),128))])]),(0,o.wy)(((0,o.wg)(),(0,o.iD)("tbody",null,[0===e.data.length?((0,o.wg)(),(0,o.iD)("tr",F,[(0,o._)("td",{colspan:e.columnasProp.length+"",class:"text-center"},[(0,o._)("div",null,[(0,o._)("i",{class:(0,t.C_)(["bx bxs-data",e.loading?"bx-tada":null]),style:{"font-size":"55px"}},null,2),(0,o._)("h5",q,(0,t.zw)(e.loading?"Cargando...":"No Datos"),1)])],8,Z)])):(0,o.WI)(e.$slots,"tbody",{key:1},void 0,!0)])),[[R,{duration:200}]])])]),(0,o.Wm)(A,{links:e.links,loading:e.loading,current_page:e.current_page,last_page:e.last_page,total:e.total,onPageChanged:e.HandlePageChanged},null,8,["links","loading","current_page","last_page","total","onPageChanged"])])}var R=l(4870),L=l(4239),V=l(8910),j=l(4009),K=l(1787),E=(0,o.aZ)({props:["arrayFiltro","titleFiltro","classTable","columnas","periodos","url"],watch:{periodos(e){(e??0===[].length)&&(this.periodo=null),(e??[]).length>0&&(this.periodo=this.periodos[0]),this.handleChangePeriodo()}},setup(e,{emit:a}){const l=(0,R.iH)(10),t=(0,R.iH)(e.columnas),n=(0,R.iH)(!1),i=(0,R.iH)(!0),s=(0,R.iH)([]),r=(0,R.iH)(L.Z.state.URL_SERVER+e.url),d=(0,R.iH)(L.Z.state.URL_SERVER+e.url),u=(0,R.iH)([]),c=(0,R.iH)(null),p=(0,R.iH)(!1),g=(0,R.iH)(null),b=(0,R.iH)("Todos"),m=(0,R.iH)(null),w=(0,R.iH)(null),h=(0,R.iH)(null),y=(0,R.iH)(null),v=async()=>{C(),await _()},_=async()=>{i.value=!0,a("handleChangedLoading",i.value);const e=t.value.map((e=>({columna:e.nombre,sort:e.sort,order:f(e.sortIcon)}))),o=await j.Z.datosTabla({periodo:y.value,filtro:g.value,busqueda:c.value,porPagina:parseInt(l.value),ordenColumnas:e},d.value);s.value=o.data,u.value=o.links,i.value=o.cargando,m.value=o.current_page,w.value=o.last_page,h.value=o.total,a("handleChangedData",s.value),a("handleChangedLoading",i.value)},k=async e=>{d.value=e,await _()},f=e=>{if("undefined"===typeof e||null===e)return null;let a=null;return a="bx-sort-down"===e?"Desc":"bx-sort-up"===e?"Asc":null,a},x=async()=>{await _()},D=async e=>{g.value=e,await _()},C=()=>{d.value=r.value};(0,o.bv)((()=>{_()}));const z=e=>{e.sort&&(t.value.forEach((a=>{e.nombre!==a.nombre&&(a.sortIcon="bx-minus")})),"bx-minus"===e.sortIcon?e.sortIcon="bx-sort-down":"bx-sort-down"===e.sortIcon?e.sortIcon="bx-sort-up":"bx-sort-up"===e.sortIcon&&(e.sortIcon="bx-minus"),x())};return{url:d,data:s,links:u,periodo:y,loading:i,busqueda:c,pageSize:l,tipoFiltro:b,columnasProp:t,busquedaBoolean:p,pageSizeBoolean:n,current_page:m,last_page:w,total:h,handleResetUrl:C,handlechangeSort:z,HandlePageChanged:k,handleChangeFiltro:D,handleChangePeriodo:v,handleActualizarDatos:x}},components:{Pagination:V.Z,FormSelectOpcionVue:K.Z}}),Y=l(89);const M=(0,Y.Z)(E,[["render",A],["__scopeId","data-v-59f06c82"]]);var O=M}}]);
//# sourceMappingURL=989.29a505cc.js.map
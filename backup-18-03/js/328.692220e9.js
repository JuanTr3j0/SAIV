"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[328],{8640:function(a,e,o){o.r(e),o.d(e,{default:function(){return Ba}});var r=o(3396),n=o(7139);const t={class:"container-fluid flex-grow-1 container-p-y"},s={class:"fw-bold py-3 mb-4"},l={class:"text-muted fw-light text-center"},i=(0,r.Uk)(" Registro de Casos "),c={class:"card"},d={class:"card-body"},u=["disabled"],b=(0,r._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),h=(0,r.Uk)(" Nuevo "),v=[b,h],m={class:"text-nowrap fw-bold"},g={class:"text-nowrap fw-bold"},p={class:"text-nowrap"},w={class:"text-nowrap"},f={class:"text-nowrap"},x={class:"text-nowrap"},y={class:"text-nowrap"},C={class:"text-nowrap"},k={class:"text-nowrap"},A={id:"acciones",style:{padding:"0%"},class:"text-center"};function _(a,e,o,b,h,_){const H=(0,r.up)("AccionesTable"),D=(0,r.up)("TableVue"),R=(0,r.up)("ArchivosVue"),V=(0,r.up)("Modal"),z=(0,r.up)("FormCaso"),Z=(0,r.up)("AdvertenciaVue");return(0,r.wg)(),(0,r.iD)("div",t,[(0,r._)("h4",s,[(0,r._)("span",l,"SAIV"+(0,n.zw)(a.store.state.USUARIO.oficina)+" /",1),i]),(0,r._)("div",c,[(0,r._)("div",d,[(0,r.Wm)(D,{ref:"tablaCasosRef",columnas:a.columnas,url:a.urlTabla,periodos:a.periodos,titleFiltro:"Tipo de Denuncia",arrayFiltro:["Todos","Denuncia","Sin Denuncia","Diligencia"],onHandleChangedLoading:a.handleChangedLoading,onHandleChangedData:a.handleChangedData},{button:(0,r.w5)((()=>[(0,r._)("button",{class:"btn btn-primary m-1 justify-items-start",onClick:e[0]||(e[0]=(...e)=>a.handleClickNuevo&&a.handleClickNuevo(...e)),disabled:a.loading},v,8,u)])),tbody:(0,r.w5)((()=>[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.data,((e,o)=>((0,r.wg)(),(0,r.iD)("tr",{key:o},[(0,r._)("td",m,[(0,r._)("span",null,(0,n.zw)(e.codigo),1)]),(0,r._)("td",g,[(0,r._)("span",null,(0,n.zw)(e.fechaRegistro),1)]),(0,r._)("td",p,(0,n.zw)(e.tiposViolencia??"-"),1),(0,r._)("td",w,(0,n.zw)(e.modalidadViolencia??"-"),1),(0,r._)("td",f,(0,n.zw)(e.institucionRemitente??"-"),1),(0,r._)("td",x,(0,n.zw)(a.getValueLabel(e.institucionDondeSeRemite)??"-"),1),(0,r._)("td",y,(0,n.zw)(e.fechaHecho??"No ingresado"),1),(0,r._)("td",C,(0,n.zw)(e.departamento??"-"),1),(0,r._)("td",k,(0,n.zw)(e.municipio??"-"),1),(0,r._)("td",A,[(0,r.Wm)(H,{json:e,loading:a.loading,showArchivos:!0,showEditar:!0,showBorrar:!0,showVer:!0,onHandleClickVer:o=>a.handleClickVer(e),onHandleClickArchivos:o=>a.handleClickArchivos(e),onHandleClickEditar:o=>a.handleClickEditar(e),onHandleClickBorrar:o=>a.handleClickBorrar(e)},null,8,["json","loading","onHandleClickVer","onHandleClickArchivos","onHandleClickEditar","onHandleClickBorrar"])])])))),128))])),_:1},8,["columnas","url","periodos","onHandleChangedLoading","onHandleChangedData"])])]),(0,r.Wm)(V,{ref:"modalArchivosCasosRef",size:""},{cardBody:(0,r.w5)((()=>[(0,r.Wm)(R,{ref:"ArchivosCasosRef",onHandledDescargarArchivo:a.handledDescargarArchivo,onHandledBorrarArchivo:a.handledBorrarArchivo,loading:a.loading},null,8,["onHandledDescargarArchivo","onHandledBorrarArchivo","loading"])])),_:1},512),(0,r.Wm)(V,{ref:"modalCasoRef",onHandleActualizarDatosTabla:a.handleActualizarDatos},{cardBody:(0,r.w5)((()=>[(0,r.Wm)(z,{ref:"formCasoRef",onHandleActualizarDatosTabla:a.handleActualizarDatos,onHandledDescargarArchivo:a.handledDescargarArchivo,onHandledBorrarArchivo:a.handledBorrarArchivoCaso,loading:a.loading,showVer:a.showVer??!1},null,8,["onHandleActualizarDatosTabla","onHandledDescargarArchivo","onHandledBorrarArchivo","loading","showVer"])])),_:1},8,["onHandleActualizarDatosTabla"]),(0,r.Wm)(V,{ref:"modalCasoBorrarRef"},{cardBody:(0,r.w5)((()=>[(0,r.Wm)(Z,{ref:"advertenciaRef",mensaje:"El siguiente caso se borrara de la base de datos, ¿continuar?",onContinuar:a.borrarCaso},null,8,["onContinuar"])])),_:1},512)])}var H=o(4870),D=o(4059),R=o(9242);const V=a=>((0,r.dD)("data-v-3a2107d6"),a=a(),(0,r.Cn)(),a),z={class:"card p-2"},Z={class:"border border-primary border-3 rounded-2 text-center p-3"},B={key:0},I={class:"container-fluid p-1 mt-3"},T=V((()=>(0,r._)("h5",null,"Archivos (Servidor)",-1))),S={class:"list-group border border-1 border-primary text-start"},U=["disabled","onClick"],F=(0,r.Uk)(" Descargar "),M=V((()=>(0,r._)("i",{class:"bx bx-download"},null,-1))),E=[F,M],W=["disabled"],N=(0,r.Uk)(" Eliminar "),L=V((()=>(0,r._)("i",{class:"bx bx-x"},null,-1))),j=[N,L],K=V((()=>(0,r._)("div",{class:"dropdown-header"},[(0,r._)("h6",{class:"text-wrap text-nowrap"},[(0,r._)("strong",null,[(0,r.Uk)("Esta acción no se podra revertir,"),(0,r._)("br"),(0,r.Uk)(" ¿Continuar?")])])],-1))),P=["onClick","disabled"],O=V((()=>(0,r._)("i",{class:"bx bx-check"},null,-1))),Q=(0,r.Uk)(" Continuar "),Y=[O,Q],q=["onClick","disabled"],J=V((()=>(0,r._)("i",{class:"bx bx-x"},null,-1))),$=(0,r.Uk)(" Cancelar "),G=[J,$],X={class:"text-wrap text-nowrap mt-2 text-center"},aa=V((()=>(0,r._)("strong",null,[(0,r._)("i",{class:"bx bx-md bx-no-entry text-danger"}),(0,r.Uk)(" No existen archivos.")],-1))),ea=[aa],oa={class:"container-fluid text-end"},ra=["disabled"],na=V((()=>(0,r._)("i",{class:"bx bx-exit"},null,-1))),ta=(0,r.Uk)(" Salir "),sa=[na,ta];function la(a,e,o,t,s,l){const i=(0,r.up)("Popper"),c=(0,r.Q2)("auto-animate");return(0,r.wg)(),(0,r.iD)("div",z,[(0,r._)("div",Z,[a.titulo?((0,r.wg)(),(0,r.iD)("h4",B,[(0,r._)("strong",null,(0,n.zw)(a.titulo),1)])):(0,r.kq)("",!0),(0,r._)("div",I,[T,(0,r.wy)(((0,r.wg)(),(0,r.iD)("ul",S,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(a.archivos,(e=>((0,r.wg)(),(0,r.iD)("li",{class:"list-group-item",key:e.key},[(0,r._)("div",null,[(0,r._)("strong",null,(0,n.zw)(e.nombre_original),1)]),(0,r._)("div",null,[(0,r._)("button",{class:"btn btn-sm btn-success rounded-3 m-1",disabled:a.loading,onClick:o=>a.$emit("handledDescargarArchivo",e.key,e.nombre_original)},E,8,U),(0,r.Wm)(i,{class:"popper-theme text-start",arrow:""},{content:(0,r.w5)((({close:o})=>[K,(0,r._)("button",{class:"dropdown-item text-start-center",onClick:r=>{a.handledBorrarArchivo(e.key),o()},disabled:a.loading},Y,8,P),(0,r._)("button",{class:"dropdown-item text-start-center",onClick:a=>{o()},disabled:a.loading},G,8,q)])),default:(0,r.w5)((()=>[(0,r._)("button",{class:"btn btn-sm btn-danger rounded-3 m-1",disabled:a.loading},j,8,W)])),_:2},1024)])])))),128)),(0,r.wy)((0,r._)("h5",X,ea,512),[[R.F8,0===a.archivos.length]])])),[[c]])])]),(0,r._)("div",oa,[(0,r._)("button",{type:"button",class:"btn btn-secondary m-1 mt-3",disabled:a.loading,"data-bs-dismiss":"modal"},sa,8,ra)])])}var ia=o(3758),ca=(0,r.aZ)({props:["loading"],setup:(a,{emit:e})=>{const o=(0,H.iH)(null),r=(0,H.iH)(null),n=(0,H.iH)([]),t=a=>n.value=a,s=a=>o.value=a,l=a=>r.value=a,i=a=>e("handledBorrarArchivo",r.value,a);return{archivos:n,titulo:o,key:r,handledBorrarArchivo:i,cargarArchivos:t,cargarTitulo:s,cargarKey:l}},components:{Popper:ia.Z}}),da=o(89);const ua=(0,da.Z)(ca,[["render",la],["__scopeId","data-v-3a2107d6"]]);var ba=ua,ha=o(3989),va=o(5601);const ma={class:"modal fade",ref:"modalArchivos",id:"backDropModal","data-bs-backdrop":"static",tabindex:"-1"},ga=(0,r.uE)('<div class="modal-dialog modal-center"><form class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><ul class="list-group"><li class="list-group-item d-flex align-items-center"><div class="row"><div class="col-md-10"><i class="bx bx-file me-2"></i><span></span></div><div class="col-md-2 float-end text-center row"><button class="btn btn-sm btn-primary m-1"><i class="bx bx-download"></i></button><button class="btn btn-sm btn-danger m-1"><i class="bx bx-x"></i></button></div></div></li></ul></div></form></div>',1),pa=[ga];function wa(a,e,o,n,t,s){return(0,r.wg)(),(0,r.iD)("div",ma,pa,512)}var fa=o(2166),xa=o(8419),ya=(0,r.aZ)({props:["archivos","titulo"],setup(a){const e=(0,H.iH)(null),o=(0,H.iH)(a.archivos),r=(0,H.iH)(a.titulo),n=(0,H.iH)([]),t=()=>{new fa.u_(e.value).show()},s=a=>{n.value=a,n??=[]};return{tituloP:r,archivosP:o,modalArchivos:e,showModal:t,cargarArchivos:s}}});const Ca=(0,da.Z)(ya,[["render",wa]]);var ka=Ca,Aa=o(9684),_a=o(7783),Ha=o(1787),Da=o(4009),Ra=o(4239);const Va=[{nombre:"Codigo",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-sort-down",key:"codigo"},{nombre:"Fecha Registro",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"fechaRegistro"},{nombre:"Violencia",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"tiposViolencia"},{nombre:"Mod. Violencia",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"modalidadViolencia"},{nombre:"Instit. Que Remite",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"institucionRemitente"},{nombre:"Instit. Dónde se Remite",class:"text-center bg-label-primary text-white fw-bold",sort:!1,sortIcon:"bx-minus",key:"institucionDondeSeRemite"},{nombre:"Fecha Hecho",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"fechaHecho"},{nombre:"Departamento",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"departamento"},{nombre:"Municipio",class:"text-center bg-label-primary text-white fw-bold",sort:!0,sortIcon:"bx-minus",key:"municipio"},{nombre:"Acciones",class:"bg-primary text-white fw-bold text-center",sort:!1,sortIcon:"bx-minus",key:"acciones"}];var za=(0,r.aZ)({name:"casosView",components:{Modal:D.Z,FormCaso:va.Z,TableVue:ha.Z,ArchivosVue:ba,modalArchivos:ka,AccionesTable:_a.Z,AdvertenciaVue:Aa.Z,FormSelectOpcionVue:Ha.Z},setup(){const a=(0,H.iH)([]),e=(0,H.iH)(!0),o=(0,H.iH)(!1),n=(0,H.iH)("Todos"),t=(0,H.iH)(null),s=(0,H.iH)(null),l=(0,H.iH)(null),i=(0,H.iH)(null),c=(0,H.iH)(null),d=(0,H.iH)(null),u=(0,H.iH)(null),b=(0,H.iH)(null),h=(0,H.iH)([]);(0,r.bv)((async()=>{e.value=!0,await v(),e.value=!1}));const v=async()=>{try{const a=await xa.Z.obtener("saiv/casos/periodos");h.value=a??[]}catch(a){console.log(a)}},m=a=>e.value=a,g=e=>{a.value=e},p=a=>{e.value=a},w=()=>{o.value=null,s.value.resetForm(),t.value.showModal()},f=async(a,e)=>{try{await Da.Z.descargarArchivo("saiv/archivos/descargar/"+a,e)}catch(o){console.log(o)}},x=a=>{o.value=!0,R(a)},y=a=>{o.value=null,R(a)},C=a=>{i.value.setJson(a),d.value.showModal()},k=a=>A(a),A=async a=>{if("undefined"!==typeof a.key){m(!0);const e=await xa.Z.obtener("saiv/casos/obtener/"+a.key);c.value.cargarArchivos(e.archivosCasos),c.value.cargarKey(e.key),c.value.cargarTitulo(null===e?"":"Codigo: "+e.denuncia+" "+Z(e.correlativo,3)+"-"+Z(e.mes,2)+"-"+Z(e.anio,4)),b.value.showModal(),m(!1)}},_=async(a,e)=>{try{if("undefined"!==typeof e&&"undefined"!==typeof a){m(!0),await xa.Z.borrar("saiv/archivos/caso/eliminar/"+e);const o=await xa.Z.obtener("saiv/casos/obtener/"+a);c.value.cargarArchivos(o.archivosCasos),m(!1)}}catch(o){console.log(o)}},D=async(a,e)=>{try{if(console.log("archivo -> "+e),"undefined"!==typeof e&&"undefined"!==typeof a){m(!0),await xa.Z.borrar("saiv/archivos/caso/eliminar/"+e);const o=await xa.Z.obtener("saiv/casos/obtener/"+a);s.value.cargarArchivos(o.archivosCasos),m(!1)}}catch(o){console.log(o)}},R=async a=>{if("undefined"!==typeof a.key){m(!0),s.value.resetForm();let e=await xa.Z.obtener("saiv/casos/obtener/"+a.key);for(let a=0;a<e.agresores.length;a++){const o=e.agresores[a];e.agresores[a].edadDesconocida=1===parseInt(o.edadDesconocida),e.agresores[a].nombreDesconocido=1===parseInt(o.nombreDesconocido)}const o=e;s.value.editForm(o),s.value.visibleTab("agresores",o.agresores.length>0),s.value.visibleTab("responsables",null!==o.responsable.key),t.value.showModal(),m(!1)}},V=()=>{m(!0),l.value.handleActualizarDatos(),m(!1)},z=async a=>{"undefined"!==typeof a&&(m(!0),await xa.Z.borrarCaso({key:a},"saiv/casos/borrar"),l.value.handleActualizarDatos(),m(!1))},Z=(a,e)=>{if(null!==a){var o=Math.abs(a),r=a.toString().length,n="0";return e<=r?a<0?"-"+o.toString():o.toString():a<0?"-"+n.repeat(e-r)+o.toString():n.repeat(e-r)+o.toString()}return"?"},B=a=>{if(null===a||"undefined"===typeof a)return"No Ingresado";if("string"===typeof a)return a;if(Array.isArray(a)){if(0===a.length)return;var e="";let o=a;for(let a=0;a<o.length;a++){const r=o[a];"string"===typeof r?e+=r:"object"===typeof r&&(e+=r.opcion),e+=o.length-1===a?"":", "}return e+"."}};return{formCasoRef:s,modalCasoRef:t,modalCasoArchivosRef:u,tablaCasosRef:l,ArchivosCasosRef:c,modalArchivosCasosRef:b,modalCasoBorrarRef:d,advertenciaRef:i,data:a,showVer:o,loading:e,columnas:Va,tipoCaso:n,urlTabla:"saiv/casos/index",periodos:h,borrarCaso:z,getValueLabel:B,handleClickNuevo:w,handleChangedData:g,handleChangedLoading:p,handledBorrarArchivo:_,handleActualizarDatos:V,handledDescargarArchivo:f,handledBorrarArchivoCaso:D,handleClickArchivos:k,handleClickVer:x,handleClickEditar:y,handleClickBorrar:C,store:Ra.Z}}});const Za=(0,da.Z)(za,[["render",_]]);var Ba=Za}}]);
//# sourceMappingURL=328.692220e9.js.map
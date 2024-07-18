"use strict";(self["webpackChunkvue"]=self["webpackChunkvue"]||[]).push([[775],{4073:function(e,a,t){t.d(a,{Z:function(){return f}});var o=t(3396),n=t(7139);const s=e=>((0,o.dD)("data-v-fb412ae8"),e=e(),(0,o.Cn)(),e),l={style:{margin:"0%"}},r=["disabled"],i={key:0,class:"bx bx-dots-horizontal-rounded"},d={key:1,class:"spinner-grow spinner-grow-sm",role:"status"},c=s((()=>(0,o._)("span",{class:"visually-hidden"},"Cargando...",-1))),u=[c],b=["onClick"];function h(e,a,t,s,c,h){const w=(0,o.up)("Popper");return(0,o.wg)(),(0,o.iD)("div",l,[(0,o.Wm)(w,{class:"popper-theme text-start",arrow:""},{content:(0,o.w5)((({close:a})=>[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.botones,((t,s)=>((0,o.wg)(),(0,o.iD)(o.HY,{key:s},[t.show?((0,o.wg)(),(0,o.iD)("button",{class:"dropdown-item text-start-center",key:t.nombre,onClick:o=>{e.handleClick(t.metodo),a()}},[(0,o._)("i",{class:(0,n.C_)(["bx me-1",t.icon]),style:(0,n.j5)(t.style)},null,6),(0,o.Uk)(" "+(0,n.zw)(t.nombre),1)],8,b)):(0,o.kq)("",!0)],64)))),128))])),default:(0,o.w5)((()=>[(0,o._)("button",{type:"button",class:"btn p-0 dropdown-toggle hide-arrow border px-3 btn-primary",disabled:e.loading},[e.loading?((0,o.wg)(),(0,o.iD)("div",d,u)):((0,o.wg)(),(0,o.iD)("i",i))],8,r)])),_:1})])}var w=t(4870),m=t(3758),p=(0,o.aZ)({props:["loading","estado","json","showVer","showArchivos","showEditar","showBorrar","showEstado"],setup(e,{emit:a}){const t=(0,w.iH)(e.json),o=(0,w.iH)(e.estado),n=(0,w.iH)("undefined"!==typeof e.showVer),s=(0,w.iH)("undefined"!==typeof e.showArchivos),l=(0,w.iH)("undefined"!==typeof e.showEditar),r=(0,w.iH)("undefined"!==typeof e.showBorrar),i=(0,w.iH)("undefined"!==typeof e.showEstado),d="font-size:20px; ",c=e=>{a(e,t)};return{handleClick:c,botones:[{nombre:"Ver",icon:"bx-show ",show:n.value,metodo:"handleClickVer",style:d},{nombre:"Archivos",icon:"bx-file-find",show:s.value,metodo:"handleClickArchivos",style:d},{nombre:"Editar",icon:"bx-edit-alt",show:l.value,metodo:"handleClickEditar",style:d},{nombre:"Activo"===o.value?"Desactivar":"Activar",icon:"Activo"!==o.value?"bx-check":"bx-x",show:i.value,metodo:"handleClickEstado",style:d},{nombre:"Borrar",icon:"bx-trash",show:r.value,metodo:"handleClickBorrar",style:d}]}},components:{Popper:m.Z}}),g=t(89);const y=(0,g.Z)(p,[["render",h],["__scopeId","data-v-fb412ae8"]]);var f=y},5039:function(e,a,t){t.r(a),t.d(a,{default:function(){return A}});var o=t(3396),n=t(7139);const s={class:"container flex-grow-1 container-p-y"},l=(0,o._)("h4",{class:"fw-bold py-1 mb-2"},[(0,o._)("span",{class:"text-muted fw-light"},"Administración /"),(0,o.Uk)(" Usuarios ")],-1),r={class:"card"},i={class:"card-body"},d=["disabled"],c=(0,o._)("i",{class:"bx bx-plus",style:{"font-size":"20px"}},null,-1),u={class:"text-center"},b={class:"badge bg-primary me-1"},h={class:"text-center"},w={class:"badge bg-secondary me-1"},m={class:"text-center"},p={style:{padding:"0%"},class:"text-center"};function g(e,a,t,g,y,f){const x=(0,o.up)("AccionesTable"),v=(0,o.up)("TableVue"),k=(0,o.up)("FormUsuario"),C=(0,o.up)("Modal");return(0,o.wg)(),(0,o.iD)("div",s,[l,(0,o._)("div",r,[(0,o._)("div",i,[(0,o.Wm)(v,{columnas:e.columnas,url:e.urlTabla,onHandleChangedLoading:e.handleChangedLoading,onHandleChangedData:e.handleChangedData},{button:(0,o.w5)((()=>[(0,o._)("button",{class:"btn btn-primary m-1 justify-items-start",disabled:e.loading,onClick:a[0]||(a[0]=a=>{e.$refs.modalUsuarioRef.showModal()})},[c,(0,o.Uk)(" Nuevo ")],8,d)])),tbody:(0,o.w5)((()=>[((0,o.wg)(!0),(0,o.iD)(o.HY,null,(0,o.Ko)(e.data,((a,t)=>((0,o.wg)(),(0,o.iD)("tr",{key:t},[(0,o._)("td",null,(0,n.zw)(a.name),1),(0,o._)("td",u,[(0,o._)("span",b,(0,n.zw)(a.email),1)]),(0,o._)("td",h,[(0,o._)("span",w,(0,n.zw)(a.oficina),1)]),(0,o._)("td",m,[(0,o._)("span",{class:(0,n.C_)(["badge me-1","Activo"===a.estado?"bg-success":"bg-label-danger"])},(0,n.zw)(a.estado),3)]),(0,o._)("td",p,[(0,o.Wm)(x,{loading:e.loading,showEditar:!0,showEstado:!0,estado:a.estado},null,8,["loading","estado"])])])))),128))])),_:1},8,["columnas","url","onHandleChangedLoading","onHandleChangedData"])])]),(0,o.Wm)(C,{ref:"modalUsuarioRef"},{cardBody:(0,o.w5)((()=>[(0,o.Wm)(k,{ref:"formUsuarioRef"},null,512)])),_:1},512)])}var y=t(4870),f=t(2589),x=t(1339),v=t(4073),k=t(4876);const C=[{nombre:"Usuario",class:"text-center bg-primary text-white fw-bold",style:"",key:"usuario"},{nombre:"Correo",class:"text-center bg-label-primary text-white  text-center",style:"",key:"correo"},{nombre:"Oficina",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"oficina"},{nombre:"Estado",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"estado"},{nombre:"Acciones",class:"text-center bg-label-primary text-white fw-bold text-center",style:"",key:"acciones"}];var _=(0,o.aZ)({components:{Modal:f.Z,TableVue:x.Z,AccionesTable:v.Z,FormUsuario:k.Z},setup(){const e=(0,y.iH)([]),a=(0,y.iH)(!0),t=a=>{e.value=a},o=e=>{a.value=e};return{data:e,loading:a,columnas:C,urlTabla:"auth/index",fetch:fetch,handleChangedData:t,handleChangedLoading:o}}}),H=t(89);const D=(0,H.Z)(_,[["render",g]]);var A=D}}]);
//# sourceMappingURL=775.3451c0e6.js.map
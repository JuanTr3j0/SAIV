import { createStore } from 'vuex'

export default createStore({
  state: {
    
    //Usuario
    USUARIO:{ 
      permisos:localStorage.getItem('permisos'),
      usuario:localStorage.getItem('usuario'), 
      access_token:localStorage.getItem('access_token'), 
      correo:localStorage.getItem('correo'),
      oficina:localStorage.getItem('oficina'),
      acceso:localStorage.getItem('acceso'),
      
    },

    //Peticiones HTTP
    //URL_SERVER:'https://www.saiv.solidar-suisse-sv.org/apiPublic/api/', // Producción debe protocolo HTTPS
    URL_SERVER:'http://127.0.0.1:8000/api/', // Desarrollo debe protocolo HTTP
    HEADERS:null,
    
    //Menu
    Item:null,
    SubMenu:null,
    SHOW_MENU:true,
  },
  getters: {
    //Peticiones HTTP
    erroresResponse: () => response => {
      if (response) {
        if (response.status === 0) 
          return 'No existe conección verifique la red';
        else if (response.status == 404) 
          return 'No se encontró la página solicitada [404]';
        else if (response.status == 401) 
          return 'No autorizado [401]';
        else if (response.status == 419) 
          return 'Su sesión expiró [419]';
        else if (response.status == 500) 
          return 'Error interno del servidor [500].';
        else if (response.textStatus === 'parsererror') 
          return 'Error al analizar JSON solicitado.';
        else if (response.textStatus === 'timeout') 
          return 'Error de tiempo de espera.';
        else if (response.textStatus === 'abort') 
          return 'Solicitud de axios cancelada.';
        else 
          return 'Error no detectado: '+response.textStatus;          
      }else{
        return null;
      }
    }
  },
  mutations: {
    //Headers
    headerSesion : (state) => { state.HEADERS = {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    }},
    headerSesionOk : (state) => { state.HEADERS = {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'Authorization': 'Bearer '+localStorage.getItem('access_token'),
    }},
    sesion: (state, payload) =>{

      state.USUARIO.correo = payload.correo;
      state.USUARIO.usuario = payload.usuario;
      state.USUARIO.oficina = payload.oficina;
      state.USUARIO.access_token = payload.access_token;
      state.USUARIO.acceso = payload.acceso;

      localStorage.setItem('access_token', payload.access_token);
      localStorage.setItem('usuario', payload.usuario);
      localStorage.setItem('correo', payload.correo);
      localStorage.setItem('oficina', payload.oficina);
      localStorage.setItem('acceso', payload.acceso);
    },
    //Menu
    item: (state, payload) => { 
      state.SubMenu = null;
      state.Item = payload.Item;
    },
    menuItem: (state, payload) => {
      state.Item = payload.Item;
      state.SubMenu = payload.SubMenu;
    },  
  },
  actions:{
    refrescarSesion: async({ commit, state })=>{
      
      //localStorage.clear();
     
    }
  }
})

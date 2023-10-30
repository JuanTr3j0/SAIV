import axios from 'axios'
import store from '@/store'
import toast from './toast'
export default{
    datosTabla: async (params, url) => {  
        try {
            let cargando = true
            let data = []
            let links = []
            let total = 0
            let page = 0
            let current_page = 1;
            let last_page = null;
            let _json = null;
            let _error = null;
            let ok = false;
            await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: store.state.HEADERS,
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(params) // body data type must match "Content-Type" header
            })       
            .then(response => {
                ok = response.ok;
                if(response.status === 401){
                    localStorage.clear();
                    router.push({ name: "acceso"})
                }else if(response.status === 'undefined'){
                    router.push({ name: "/saiv/acceso"})
                }
                return response.json() 
            })
            .then(response => {   
                page            = response.page;
                data            = response.data;
                total           = response.total;
                links           = response.links;
                current_page    = response.current_page;
                last_page       = response.last_page;
                _json = response; 
            }). catch(error => {_error = error; cargando= false; })
    
            toast.toasPeticionesHttp(_json, _error, ok)
            
            cargando = false;
            return {
                total:total, 
                data: data, 
                page:page,
                links:links,
                cargando:cargando, 
                current_page:current_page,
                last_page:last_page
            }            
        } catch (error) {
            toast.toasPeticionesHttp(null, error, false);
            cargando = false;
        }
    },
    archivos: async (formData, url) => {      
        let _error = null;
        let _response = null;
        let response = await axios.post(store.state.URL_SERVER+url, formData, {headers: store.state.HEADERS})
        .then( function( response ){
            _response = response;
        }.bind(this))
        .catch( function( error ){
            _error = error;
        }.bind(this));
        //toast.toasPeticionesHttp(_response.data, _error, _response.status==200)
        return {data:_response.data, error:_error, status:_response.status}
         
    },
    descargarArchivo: async (url, _nombre) => {
        axios({
            url: store.state.URL_SERVER+url,
            method: 'GET',
            headers: store.state.HEADERS,
            responseType: 'blob',
        }).then((response) => {
            var fileURL = window.URL.createObjectURL(new Blob([response.data]));
            var fileLink = document.createElement('a');
        
            fileLink.href = fileURL;
            fileLink.setAttribute('download', _nombre);
            document.body.appendChild(fileLink);
        
            fileLink.click();
        });
    },
    post: async (json, url) =>{
        try {
            let _error = null;
            let _response = null;
            console.log(store.state.HEADERS)
            console.log(JSON.stringify(store.state.HEADERS))
            await axios.post(store.state.URL_SERVER+url, 
                json, { method:"POST", headers: JSON.stringify(store.state.HEADERS) }
            )
            .then( function( response ){
                _response = response;
            }.bind(this))
            .catch( function( error ){
                _error = error;
            }.bind(this));
            return { _response:_response, _error:_error }
        }catch(e) {
            console.log(e)
        }
    }
}
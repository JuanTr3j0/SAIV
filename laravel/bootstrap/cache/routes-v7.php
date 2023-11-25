<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/iniciar/sesion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vrc9SzrYlgESwgEP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/refrescar/sesion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yLVJ6jyzoUU1QJqc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vNyaZyb25w1OojL1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/registro' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s4cVFiYu9Jx3ncRr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dm46PO6K6GBnPk3d',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WbAEhfxrAkOfrItz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/auth/opciones' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i4GhtjcHyJJuvMYh',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/opciones/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wHAGOVToG82HEyC0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/opciones/seguimiento/juridico/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Jv8ZGDWRIZzeASAY',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/opciones/ludoteca/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hCKNRvEjZbhr6kwc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/archivos/cargar/caso' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d7HRdFd5fNcfG4Xq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6vSfuKZ6zPgG3dmb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::upWwP7dBsVYUNV7E',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::r2kWak6sgN7bilit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/periodos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dzNBjfp0Cfj8etTr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3c8XJsedk1jDkj68',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/casos/indexSelect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ABuSJIPH5vMGWJLU',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AP44xv7N5y36Gjbr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LSXTugvNzJsf2hh3',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/codigos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rq6DFIgmGOL1OY6Q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/fullcalendar/evenst' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zdsbNP8TbbuLuQEJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/OpcionesCasos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::y6xWB4VOy1LUk6SW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/seguimiento/juridico/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Qh9TeOuY200iysPc',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/ludoteca/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uOJ0IlNTzbVwwinm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/ludoteca/historico/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T7s3FmBONJCguEYt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/ludoteca/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bjKaJiy0nfMD7DPe',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/ludoteca/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bDw86PDZPx3zY0IK',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/programacion/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xMriQoVHUit0O0x8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/programacion/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dZGjz5Q2EvTgzcxr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/programacion/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8w2GfSmgbYGGP64H',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/programacion/fullcalendar/evenst' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KR2LWur5jaOjZGJo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/atencion/menores/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::epZThjo8ipU8yJmR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/atencion/menores/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nypN3eylurBxktqq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/atencion/menores/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yfCn2L9o6JUdGUTO',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/camara/gessell/atencion/menores/fullcalendar/evenst' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hKBf2BFNpnP6zEWo',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/agenda/guardar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MgO8Vbu02XWHJAMA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/agenda/borrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tv5zexUdyF9gloDX',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/agenda/ludoteca/fullcalendar/evenst' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z2Yv1xyjVPYJlXxP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/estadisticas/graficas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::odXcm9sS2NIHLc8w',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/estadisticas/periodos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A4DypIhMFeTfNg53',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/saiv/bitacora/errores/controller/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c5eRkwFh9eVYjc73',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Me7gQaqrkXXsLXRN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/api/(?|auth/(?|obtener/([^/]++)(*:139)|estado/([^/]++)(*:162))|saiv/(?|opciones/(?|municipios/([^/]++)(*:210)|seguimiento/juridico/atencionBrindada/([^/]++)(*:264))|a(?|rchivos/(?|show/caso/([^/]++)(*:306)|descargar/([^/]++)(*:332)|eliminar/([^/]++)(*:357)|caso/eliminar/([^/]++)(*:387))|genda/obtener/([^/]++)(*:418))|ca(?|sos/(?|obtener/([^/]++)(*:455)|cantidad/([^/]++)/([^/]++)(*:489))|mara/gessell/(?|programacion/obtener/([^/]++)(*:543)|atencion/menores/obtener/([^/]++)(*:584)))|seguimiento/juridico/obtener/([^/]++)(*:631)|ludoteca/obtener/([^/]++)(*:664)|descargar/excel/reporte/([^/]++)/([^/]++)/([^/]++)/([^/]++)(*:731))))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::PSz7TtpoeFp6ptst',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      162 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8ag4faB9Houqa6Y0',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::otR3tdA9WffYpcch',
          ),
          1 => 
          array (
            0 => 'departamento',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      264 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::J5gLRonfzhnC8QS9',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Q3sVAkGwa7gGA37O',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U9a1Td6LNdjQNaO3',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xVfbTIQSeOPvN9h5',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::b4GSURXRx7BJkYY5',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      418 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uXZyodptR6vdsNVI',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      455 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ODqqo7v2pMXk9ExM',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3Bdkj43jNCRDLw2j',
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'dui',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      543 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::P28pACWiLwL64ZcH',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      584 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xivq3QGaYwSwWoFJ',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      631 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YLOmPnvZjj8qMXBO',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      664 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vosznGdSzLVsieIZ',
          ),
          1 => 
          array (
            0 => 'key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      731 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hw1dVaaH3IQaWvQY',
          ),
          1 => 
          array (
            0 => 'reporte',
            1 => 'tipo',
            2 => 'mes',
            3 => 'anio',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'middleware' => 'web',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'uses' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => 'Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vrc9SzrYlgESwgEP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/iniciar/sesion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::vrc9SzrYlgESwgEP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yLVJ6jyzoUU1QJqc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/refrescar/sesion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@refrescarInfoSession',
        'controller' => 'App\\Http\\Controllers\\AuthController@refrescarInfoSession',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::yLVJ6jyzoUU1QJqc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vNyaZyb25w1OojL1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@index',
        'controller' => 'App\\Http\\Controllers\\AuthController@index',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::vNyaZyb25w1OojL1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s4cVFiYu9Jx3ncRr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/auth/registro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@signUp',
        'controller' => 'App\\Http\\Controllers\\AuthController@signUp',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::s4cVFiYu9Jx3ncRr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WbAEhfxrAkOfrItz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::WbAEhfxrAkOfrItz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::i4GhtjcHyJJuvMYh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/opciones',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@opciones',
        'controller' => 'App\\Http\\Controllers\\AuthController@opciones',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::i4GhtjcHyJJuvMYh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::PSz7TtpoeFp6ptst' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/auth/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@show',
        'controller' => 'App\\Http\\Controllers\\AuthController@show',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::PSz7TtpoeFp6ptst',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dm46PO6K6GBnPk3d' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/auth/registro',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@destroy',
        'controller' => 'App\\Http\\Controllers\\AuthController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::dm46PO6K6GBnPk3d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8ag4faB9Houqa6Y0' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/auth/estado/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@destroy',
        'controller' => 'App\\Http\\Controllers\\AuthController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/auth',
        'where' => 
        array (
        ),
        'as' => 'generated::8ag4faB9Houqa6Y0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wHAGOVToG82HEyC0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/opciones/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\OpcionesController@index',
        'controller' => 'App\\Http\\Controllers\\OpcionesController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/opciones',
        'where' => 
        array (
        ),
        'as' => 'generated::wHAGOVToG82HEyC0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::otR3tdA9WffYpcch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/opciones/municipios/{departamento}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\OpcionesController@getMunicipios',
        'controller' => 'App\\Http\\Controllers\\OpcionesController@getMunicipios',
        'namespace' => NULL,
        'prefix' => 'api/saiv/opciones',
        'where' => 
        array (
        ),
        'as' => 'generated::otR3tdA9WffYpcch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Jv8ZGDWRIZzeASAY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/opciones/seguimiento/juridico/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\OpcionesController@indexSeguimientoJuridico',
        'controller' => 'App\\Http\\Controllers\\OpcionesController@indexSeguimientoJuridico',
        'namespace' => NULL,
        'prefix' => 'api/saiv/opciones',
        'where' => 
        array (
        ),
        'as' => 'generated::Jv8ZGDWRIZzeASAY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hCKNRvEjZbhr6kwc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/opciones/ludoteca/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\OpcionesController@indexLudoteca',
        'controller' => 'App\\Http\\Controllers\\OpcionesController@indexLudoteca',
        'namespace' => NULL,
        'prefix' => 'api/saiv/opciones',
        'where' => 
        array (
        ),
        'as' => 'generated::hCKNRvEjZbhr6kwc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::J5gLRonfzhnC8QS9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/opciones/seguimiento/juridico/atencionBrindada/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\OpcionesController@indexSeguimientoJuridicoAtencionBrindada',
        'controller' => 'App\\Http\\Controllers\\OpcionesController@indexSeguimientoJuridicoAtencionBrindada',
        'namespace' => NULL,
        'prefix' => 'api/saiv/opciones',
        'where' => 
        array (
        ),
        'as' => 'generated::J5gLRonfzhnC8QS9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::d7HRdFd5fNcfG4Xq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/archivos/cargar/caso',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchivosController@cargarArchivosCaso',
        'controller' => 'App\\Http\\Controllers\\ArchivosController@cargarArchivosCaso',
        'namespace' => NULL,
        'prefix' => 'api/saiv/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::d7HRdFd5fNcfG4Xq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Q3sVAkGwa7gGA37O' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/archivos/show/caso/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchivosController@showArchivosCasos',
        'controller' => 'App\\Http\\Controllers\\ArchivosController@showArchivosCasos',
        'namespace' => NULL,
        'prefix' => 'api/saiv/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::Q3sVAkGwa7gGA37O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::U9a1Td6LNdjQNaO3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/archivos/descargar/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchivosController@descargarArchivo',
        'controller' => 'App\\Http\\Controllers\\ArchivosController@descargarArchivo',
        'namespace' => NULL,
        'prefix' => 'api/saiv/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::U9a1Td6LNdjQNaO3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xVfbTIQSeOPvN9h5' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/archivos/eliminar/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchivosController@eliminarArchivo',
        'controller' => 'App\\Http\\Controllers\\ArchivosController@eliminarArchivo',
        'namespace' => NULL,
        'prefix' => 'api/saiv/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::xVfbTIQSeOPvN9h5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::b4GSURXRx7BJkYY5' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/archivos/caso/eliminar/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ArchivosController@eliminarArchivoCaso',
        'controller' => 'App\\Http\\Controllers\\ArchivosController@eliminarArchivoCaso',
        'namespace' => NULL,
        'prefix' => 'api/saiv/archivos',
        'where' => 
        array (
        ),
        'as' => 'generated::b4GSURXRx7BJkYY5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6vSfuKZ6zPgG3dmb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/casos/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@index',
        'controller' => 'App\\Http\\Controllers\\CasosController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::6vSfuKZ6zPgG3dmb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::upWwP7dBsVYUNV7E' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/casos/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@store',
        'controller' => 'App\\Http\\Controllers\\CasosController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::upWwP7dBsVYUNV7E',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::r2kWak6sgN7bilit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/casos/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@showCaso',
        'controller' => 'App\\Http\\Controllers\\CasosController@showCaso',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::r2kWak6sgN7bilit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ODqqo7v2pMXk9ExM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/casos/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@showCaso',
        'controller' => 'App\\Http\\Controllers\\CasosController@showCaso',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::ODqqo7v2pMXk9ExM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dzNBjfp0Cfj8etTr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/casos/periodos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@showPeriodos',
        'controller' => 'App\\Http\\Controllers\\CasosController@showPeriodos',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::dzNBjfp0Cfj8etTr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3Bdkj43jNCRDLw2j' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/casos/cantidad/{key}/{dui}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@obtenerCasosPersonas',
        'controller' => 'App\\Http\\Controllers\\CasosController@obtenerCasosPersonas',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::3Bdkj43jNCRDLw2j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::3c8XJsedk1jDkj68' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/casos/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@destroy',
        'controller' => 'App\\Http\\Controllers\\CasosController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::3c8XJsedk1jDkj68',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ABuSJIPH5vMGWJLU' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/casos/indexSelect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\CasosController@indexSelect',
        'controller' => 'App\\Http\\Controllers\\CasosController@indexSelect',
        'namespace' => NULL,
        'prefix' => 'api/saiv/casos',
        'where' => 
        array (
        ),
        'as' => 'generated::ABuSJIPH5vMGWJLU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AP44xv7N5y36Gjbr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@index',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::AP44xv7N5y36Gjbr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::LSXTugvNzJsf2hh3' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@store',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::LSXTugvNzJsf2hh3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YLOmPnvZjj8qMXBO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@show',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@show',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::YLOmPnvZjj8qMXBO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rq6DFIgmGOL1OY6Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/codigos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@getCodigosCasos',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@getCodigosCasos',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::rq6DFIgmGOL1OY6Q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zdsbNP8TbbuLuQEJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/fullcalendar/evenst',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@fullCalendarEvents',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@fullCalendarEvents',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::zdsbNP8TbbuLuQEJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::y6xWB4VOy1LUk6SW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/OpcionesCasos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@cambiarOpcionesCaso',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@cambiarOpcionesCaso',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::y6xWB4VOy1LUk6SW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Qh9TeOuY200iysPc' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/seguimiento/juridico/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@destroy',
        'controller' => 'App\\Http\\Controllers\\SeguimientoJuridicoController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/seguimiento/juridico',
        'where' => 
        array (
        ),
        'as' => 'generated::Qh9TeOuY200iysPc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uOJ0IlNTzbVwwinm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/ludoteca/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\LudotecaController@index',
        'controller' => 'App\\Http\\Controllers\\LudotecaController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/ludoteca',
        'where' => 
        array (
        ),
        'as' => 'generated::uOJ0IlNTzbVwwinm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T7s3FmBONJCguEYt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/ludoteca/historico/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\LudotecaController@indexHistorico',
        'controller' => 'App\\Http\\Controllers\\LudotecaController@indexHistorico',
        'namespace' => NULL,
        'prefix' => 'api/saiv/ludoteca',
        'where' => 
        array (
        ),
        'as' => 'generated::T7s3FmBONJCguEYt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bjKaJiy0nfMD7DPe' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/ludoteca/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\LudotecaController@store',
        'controller' => 'App\\Http\\Controllers\\LudotecaController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/ludoteca',
        'where' => 
        array (
        ),
        'as' => 'generated::bjKaJiy0nfMD7DPe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::vosznGdSzLVsieIZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/ludoteca/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\LudotecaController@show',
        'controller' => 'App\\Http\\Controllers\\LudotecaController@show',
        'namespace' => NULL,
        'prefix' => 'api/saiv/ludoteca',
        'where' => 
        array (
        ),
        'as' => 'generated::vosznGdSzLVsieIZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::bDw86PDZPx3zY0IK' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/ludoteca/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\LudotecaController@destroy',
        'controller' => 'App\\Http\\Controllers\\LudotecaController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/ludoteca',
        'where' => 
        array (
        ),
        'as' => 'generated::bDw86PDZPx3zY0IK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xMriQoVHUit0O0x8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/camara/gessell/programacion/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ProgramacionController@index',
        'controller' => 'App\\Http\\Controllers\\ProgramacionController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/programacion',
        'where' => 
        array (
        ),
        'as' => 'generated::xMriQoVHUit0O0x8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::dZGjz5Q2EvTgzcxr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/camara/gessell/programacion/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ProgramacionController@store',
        'controller' => 'App\\Http\\Controllers\\ProgramacionController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/programacion',
        'where' => 
        array (
        ),
        'as' => 'generated::dZGjz5Q2EvTgzcxr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::P28pACWiLwL64ZcH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/camara/gessell/programacion/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ProgramacionController@show',
        'controller' => 'App\\Http\\Controllers\\ProgramacionController@show',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/programacion',
        'where' => 
        array (
        ),
        'as' => 'generated::P28pACWiLwL64ZcH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8w2GfSmgbYGGP64H' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/camara/gessell/programacion/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ProgramacionController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProgramacionController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/programacion',
        'where' => 
        array (
        ),
        'as' => 'generated::8w2GfSmgbYGGP64H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KR2LWur5jaOjZGJo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/camara/gessell/programacion/fullcalendar/evenst',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ProgramacionController@fullCalendarEvents',
        'controller' => 'App\\Http\\Controllers\\ProgramacionController@fullCalendarEvents',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/programacion',
        'where' => 
        array (
        ),
        'as' => 'generated::KR2LWur5jaOjZGJo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::epZThjo8ipU8yJmR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/camara/gessell/atencion/menores/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@index',
        'controller' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/atencion/menores',
        'where' => 
        array (
        ),
        'as' => 'generated::epZThjo8ipU8yJmR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nypN3eylurBxktqq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/camara/gessell/atencion/menores/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@store',
        'controller' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/atencion/menores',
        'where' => 
        array (
        ),
        'as' => 'generated::nypN3eylurBxktqq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xivq3QGaYwSwWoFJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/camara/gessell/atencion/menores/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@show',
        'controller' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@show',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/atencion/menores',
        'where' => 
        array (
        ),
        'as' => 'generated::xivq3QGaYwSwWoFJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yfCn2L9o6JUdGUTO' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/camara/gessell/atencion/menores/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@destroy',
        'controller' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/atencion/menores',
        'where' => 
        array (
        ),
        'as' => 'generated::yfCn2L9o6JUdGUTO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hKBf2BFNpnP6zEWo' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/camara/gessell/atencion/menores/fullcalendar/evenst',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@fullCalendarEvents',
        'controller' => 'App\\Http\\Controllers\\AtencionMenoresEdadController@fullCalendarEvents',
        'namespace' => NULL,
        'prefix' => 'api/saiv/camara/gessell/atencion/menores',
        'where' => 
        array (
        ),
        'as' => 'generated::hKBf2BFNpnP6zEWo',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MgO8Vbu02XWHJAMA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/agenda/guardar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AgendaController@store',
        'controller' => 'App\\Http\\Controllers\\AgendaController@store',
        'namespace' => NULL,
        'prefix' => 'api/saiv/agenda',
        'where' => 
        array (
        ),
        'as' => 'generated::MgO8Vbu02XWHJAMA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uXZyodptR6vdsNVI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/agenda/obtener/{key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AgendaController@show',
        'controller' => 'App\\Http\\Controllers\\AgendaController@show',
        'namespace' => NULL,
        'prefix' => 'api/saiv/agenda',
        'where' => 
        array (
        ),
        'as' => 'generated::uXZyodptR6vdsNVI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tv5zexUdyF9gloDX' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/saiv/agenda/borrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AgendaController@destroy',
        'controller' => 'App\\Http\\Controllers\\AgendaController@destroy',
        'namespace' => NULL,
        'prefix' => 'api/saiv/agenda',
        'where' => 
        array (
        ),
        'as' => 'generated::tv5zexUdyF9gloDX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Z2Yv1xyjVPYJlXxP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/agenda/ludoteca/fullcalendar/evenst',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\AgendaController@fullCalendarEventsLudoteca',
        'controller' => 'App\\Http\\Controllers\\AgendaController@fullCalendarEventsLudoteca',
        'namespace' => NULL,
        'prefix' => 'api/saiv/agenda',
        'where' => 
        array (
        ),
        'as' => 'generated::Z2Yv1xyjVPYJlXxP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::odXcm9sS2NIHLc8w' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/estadisticas/graficas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\GraficasController@getGrafica',
        'controller' => 'App\\Http\\Controllers\\GraficasController@getGrafica',
        'namespace' => NULL,
        'prefix' => 'api/saiv/estadisticas',
        'where' => 
        array (
        ),
        'as' => 'generated::odXcm9sS2NIHLc8w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A4DypIhMFeTfNg53' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/estadisticas/periodos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\GraficasController@getPeriodos',
        'controller' => 'App\\Http\\Controllers\\GraficasController@getPeriodos',
        'namespace' => NULL,
        'prefix' => 'api/saiv/estadisticas',
        'where' => 
        array (
        ),
        'as' => 'generated::A4DypIhMFeTfNg53',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::c5eRkwFh9eVYjc73' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/saiv/bitacora/errores/controller/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador',
        ),
        'uses' => 'App\\Http\\Controllers\\BitacoraErroresController@index',
        'controller' => 'App\\Http\\Controllers\\BitacoraErroresController@index',
        'namespace' => NULL,
        'prefix' => 'api/saiv/bitacora/errores/controller',
        'where' => 
        array (
        ),
        'as' => 'generated::c5eRkwFh9eVYjc73',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hw1dVaaH3IQaWvQY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/saiv/descargar/excel/reporte/{reporte}/{tipo}/{mes}/{anio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Super Administrador|Administrador|Usuario',
        ),
        'uses' => 'App\\Http\\Controllers\\ExcelController@casos',
        'controller' => 'App\\Http\\Controllers\\ExcelController@casos',
        'namespace' => NULL,
        'prefix' => 'api/saiv/descargar/excel',
        'where' => 
        array (
        ),
        'as' => 'generated::hw1dVaaH3IQaWvQY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Me7gQaqrkXXsLXRN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:288:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:70:"function () {
    return [\'Laravel Version\' => \\app()->version()];
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000040c0000000000000000";}";s:4:"hash";s:44:"UfqigplsWsJvi1jNGBadGTP9bnF3naCAxJybEzOhIYk=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Me7gQaqrkXXsLXRN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);

Ext.Loader.setConfig({
    enable: true,
    paths: {
        'Ext': 'ext-4/src',
        'NCS': 'app'
    }
});

Ext.application({
    extend: 'Ext.app.Application',
    name: 'NCS',

    launch: function() {
        console.log('Aplicação principal foi iniciada');
        console.log('Carregando aplicação de login.');

        Ext.application('NCS.app.auth.Login');
    }
});
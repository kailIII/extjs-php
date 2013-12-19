Ext.define('NCS.app.auth.Login', {
    extend: 'Ext.app.Application',
    name: 'NCS',

    controllers: [
        'auth.Login'
    ],

    launch: function() {
        console.log('Aplicação de Login iniciada.');
        console.log('Abre a janela de Login');
        
        Ext.create('NCS.view.auth.login.Window');
    }
})
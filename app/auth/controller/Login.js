Ext.define('NCS.controller.auth.Login',{
    extend: 'Ext.app.Controller',

    views: [
        'auth.login.Window'
    ],

    init: function() {
        console.log('Controller Login iniciado');

        this.control({
            'authLoginWindow button[action=login]': {
                click: this.actionLogin
            }
        });
    },

    actionLogin: function(button) {
        console.log('Clicou no botão de Login.');
    }
});
Ext.define('NCS.view.auth.login.Window', {
    extend: 'Ext.window.Window',
    alias: 'widget.authLoginWindow',
    
    title: 'Login',
    layout: 'fit',
    autoShow: true,
    closable: false,
    draggable: false,
    resizable: false,

    initComponent: function() {
        var me = this;
        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    border: false,
                    margins: '8px',
                    items: [
                        {
                            xtype: 'textfield',
                            name: 'username',
                            allowBlank: false,
                            fieldLabel: 'Usuário'
                        },
                        {
                            xtype: 'textfield',
                            name: 'password',
                            allowBlank: false,
                            fieldLabel: 'Senha'
                        }
                    ]
                }
            ],
            buttons: [
                {
                    text: 'Entrar',
                    action: 'login'
                }
            ]
        });

        me.callParent(arguments);
    }

});